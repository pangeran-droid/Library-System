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
  A web-based library management system built with <strong>Laravel 10</strong>, <strong>Jetstream</strong>, and <strong>Livewire</strong>.
  <br>
  <strong>Easily and securely manage book collections, borrowing transactions, categories, and user management.</strong>
</p>

---

## ✨ Features

✅ User Authentication & Management (Jetstream + Roles)  
✅ Book & Category CRUD Operations  
✅ Book Borrowing & Return System  
✅ Book Stock Validation & Notifications  
✅ Search & Category Filtering  
✅ Complete Admin Dashboard  
✅ Responsive & Modern UI  
✅ QR Code Book Identification  

---

## 🛠️ Technologies Used

| Technology | Version |
|------------|---------|
| Laravel | 10.x |
| PHP | 8.1+ |
| Livewire | Jetstream Stack |
| TailwindCSS | Jetstream Default |
| Bootstrap | (For Home UI) |
| MySQL/MariaDB | Latest |
| DOMPDF | Latest |
| Endroid/QRCode | Latest |

---

## ⚠️ Prerequisites

Make sure the following software is installed on your machine:

| Software | Download |
|----------|----------|
| PHP 8.1+ | https://www.php.net/downloads.php |
| Composer | https://getcomposer.org/download/ |
| Node.js & npm | https://nodejs.org/en/download/ |
| Git | https://git-scm.com/downloads |
| MySQL/MariaDB | Included with XAMPP/Laragon |

---

## 📚 Learning Resources

- [YouTube Playlist – Laravel Library Management System Project Tutorial](https://www.youtube.com/playlist?list=PLm8sgxwSZoffQAcAEHAlfyuWGs7U9ZJin)

> The main reference for this project comes from the YouTube tutorial series. Special thanks to the content creator for sharing their knowledge.

---

## 🚀 Installation & Setup

Follow the steps below in order.

### 1️⃣ Clone the Repository

Open your terminal (CMD, PowerShell, or Git Bash) and run:

```bash
git clone https://github.com/pangeran-droid/Library-System.git
cd Library-System
```

### 2️⃣ Install Laravel Dependencies (PHP)

```bash
composer install
```

> ⚠️ If Composer is not recognized, make sure it has been installed correctly.

### 3️⃣ Install Frontend Dependencies (Node.js)

Install the frontend dependencies and build the assets:

```bash
npm install
npm run build
```

> ⚠️ If npm is not recognized, make sure Node.js has been installed.

### 4️⃣ Copy the Environment File

```bash
cp .env.example .env
```

### 5️⃣ Generate the Application Key

```bash
php artisan key:generate
```

### 6️⃣ Configure the Database

Update your `.env` file:

```env
DB_DATABASE=library_system
DB_USERNAME=root
DB_PASSWORD=
```

### 7️⃣ Run Database Migration

```bash
php artisan migrate
php artisan db:seed
```

### 8️⃣ Start the Development Server

After everything is configured, start the Laravel development server:

```bash
php artisan serve
```

The application will be available at:

```
http://127.0.0.1:8000
```

Open the URL in your browser to access the application.

---

## 🔐 Default Login Credentials

### Admin Account

```text
Email: admin@gmail.com
Password: password
```

### User Account

```text
Email: user@gmail.com
Password: password
```

---

## 👁️ Preview

| Home | Login |
|------|-------|
| <img src="public/preview/home.png" width="400"> | <img src="public/preview/login.png" width="400"> |

| Register | Dashboard |
|-----------|-----------|
| <img src="public/preview/register.png" width="400"> | <img src="public/preview/dashboard.png" width="400"> |

---

## 📄 License

This project is open-source and available under the MIT License.

See the **LICENSE** file for more details.

---

## 👥 Contributors

<!--
<p align="center">
  <a href="https://github.com/pangeran-droid/Library-System/graphs/contributors">
    <img src="https://contrib.rocks/image?repo=pangeran-droid/Library-System" />
  </a>
</p>
-->

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
