<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">📚 Library Management System</h2>
<p align="center">
  Sistem manajemen perpustakaan berbasis web menggunakan <strong>Laravel 10</strong>, <strong>Jetstream</strong>, dan <strong>Livewire</strong>.
  <br>
  <strong>Mengelola koleksi buku, peminjaman, kategori, serta manajemen pengguna dengan mudah dan aman.</strong>
</p>

---

## ✨ Fitur Utama

✅ Autentikasi & Manajemen User (Jetstream + Roles)  
✅ CRUD Buku dan Kategori  
✅ Sistem Peminjaman / Pengembalian Buku  
✅ Pemberitahuan & Validasi Stok Buku  
✅ Fitur Pencarian & Filter Berdasarkan Kategori  
✅ Dashboard Admin Lengkap  
✅ Responsif & UI Modern  
✅ QR Code Identifikasi Buku  

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi |
|----------|-------|
| Laravel | 10.x |
| PHP | 8.1+ |
| Livewire | Jetstream Stack |
| TailwindCSS | Default Jetstream |
| Bootstrap | (untuk halaman Home UI) |
| MySQL/MariaDB | Latest |
| DOMPDF | Latest |
| Endroid/QRCode | Latest |

---

## ⚠️ Prasyarat (Wajib)

Pastikan software berikut sudah terinstall:

| Software | Link |
|---------|------|
| PHP 8.1+ | https://www.php.net/downloads.php |
| Composer | https://getcomposer.org/download/ |
| Node.js & npm | https://nodejs.org/en/download/ |
| Git | https://git-scm.com/downloads |
| MySQL/MariaDB | Bundle dengan XAMPP/Laragon |

---

## 📚 Referensi Pembelajaran

- [YouTube Playlist – Laravel Library Management System Project Tutorial](https://www.youtube.com/playlist?list=PLm8sgxwSZoffQAcAEHAlfyuWGs7U9ZJin)
> Referensi utama dari seri pembelajaran di YouTube. Terima kasih kepada kreator konten atas ilmunya.

---

## 🚀 Instalasi & Cara Menjalanka

Ikuti langkah-langkah di bawah ini secara berurutan.

### 1️⃣ Clone Repository

Buka Terminal (CMD/PowerShell/Git Bash) dan jalankan perintah berikut:

```bash
git clone https://github.com/pangeran-droid/Library-System.git
cd Library-System
```

### 2️⃣ Install Dependency Laravel (PHP)

```bash
composer install
```
(⚠️ Jika Composer tidak ditemukan, pastikan Anda sudah menginstalnya.)

### 3️⃣ Install Dependency Frontend (Node.js)

Install dependency frontend dan build asset menggunakan npm:

```bash
npm install
npm run build
```
(⚠️ Jika npm tidak ditemukan, pastikan Anda sudah menginstal Node.js.)

### 4️⃣ Salin File .env

```bash
cp .env.example .env
```

### 5️⃣ Generate APP_KEY

```bash
php artisan key:generate
```

### 6️⃣ Konfigurasi Database

```bash
DB_DATABASE=library_system
DB_USERNAME=root
DB_PASSWORD=
```

### 7️⃣ Migrasi Database

```bash
php artisan migrate
php artisan db:seed
```
### 8️⃣ Jalankan Server

Setelah semua selesai, jalankan server Laravel dengan perintah berikut:

```bash
php artisan serve
```
Aplikasi akan berjalan di http://127.0.0.1:8000. Buka di browser Anda untuk mengakses aplikasi.

### 🔐 Akun Login Default

#### Login Admin:
```bash
- Email: admin@gmail.com
- Password: password
```

#### Login User:
```bash
- Email: user@gmail.com
- Password: password
```

## 📄 License
This project is open-source and available under the MIT License.
See the LICENSE file for more details.

---

<h2 align="center">👥 Pembagian Tugas Anggota</h2>

<table align="center">
  <tr>
    <th>No</th>
    <th>Nama Anggota</th>
    <th>Tugas / Kontribusi</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Mahesa Muhammad Patih</b> (42423019)</td>
    <td>
      Setup Frontend dan Backend.<br>
      Integrasi QR Code dan PDF generator.
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Iim Abdul Karim</b> (42423027)</td>
    <td>
      Membuat fungsi Edit dan Update data buku.<br>
      Menampilkan daftar buku di halaman Home.<br>
      Mengizinkan pengguna untuk meminjam buku dari sistem perpustakaan (Library System).<br>
      Melakukan pemeliharaan sistem secara berkala (Maintenance Berkala).
    </td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Cahyo Qolbu Isrobbany</b> (42423037)</td>
    <td>
        Menampilkan data permintaan peminjaman buku pada panel admin.<br>
        Mengubah status buku oleh admin.<br>
        Mengimplementasikan fitur lupa/reset password pada Laravel.
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>M.Rifqi Zidan</b> (42423038)</td>
    <td>
      Menampilkan status buku di beranda pengguna.<br>
      Menambahkan fitur untuk membatalkan permintaan buku melalui beranda Laravel.<br>
      Menampilkan semua buku di halaman "Jelajahi" (Explore).
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Dita Supriyadi</b> (123)</td>
    <td></td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Adil Kusuma</b> (42423053)</td>
    <td>
      Menambahkan middleware, seperti:<br>
        - Autentikasi pengguna,<br>
        - Pengecekan hak akses,<br>
        - Filter terhadap request.<br>
      Membangun database untuk buku dan anggota.<br>
      Mengembangkan fitur peminjaman dan pengembalian buku.
    </td>
  </tr>
</table>
