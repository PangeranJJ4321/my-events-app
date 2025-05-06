# My Events App

Aplikasi pengelolaan acara berbasis Laravel yang lengkap dan mudah digunakan

<p align="center">
  <img src="/api/placeholder/800/400" alt="My Events App Logo" />
</p>

## 🌐 Bahasa | Language

- [Bahasa Indonesia](#bahasa-indonesia)
- [English](#english)

---

## Bahasa Indonesia

### 📝 Deskripsi

My Events App adalah sebuah aplikasi web berbasis Laravel yang dirancang untuk mengelola acara dengan mudah. Aplikasi ini memungkinkan pengguna untuk membuat, mengedit, dan mengatur berbagai jenis acara dengan fitur-fitur lengkap.

### ✅ Prasyarat

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- **PHP** (minimal versi 8.0)
- **Composer** (untuk mengelola dependensi PHP)
- **Database** (MySQL atau MariaDB)
- **Node.js** dan **NPM** (untuk mengelola aset frontend)
- **Server lokal** (Laragon, XAMPP, WAMP, atau server lainnya)

### 🚀 Cara Instalasi

#### 1. Clone Repository

```bash
git clone https://github.com/PangeranJJ4321/my-events-app.git
cd my-events-app
```

#### 2. Install Dependensi

- Install dependensi PHP:
```bash
composer install
```

- Install dependensi Node.js/NPM:
```bash
npm install
```



#### 3. Konfigurasi File .env

Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Sesuaikan konfigurasi database di file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_mysql
DB_PASSWORD=password_mysql
```

#### 4. Generate Application Key

```bash
php artisan key:generate
```

#### 5. Migrasi dan Seed Database

- Jalankan migrasi:
```bash
php artisan migrate
```

- Jalankan seeder (jika ada):
```bash
php artisan db:seed
```

#### 6. Mengelola Aset Frontend

- Untuk mode pengembangan:
```bash
npm run dev
```

- Untuk kompilasi aset untuk produksi:
```bash
npm run build
```

### 🌐 Cara Menjalankan Aplikasi

#### Menggunakan Laragon
1. Pindahkan folder proyek ini ke direktori root Laragon (biasanya `C:\laragon\www`)
2. Jalankan Laragon dan aktifkan server
3. Akses aplikasi melalui `http://my-events-app.test` di browser Anda

#### Menggunakan XAMPP
1. Pindahkan folder proyek ini ke folder `htdocs` XAMPP
2. Jalankan Apache dan MySQL melalui XAMPP Control Panel
3. Akses aplikasi melalui `http://localhost/my-events-app/public` di browser Anda

#### Menggunakan Built-in Server Laravel
```bash
php artisan serve
```
Akses aplikasi melalui `http://127.0.0.1:8000` di browser Anda

### 📋 Fitur Utama

- Manajemen acara (tambah, edit, hapus)
- Pendaftaran peserta
- Penjadwalan acara
- Panel admin
- Notifikasi
- Laporan dan statistik

### 🔧 Pemeliharaan

- **Cache Clear**:
```bash
php artisan cache:clear
```

- **Route Cache Clear**:
```bash
php artisan route:clear
```

- **Config Cache Clear**:
```bash
php artisan config:clear
```

- **View Cache Clear**:
```bash
php artisan view:clear
```

### 📚 Struktur Proyek

```
my-events-app/
├── app/                # Kode aplikasi utama
├── bootstrap/          # File bootstrap aplikasi
├── config/             # File konfigurasi
├── database/           # Migrasi dan seeder database
├── public/             # Direktori publik yang dapat diakses web
├── resources/          # Views, aset raw, dan bahasa
├── routes/             # Definisi rute
├── storage/            # File yang dihasilkan aplikasi
├── tests/              # Tes aplikasi
└── vendor/             # Dependensi pihak ketiga
```



### Kalau Ada Mau Ditanyakan Silahkan Via DM IG Aja
