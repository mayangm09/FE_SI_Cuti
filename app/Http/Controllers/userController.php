<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class userController extends Controller
{
    
    public function index()  //fungsi  menarik data
    {
        $response = Http::get(url: 'http://localhost:8080/user');
        if ($response->successful()) {
            $user = $response->json();
            return view(view: 'data_user', data: ['user' => $user]);
        }
        return view(view: 'data_user', data: ['user' => [], 'error' =>'Gagal mengambil data user']);
    }

    public function create()
    {
        $response = Http::get('http://localhost:8080/user'); // Sesuaikan endpoint API user
    
        if ($response->successful()) {
            $user = $response->json();
            return view('tambah_user', compact('user'));
        }
    
        return view('tambah_user', ['user' => []])->withErrors(['msg' => 'Gagal mengambil data user']);
    }
    
    public function store(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/user', [
        'password' => $request->password,
        'username' => $request->username,
        'level' => $request->level,
    ]);
    
    
        if ($response->successful()) {
            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
        }
    
        // Debug responsenya
        $error = $response->json()['messages']['error'] ?? 'Gagal menambahkan user';
        return back()->withErrors(['msg' => 'Gagal menambahkan user: ' . $error])->withInput();
        }

        public function edit($id_user)
        {
        // Ambil data user berdasarkan ID
        $userResponse = Http::get("http://localhost:8080/user/{$id_user}");
    
        if ($userResponse->successful()&& !empty($userResponse[0])) {
        $user = $userResponse[0];
        
        return view('edit_user', compact('user'));
         }

        return redirect()->route('user.index')
        ->withErrors(['msg' => 'Data user gagal diambil']);
        }

        public function update(Request $request, $id_user)
        {
            // Validasi data
            $request->validate([
                'password' => 'required|string',
                'username' => 'required|string', //diliat tipe datanya ga semua nya string
                'level' => 'required|string',
            ]);
        
            // Kirim data ke backend 
            $response = Http::asForm()->put("http://localhost:8080/user/{$id_user}", $request->all() 
                
            );
        
            // Periksa apakah update berhasil
            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', 'Data User berhasil diperbarui');
            }
        
            // Jika gagal, kembalikan pesan error
            return back()->withErrors(['msg' => 'Gagal memperbarui data user'])->withInput();
        }

        public function destroy($id_user) //fungsi delete
        {
            $response = Http::delete("http://localhost:8080/user/{$id_user}");
            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
            }
    
            return redirect()->route('user.index')->withErrors(['msg' => 'Gagal menghapus user']);
        }
}
