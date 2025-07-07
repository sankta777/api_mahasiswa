# 📚 REST API Data Mahasiswa - UAS Back-end Web Development

Project ini merupakan RESTful API sederhana yang dibuat untuk memenuhi tugas UAS mata kuliah Back-end Web Development.

## 🔗 Daftar Isi

-   [Anggota Kelompok](#-anggota-kelompok)
-   [Tujuan Project](#-tujuan-project)
-   [Fitur-Fitur](#-fitur-fitur)
-   [Kebutuhan Sistem](#-kebutuhan-sistem)
-   [Cara Setup Project](#-cara-setup-project)
-   [Daftar Endpoint API](#-daftar-endpoint-api)

## 👥 Anggota Kelompok

-   Revaldo Santosa (230040023)
-   Made Nico Bramantya Putra Wijaya (230040094)
-   Ida Bagus Gede Upadana Manuaba (230040121)
-   Ida Bagus Putu Gede Rama Pradnyana (230040175)

## 🎯 Tujuan Project

Menyediakan layanan **back-end** untuk mengelola data mahasiswa yang mendukung fitur:

-   Autentikasi dengan token (JWT/Sanctum)
-   Operasi data mahasiswa (Create, Read, Update, Delete)

## 🚀 Fitur-Fitur

✅ Autentikasi user menggunakan token  
✅ CRUD lengkap untuk data mahasiswa  
✅ Akun superadmin otomatis tersedia saat database di-import  
✅ Dibuat dengan **PHP** & **Laravel**

## 🛠️ Kebutuhan Sistem

-   PHP (v8.1+)
-   Composer
-   MySQL atau MariaDB
-   [Postman](https://www.postman.com/) (untuk testing endpoint)
-   [Laragon](https://laragon.org/) (rekomendasi)

## ⚙️ Cara Setup Project

### 1. Clone Repositori

```bash
git clone https://github.com/sankta777/api_mahasiswa.git
```

### 2. Masuk ke Folder (change directory)

```bash
cd api_mahasiswa
```

### 3. Install Library Laravel

```bash
composer install
```

### 4. Siapkan Database

-   Buat database baru dengan nama `api_mahasiswa` di phpMyAdmin.
-   Import file `database.sql` dari repositori ke database tersebut.

### 5. Konfigurasi .env

```bash
cp .env.example .env
```

Edit file `.env`:

```
DB_DATABASE=api_mahasiswa
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Jalankan Server Laravel

```bash
php artisan serve
```

> Akses API: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 🔐 Daftar Endpoint API

### URL Dasar

```
http://127.0.0.1:8000/api
```

### Autentikasi

#### 1. Login

-   **Method:** `POST`
-   **Endpoint:** `/auth/login`
-   **Body (form-data):** `email`, `password`
-   **Contoh:** `admin@example.com / password`

#### 2. Cek Info User

-   **Method:** `GET`
-   **Endpoint:** `/auth/me`
-   **Auth:** Wajib pakai Bearer Token

### Mahasiswa (Students)

> Semua endpoint berikut memerlukan Bearer Token

#### 1. Lihat Semua Mahasiswa

-   `GET /students`

#### 2. Tambah Mahasiswa

-   `POST /students` (form-data: `nim`, `nama`, `jurusan`)

#### 3. Lihat Detail Mahasiswa

-   `GET /students/{id}`

#### 4. Edit Mahasiswa

-   `PUT /students/{id}` (gunakan POST + `_method=PUT` saat pakai Postman)

#### 5. Hapus Mahasiswa

-   `DELETE /students/{id}` (gunakan POST + `_method=DELETE` saat pakai Postman)
