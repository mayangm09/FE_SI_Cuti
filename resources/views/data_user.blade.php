<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Pengelolaan Data</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg flex flex-col">
      <!-- Link ke homepage -->
      <a href="{{ route('homepage')}}" class="p-5 text-2xl font-semibold border-b border-gray-700 hover:bg-gray-700 transition">SIP Cuti 👌</a>
      <!-- Navigasi sidebar -->
      <nav class="flex-1 p-5">
        <ul class="space-y-3">
         <!-- Navigasi ke halaman Dashboard -->
         <li>
        <a href="{{ route('dashboard')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
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
            <a href="{{ route('kajur.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
              <!-- Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 15c2.17 0 4.168.646 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Data Ketua Jurusan
            </a>
          </li>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-5 flex items-center justify-center border-b border-gray-200">
        <h1 class="text-gray-800 text-2xl font-semibold tracking-wide">Sistem Informasi Cuti</h1>
      </header>

      <!-- Content utama -->
      <main class="p-6">
        <!-- Card putih untuk tombol + dan tabel -->
        <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center justify-center mb-6 gap-2">
        <h2 class="text-2xl font-semibold text-gray-700">👤Data User</h2>
        </div>
          <!-- Tombol Tambah Data di kiri atas -->
          <div class="flex justify-between items-center mb-4">
          <div class="flex gap-2">
          <a href="{{ route('user.create') }}"class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md text-sm transition">+ Tambah Data</a>
          <a href="{{ route('user.cetak') }}" target="_blank"class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md text-sm transition">🖨️ Cetak PDF</a>
          </div>
            <!-- Search Bar, supaya bisa langsung aktif ditambahin id=serchinput --> 
            <div class="relative w-64">
            <input id="searchInput" type="text" placeholder="Cari User..." class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-indigo-300 text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>

          <!-- Tabel Data User -->
          <table class="min-w-full border border-gray-300 text-sm rounded-md overflow-hidden">
            <thead>
              <tr class="bg-gray-100 text-center text-gray-600">
                <th class="px-5 py-3 border-b border-gray-300">ID User</th>
                <th class="px-5 py-3 border-b border-gray-300">Password</th>
                <th class="px-5 py-3 border-b border-gray-300">Username</th>
                <th class="px-5 py-3 border-b border-gray-300">Level</th>
                <th class="px-5 py-3 border-b border-gray-300">Aksi</th>
              </tr>
            </thead>
            <!-- tambahin id supaya isi tabel bisa di serch -->
            <tbody id="userTableBody"> 
              @foreach ($user as $usr)
              <tr class="hover:bg-gray-50 text-center">
                <td class="px-5 py-3 border-b border-gray-200">{{ $usr['id_user']}}</td>
                <td class="px-5 py-3 border-b border-gray-200">{{ $usr['password']}}</td>
                <td class="px-5 py-3 border-b border-gray-200">{{ $usr['username']}}</td>
                <td class="px-5 py-3 border-b border-gray-200">{{ $usr['level']}}</td>
                <td class="px-5 py-3 border-b border-gray-200 flex justify-center space-x-3">
                  <!-- Tombol Edit -->
                  <a href="{{ route('user.edit', $usr['id_user']) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️Edit</a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('user.destroy', $usr['id_user']) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
<script> //script js supaya bisa langsung serch
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("userTableBody");

    searchInput.addEventListener("input", function () {
      const keyword = this.value.toLowerCase();
      const rows = tableBody.getElementsByTagName("tr");

      Array.from(rows).forEach((row) => {
        const rowText = row.textContent.toLowerCase();
        if (rowText.includes(keyword)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  });
</script>
</html>
