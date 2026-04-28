<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h2 align="center">📚 Library Management System</h2>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10-red" />
  <img src="https://img.shields.io/badge/PHP-8.1+-blue" />
  <img src="https://img.shields.io/github/license/pangeran-droid/Library-System" />
  <img src="https://img.shields.io/github/contributors/pangeran-droid/Library-System" />
  <img src="https://img.shields.io/github/stars/pangeran-droid/Library-System?style=social" />
</p>

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

## 👁️ Pratinjau

| Home | Login |
|---|---|
| <img src="public/preview/home.png" width="400"> | <img src="public/preview/login.png" width="400"> |

| Register | Dashboard |
|---|---|
| <img src="public/preview/register.png" width="400"> | <img src="public/preview/dashboard.png" width="400"> |

## 📄 License
This project is open-source and available under the MIT License.
See the LICENSE file for more details.

## 👥 Contributors

<!-- <p align="center">
  <a href="https://github.com/pangeran-droid/Library-System/graphs/contributors">
    <img src="https://contrib.rocks/image?repo=pangeran-droid/Library-System" />
  </a>
</p> -->

<p align="center">
  <a href="https://github.com/pangeran-droid">
    <img src="https://github.com/pangeran-droid.png" width="80" />
  </a>
  <a href="https://github.com/DitaSupriyadi18">
    <img src="https://github.com/DitaSupriyadi18.png" width="80" />
  </a>
  <a href="https://github.com/Cahyo661">
    <img src="https://github.com/Cahyo661.png" width="80" />
  </a>
  <a href="https://github.com/mrifqizidan7">
    <img src="https://github.com/mrifqizidan7.png" width="80" />
  </a>
  <a href="https://github.com/iim028">
    <img src="https://github.com/iim028.png" width="80" />
  </a>
  <a href="https://github.com/fathullohalfathir">
    <img src="https://github.com/fathullohalfathir.png" width="80" />
  </a>
  <a href="https://github.com/Adil8566">
    <img src="https://github.com/Adil8566.png" width="80" />
  </a>
</p>