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
        $response = Http::get('http://localhost:8080/kajur'); // Sesuaikan endpoint API kajur
    
        if ($response->successful()) {
            $kajur = $response->json();
            return view('tambah_kajur', compact('kajur'));
        }
    
        return view('tambah_kajur', ['kajur' => []])->withErrors(['msg' => 'Gagal mengambil data kajur']);
    }
    
    public function store(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/kajur', [
        'nama_kajur' => $request->nama_kajur,
        'nidn' => $request->nidn,
        'nama_jurusan' => $request->nama_jurusan,
        'id_user' => $request->id_user,
    ]);
    
    
        if ($response->successful()) {
            return redirect()->route('kajur.index')->with('success', 'Kajur berhasil ditambahkan');
        }
    
        // Debug responsenya
        $error = $response->json()['messages']['error'] ?? 'Gagal menambahkan kajur';
        return back()->withErrors(['msg' => 'Gagal menambahkan kajur: ' . $error])->withInput();
    }

}
