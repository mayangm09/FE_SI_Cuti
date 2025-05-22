# Cara Membuat Frontend Laravel Menggunakan Laragon Quick App

Panduan ini menjelaskan cara membuat project frontend Laravel menggunakan fitur Quick App di Laragon, dimulai dari clone backend via terminal VS Code, import database backend, membuat frontend via Laragon, membuka proyek frontend di VS Code lewat terminal Laragon, hingga menampilkan halaman menggunakan controller dan blade view.

---

## 📦 Persiapan

Pastikan kamu sudah menginstal:
- Laragon
- Git
- Visual Studio Code (VS Code)
- Composer (biasanya sudah include di Laragon)

---

## 🔁 Langkah 1: Clone Backend Lewat VS Code

1. Buka **Visual Studio Code**
2. Buat folder kerja baru (misalnya: `projekku`)
   - Klik `File > Open Folder...`
3. Buka terminal di VS Code (`Ctrl + ``)
4. Jalankan perintah berikut:
```bash
git clone https://github.com/username/backend.git backend
```
> Gantilah URL di atas dengan repository backend milikmu

5. Masuk ke folder backend:
```bash
cd backend
```

6. Install dependency Laravel:
```bash
composer install
```

---

## 🗃️ Langkah 2: Import Database Backend

1. Buka **phpMyAdmin** dari menu Laragon, kemudian klik database
2. Buat database baru, misalnya:
   ```
   backend_db
   ```
3. Klik tab **Import**, lalu pilih file `.sql` dari backend-mu
4. Klik **Go** untuk import

---

## ⚙️ Langkah 3: Atur File `.env` Backend

Jika backend blm memiliki file `.env` di folder backend:

```env
cp env .env
```
Edit file `.env` di folder backend:

```env
DB_DATABASE=backend_db
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan backend:
```bash
php spark serve
```

---
## 🔌 Untuk Uji API di Postman

### 📘 Mahasiswa
- `GET`: `http://localhost:8080/mahasiswa`
- `POST`: `http://localhost:8080/mahasiswa`
- `PUT`: `http://localhost:8080/mahasiswa/{npm}`
- `DELETE`: `http://localhost:8080/mahasiswa/{npm}`

### 📗 Kajur
- `GET`: `http://localhost:8080/kajur`
- `POST`: `http://localhost:8080/kajur`
- `PUT`: `http://localhost:8080/kajur/{id_kajur}`
- `DELETE`: `http://localhost:8080/delete/{id_kajur}`

### 📙 Cuti
- `GET`: `http://localhost:8080/cuti`
- `POST`: `http://localhost:8080/cuti`
- `PUT`: `http://localhost:8080/cuti/{npm}`
- `DELETE`: `http://localhost:8080/cuti/{npm}`

### 📒 User
- `GET`: `http://localhost:8080/user`
- `POST`: `http://localhost:8080/user`
- `PUT`: `http://localhost:8080/user/{id_user}`
- `DELETE`: `http://localhost:8080/user/{id_user}`

### 📕 Admin
- `GET`: `http://localhost:8080/admin`
- `POST`: `http://localhost:8080/admin`
- `PUT`: `http://localhost:8080/admin/{id_admin}`
- `DELETE`: `http://localhost:8080/admin/{id_admin}`


## 🖥️ Langkah 4: Buat Frontend via Laragon Quick App

1. Jalankan **Laragon**
2. Klik kanan di area kosong Laragon, pilih:
   ```
   Quick app > Laravel
   ```
3. Masukkan nama proyek frontend, misalnya:
   ```
   frontend
   ```
4. Laragon akan otomatis:
   - Membuat folder `frontend` di `C:\laragon\www`
   - Menginstal Laravel
   - Membuka CMD otomatis di folder tersebut

> Tutup CMD yang muncul, karena kita akan buka lewat terminal Laragon

---

## 📂 Langkah 5: Buka Frontend di VS Code via Terminal Laragon

1. Klik `Menu > Terminal` di Laragon untuk buka terminal internal Laragon
2. Jalankan:
```bash
code frontend
```
> Ini akan membuka folder frontend langsung di Visual Studio Code

---

## ⚙️ Langkah 6: Atur File `.env` Frontend

Edit file `.env` di proyek frontend (kalau tidak pakai database, kamu bisa lewati bagian DB):

```env
APP_NAME=LaravelFrontend
APP_URL=http://localhost:8000

SESSION_DRIVER=file
```

Lalu jalankan:
```bash
composer install
```

---

## 🧱 Langkah 7: Buat Tampilan Menggunakan Controller

### 7.1 Buat Controller
```bash
php artisan make:controller HomeController
```

### 7.2 Tambahkan Fungsi di Controller

Edit file `app/Http/Controllers/HomeController.php`:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
```

### 7.3 Buat Folder dan View

Buat folder dan file untuk view:
```bash
php artisan make:view home
```

Lalu buat file `resources/views/home/index.blade.php` dan isi seperti berikut:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Pengelolaan Data</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg flex flex-col">
      <!-- Link ke homepage -->
      <a href="...." class="p-5 text-2xl font-semibold border-b border-gray-700 hover:bg-gray-700 transition">Home Page</a>
      <!-- Navigasi sidebar -->
      <nav class="flex-1 p-5">
        <ul class="space-y-3">
         <!-- Navigasi ke halaman Dashboard -->
         <li>
        <a href="...." class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h7v7H3V3zm0 11h7v7H3v-7zm11-11h7v7h-7V3zm0 11h7v7h-7v-7z" />
        </svg>
        Dashboard
        </a>
        </li>
          <!-- Navigasi ke halaman Data Dosen -->
          <li>
            <a href="..." class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
              <!-- Icon Dosen -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 15c2.17 0 4.168.646 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Data Dosen
            </a>
          </li>
           <!-- Navigasi ke halaman Data Mahasiswa -->
          <li>
            <a href="..." class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">
              <!-- Icon Mahasiswa -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0 0l-3.5-3.5M12 20l3.5-3.5" />
              </svg>
              Data Mahasiswa
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-5 flex items-center justify-center border-b border-gray-200">
        <h1 class="text-gray-800 text-2xl font-semibold tracking-wide">Sistem Pengelolaan Data</h1>
      </header>
      <!-- Content -->
      <main class="p-6">
        <div class="bg-white p-6 rounded shadow-md">
          <h2 class="text-xl font-semibold mb-4">Selamat Datang di Sistem Informasi</h2>
          <p class="text-gray-600">Gunakan menu di samping untuk mengelola data dosen dan mahasiswa.</p>
        </div>
      </main>
    </div>
  </div>
</body>
</html>

```

### 7.4 Ubah Route

Edit file `routes/web.php`:

```php
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
```

---

## 🚀 Langkah 8: Jalankan Frontend

Jalankan frontend kamu:

```bash
php artisan serve
```

Lalu buka di browser:
```
http://127.0.0.1:8000
```
jika muncul error tentang enkripsi APP_KEY, jalankan:
```bash
php artisan key:generate
```


---

## 📝 Catatan Tambahan

### ✔️ Beberapa Perintah `php artisan make:` yang Berguna

| Perintah                                | Fungsi                                      |
|----------------------------------------|---------------------------------------------|
| `php artisan make:controller Nama`     | Membuat controller baru                     |
| `php artisan make:view Nama`          | Membuat view baru                          |

---
### Catatan Tambahan - Fungsi Edit

Pada proses edit data, terdapat dua pendekatan tergantung pada format data yang diterima dari response:

- **Jika response berupa object:**  
  Gunakan pendekatan berikut:
  ```php
  if ($matkulResponse->successful()) {
      $matkul = $matkulResponse->json();
  }
  ```
  Cocok digunakan ketika response dari API mengembalikan data tunggal dalam bentuk object JSON.

- **Jika response berupa array:**  
  Gunakan pendekatan berikut:
  ```php
  if ($matkulResponse->successful() && !empty($matkulResponse[0])) {
      $matkul = $matkulResponse[0];
  }
  ```
  Pendekatan ini digunakan ketika API mengembalikan array data dan hanya ingin mengambil elemen pertama untuk diedit.

---

## 💡 Tips dan Catatan Penting Saat Pengembangan Frontend

### 1. Salin Desain dengan Hati-hati  
Saat menyalin desain dari mockup atau referensi, khususnya untuk elemen `<a href="...">`, disarankan untuk sementara menuliskan href sebagai `"..."` sampai semua route terkait benar-benar dibuat dan siap dipakai. Ini membantu mencegah error link rusak atau 404 saat testing awal.

### 2. Validasi Input Saat Menambah Data  
Jika saat menambahkan data baru ternyata tidak bisa tersimpan (stuck), biasanya ada validasi yang mencegah duplikasi, contohnya kode atau ID yang sudah dipakai sebagai primary key. Pastikan input data menggunakan nilai primary key yang belum ada agar proses tambah data bisa berhasil.

### 3. Cocokkan Penggunaan `asForm()` pada Update Data  
Kalau saat edit data form bisa terbuka tapi saat submit update tidak terjadi perubahan dan langsung balik ke tabel data, cek kembali penggunaan `asForm()`. Jangan sampai salah pakai `asForm()` kalau backend tidak membutuhkannya, karena ini bisa menyebabkan data gagal terkirim atau proses update gagal. Selalu sesuaikan cara pengiriman data dengan kebutuhan backend agar update berhasil.
