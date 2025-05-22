<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class kajurController extends Controller
{
     
    public function index()  //fungsi  menarik data
    {
        $response = Http::get(url: 'http://localhost:8080/kajur');
        if ($response->successful()) {
            $kajur = $response->json();
            return view(view: 'data_kajur', data: ['kajur' => $kajur]);
        }
        return view(view: 'data_kajur', data: ['kajur' => [], 'error' =>'Gagal mengambil data kajur']);
    }

    public function create()
    {
    // Ambil data user dari API
    $responseKajur = Http::get('http://localhost:8080/kajur');
    $responseUser = Http::get('http://localhost:8080/user'); // Ganti sesuai endpoint user kamu

    if ($responseKajur->successful() && $responseUser->successful()) {
        $kajur = $responseKajur->json();
        $user = $responseUser->json();

        return view('tambah_kajur', compact('kajur', 'user'));
    }

    return back()->withErrors(['msg' => 'Gagal mengambil data dari server']);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $response = Http::asForm()->post('http://localhost:8080/kajur', [
        'nama_kajur' => $request->nama_kajur,
        'nidn' => $request->nidn,
        'nama_jurusan' => $request->nama_jurusan,
        'id_user' => $request->id_user,
        'username' => $request->username, // ambil dari user terpilih (misal lewat hidden input)

    ]);
    
    
        if ($response->successful()) {
            return redirect()->route('kajur.index')->with('success', 'Kajur berhasil ditambahkan');
        }
    
        // dd($response->body());
        // Debug responsenya
        $error = $response->json()['messages']['error'] ?? 'Gagal menambahkan kajur';
        return back()->withErrors(['msg' => 'Gagal menambahkan kajur: ' . $error])->withInput();
    }

    public function edit($id_kajur)
    {
        $kajurResponse = Http::get("http://localhost:8080/kajur/{$id_kajur}");
        $userResponse = Http::get("http://localhost:8080/user"); // misal endpoint untuk ambil semua user
        
        if ($kajurResponse->successful() && $userResponse->successful()) {
            $kajurData = $kajurResponse->json();
            $userData = $userResponse->json();
    
            if (!empty($kajurData) && !empty($userData)) {
                $kajur = $kajurData[0];
                $user = $userData;
                
                return view('edit_kajur', compact('kajur', 'user'));
            }
        }
        return redirect()->route('kajur.index')->withErrors(['msg' => 'Gagal ambil data']);
    }
    
    public function update(Request $request, $id_kajur)
{
    // Validasi input form
    $validated = $request->validate([
        'nama_kajur' => 'required|string|max:255',
        'nidn' => 'required|string|max:100',
        'nama_jurusan' => 'required|string|max:255',
        'id_user' => 'required|integer',
    ]);

    // Siapkan data untuk update ke API
        $kajurData = [
        'nama_kajur' => $validated['nama_kajur'],
        'nidn' => $validated['nidn'],
        'nama_jurusan' => $validated['nama_jurusan'],
        'id_user' => $validated['id_user'],
    ];

    // Kirim update ke API (misal endpoint PUT)
    $response = Http::asForm()->put("http://localhost:8080/kajur/{$id_kajur}", $kajurData);

    if ($response->successful()) {
        return redirect()->route('kajur.index')->with('success', 'Data kajur berhasil diperbarui');
    } else {
        return redirect()->back()->withErrors(['msg' => 'Gagal memperbarui data kajur'])->withInput();
    }
    }
    
    public function destroy($id_kajur) //fungsi delete
    {
    $response = Http::delete("http://localhost:8080/kajur/{$id_kajur}");
    if ($response->successful()) {
        return redirect()->route('kajur.index')->with('success', 'Kajur berhasil dihapus');
    }

    return redirect()->route('kajur.index')->withErrors(['msg' => 'Gagal menghapus kajur']);
    }

}
