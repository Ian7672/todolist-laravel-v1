# 📝 Todo List Laravel Modern

Aplikasi manajemen tugas (to-do list) berbasis Laravel dengan antarmuka modern yang menggunakan efek akrilik dan desain yang elegan. Aplikasi ini memungkinkan pengguna untuk mengelola tugas harian mereka dengan fitur lengkap CRUD dan sistem autentikasi.

## ✨ Fitur

### 🔐 Autentikasi
- **Sign Up** - Registrasi akun baru dengan username, email, dan password
- **Sign In** - Login dengan email dan password
- **Logout** - Keluar dari aplikasi dengan aman
- **Session Management** - Otomatis redirect ke halaman login jika belum terautentikasi

### 📋 Manajemen Tugas
- **Tambah Tugas** - Membuat tugas baru dengan judul, deskripsi (opsional), dan deadline
- **Edit Tugas** - Mengedit tugas secara inline tanpa pindah halaman
- **Hapus Tugas** - Menghapus tugas dengan konfirmasi
- **Toggle Status** - Menandai tugas sebagai selesai/belum selesai dengan checkbox
- **Sorting Otomatis** - Tugas aktif diurutkan berdasarkan deadline, tugas selesai berdasarkan waktu penyelesaian

### 📊 Statistik
- **Counter Tugas Aktif** - Menampilkan jumlah tugas yang belum selesai
- **Counter Tugas Selesai** - Menampilkan jumlah tugas yang sudah selesai  
- **Total Tugas** - Menampilkan total keseluruhan tugas

### 🎨 Antarmuka Modern
- **Desain Akrilik** - Efek blur dan transparansi yang elegan
- **Responsive Design** - Tampilan optimal di berbagai ukuran layar
- **Dark Theme** - Tema gelap yang nyaman untuk mata
- **Smooth Animations** - Transisi dan animasi yang halus
- **Glass Morphism** - Elemen UI dengan efek kaca modern

## 🚀 Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- MySQL/SQLite
- Git

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/Ian7672/todolist-laravel-v1
   cd todolist-laravel-v1
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   ```
   
   Kemudian edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=todolist-laravel-v1
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Server**
   ```bash
   php artisan serve
   ```

7. **Akses Aplikasi**
   Buka browser dan akses: `http://localhost:8000`

## 📖 Cara Penggunaan

### 1. Registrasi Akun
- Klik "Belum punya akun? Daftar" di halaman login
- Isi username (minimal 3 karakter), email, dan password (minimal 6 karakter)
- Konfirmasi password dan klik "Daftar"

### 2. Login
- Masukkan email dan password yang telah didaftarkan
- Klik "Masuk" untuk mengakses dashboard

### 3. Mengelola Tugas
- **Tambah Tugas**: Isi form di bagian atas dengan judul, deskripsi (opsional), dan deadline
- **Edit Tugas**: Klik tombol "✏️ Edit" pada tugas yang ingin diubah
- **Tandai Selesai**: Centang checkbox di sebelah kiri tugas
- **Hapus Tugas**: Klik tombol "🗑️ Hapus" dengan konfirmasi

### 4. Logout
- Klik tombol "Keluar" di pojok kanan atas untuk logout

## 🔧 Struktur Aplikasi

```
todolist-laravel-v1/
├── app/
│   ├── Excaptions/
│   │   └── Handler.php             # Mengatur jalur error
│   ├── Http/Controllers/
│   │   ├── AuthController.php      # Kontroller autentikasi
│   │   └── TaskController.php      # Kontroller manajemen tugas
│   └── Models/
│       ├── User.php                # Model pengguna
│       └── Task.php                # Model tugas
├── resources/views/
│   ├── auth/                       # View autentikasi
│   │   ├── signin.blade.php
│   │   └── signup.blade.php
│   ├── tasks/                      # View komponen tugas
│   │   ├── index.blade.php         # Halaman utama
│   │   ├── add.blade.php           # Form tambah tugas
│   │   ├── profile.blade.php       # Info profil pengguna
│   │   ├── statistic.blade.php     # Statistik tugas
│   │   ├── uncompleted.blade.php   # Daftar tugas aktif
│   │   ├── completed.blade.php     # Daftar tugas selesai
│   │   ├── empty.blade.php         # State kosong
│   │   └── error.blade.php         # Error handling
│   └── errors/
│       └── 404.blade.php           # Halaman 404
├── database/migrations/            # File migrasi database
├── routes/web.php                  # Routing aplikasi
├── public/js/                      # File JS fungsi
└── public/css/                     # File CSS styling
```

## 🎨 Desain Visual

Aplikasi menggunakan desain modern dengan karakteristik:
- **Glassmorphism**: Efek kaca semi-transparan dengan blur backdrop
- **Gradient Background**: Latar belakang gradien yang dinamis
- **Rounded Corners**: Sudut-sudut melengkung untuk tampilan yang lembut
- **Shadow Effects**: Bayangan halus untuk kedalaman visual
- **Smooth Transitions**: Animasi transisi yang mulus pada interaksi
- **Color Coding**: Sistem warna yang konsisten (hijau untuk selesai, biru untuk aktif)

## 🔒 Keamanan

- **CSRF Protection**: Semua form dilindungi token CSRF
- **Password Hashing**: Password di-hash menggunakan bcrypt
- **Session Management**: Pengelolaan sesi yang aman
- **Authorization**: Setiap pengguna hanya dapat mengakses tugas mereka sendiri
- **Input Validation**: Validasi input untuk mencegah data tidak valid

## 🌟 Fitur Khusus

- **Auto Redirect**: Redirect otomatis ke halaman utama setelah 30 detik di halaman 404
- **Inline Editing**: Edit tugas langsung di halaman utama tanpa popup
- **Date Formatting**: Format tanggal dalam bahasa Indonesia
- **Responsive Layout**: Tampilan optimal di desktop dan mobile
- **Empty State**: Pesan khusus ketika belum ada tugas

## 📝 Catatan Pengembangan

- Menggunakan Laravel 10.x
- Database menggunakan migrasi Laravel
- Styling murni CSS tanpa framework
- Session-based authentication
- MVC pattern yang terstruktur

## Kontribusi

Pull request dipersilakan. Untuk perubahan besar, buka issue terlebih dahulu untuk mendiskusikan apa yang ingin Anda ubah.

## Demo Aplikasi

[Link Demo Aplikasi](https://github.com/user-attachments/assets/79dc152a-a7a4-4c04-8ef2-b6e27a9ad69c)


## 👨‍💻 Developer

Dikembangkan oleh **Ian7672** - [GitHub Profile](https://github.com/Ian7672)

---

© 2025 todolist-laravel-v1. All rights reserved.
