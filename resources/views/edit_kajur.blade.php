<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Data User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen">
   <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg flex flex-col">
      <!-- Link ke homepage -->
      <a href="{{ route('homepage')}}" class="p-5 text-2xl font-semibold border-b border-gray-700 hover:bg-gray-700 transition">Home Page</a>
      <!-- Navigasi sidebar -->
      <nav class="flex-1 p-5">
        <ul class="space-y-3">
         <!-- Navigasi ke halaman Dashboard -->
         <li>
        <a href="{{ route('homepage')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z" />
        </svg>
        Dashboard
        </a>
        </li>
         <!-- Navigasi ke halaman Data User -->
         <li>
            <a href="{{ route('user.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
              <!-- Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 15c2.17 0 4.168.646 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Data User
            </a>
          </li>
          <!-- Navigasi ke halaman Data Kajur-->
          <li>
            <a href="..." class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
              <!-- Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 15c2.17 0 4.168.646 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Data Ketua Jurusan
            </a>
          </li>
    </aside>
    <!-- content -->
    <div class="flex-1 flex items-center justify-center p-10 bg-gray-100">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
      <!-- form edit data user -->
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Data Kajur</h2>
    <form action="{{ route('kajur.update', $kajur['id_kajur']) }}" method="POST" class="space-y-5">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1 font-medium text-gray-700">Nama</label>
        <input type="text" name="nama_kajur" value="{{ $kajur['nama_kajur'] }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Budi">
    </div>

    <div>
        <label class="block mb-1 font-medium text-gray-700">NIDN</label>
        <input type="text" name="nidn" value="{{ $kajur['nidn'] }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 12345678">
    </div>

    <div>
        <label class="block mb-1 font-medium text-gray-700">Nama Jurusan</label>
        <input type="text" name="nama_jurusan" value="{{ $kajur['nama_jurusan'] }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Manajemen">
    </div>

    <div>
        <label for="id_user" class="block mb-1 font-medium text-gray-700">Username</label>
        <select name="id_user" id="id_user" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <option value="">-- Pilih User --</option>
            @foreach ($user as $usr)
                <option value="{{ $usr['id_user'] }}" {{ $kajur['id_user'] == $usr['id_user'] ? 'selected' : '' }}>
                    {{ $usr['username'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="pt-4">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-md">
            Perbarui
        </button>
        <a href="{{ route('kajur.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md">Batal</a>
    </div>
</form>
  </div>
</div>
</body>
</html>
