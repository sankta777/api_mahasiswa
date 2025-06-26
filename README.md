# REST API Manajemen Data Mahasiswa

Proyek ini adalah sebuah REST API sederhana yang dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS). API ini berfungsi untuk mengelola data mahasiswa (CRUD) dan dilengkapi dengan sistem otentikasi berbasis token.

## Fitur Utama
-   Otentikasi Pengguna (Login & Cek User) menggunakan Token.
-   CRUD (Create, Read, Update, Delete) untuk data mahasiswa.
-   Akun `superadmin` otomatis tersedia setelah proses migrasi database.
-   Dibangun menggunakan PHP dengan framework Laravel.

## Prasyarat
-   PHP (rekomendasi versi 8.1+)
-   Composer
-   MySQL / MariaDB
-   Laragon (rekomendasi untuk lingkungan lokal di Windows)
-   Postman (untuk melakukan tes pada endpoint API)

## Panduan Instalasi & Setup

1.  **Clone Repository**
    Buka terminal dan jalankan perintah berikut:
    ```bash
    git clone [URL_REPOSITORY_GIT_ANDA]
    cd nama-folder-proyek
    ```

2.  **Install Dependencies**
    Jalankan perintah Composer untuk menginstall semua library yang dibutuhkan.
    ```bash
    composer install
    ```

3.  **Setup Database**
    * Buat sebuah database baru di MySQL (misalnya via phpMyAdmin) dengan nama `api_mahasiswa`.
    * Import file `database.sql` yang ada di dalam repository ini ke dalam database yang baru saja dibuat.

4.  **Konfigurasi Lingkungan (.env)**
    * Salin file `.env.example` menjadi file baru bernama `.env`.
        ```bash
        cp .env.example .env
        ```
    * Buka file `.env` dan sesuaikan konfigurasi database (`DB_`) dengan pengaturan MySQL Anda.
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=api_mahasiswa
        DB_USERNAME=root
        DB_PASSWORD=
        ```
    * Generate kunci aplikasi Laravel.
        ```bash
        php artisan key:generate
        ```

5.  **Jalankan Server API**
    Gunakan server pengembangan bawaan Laravel.
    ```bash
    php artisan serve
    ```
    Server akan berjalan di `http://127.0.0.1:8000`.

## Dokumentasi Endpoint API

**Base URL**: `http://127.0.0.1:8000/api`

---

### Otentikasi

#### 1. Login Pengguna
-   **Method**: `POST`
-   **Endpoint**: `/auth/login`
-   **Body** (`form-data`):
    -   `email`: `admin@example.com`
    -   `password`: `password`
-   **Response Sukses**: Mengembalikan `access_token` yang akan digunakan untuk request selanjutnya.

#### 2. Cek Pengguna Saat Ini
-   **Method**: `GET`
-   **Endpoint**: `/auth/me`
-   **Authorization**: `Bearer Token` diperlukan.

---

### Mahasiswa (Students)
*Semua endpoint di bawah ini memerlukan `Bearer Token` pada header `Authorization`.*

#### 1. Melihat Semua Mahasiswa
-   **Method**: `GET`
-   **Endpoint**: `/students`

#### 2. Menambah Mahasiswa Baru
-   **Method**: `POST`
-   **Endpoint**: `/students`
-   **Body** (`form-data`):
    -   `nim` (string, unique)
    -   `nama` (string)
    -   `jurusan` (string)

#### 3. Melihat Detail Mahasiswa
-   **Method**: `GET`
-   **Endpoint**: `/students/{id}`

#### 4. Meng-edit Mahasiswa
-   **Method**: `PUT`
-   **Endpoint**: `/students/{id}`
-   **Body** (`x-www-form-urlencoded` atau `form-data`):
    -   `nim` (string, unique)
    -   `nama` (string)
    -   `jurusan` (string)
-   **Catatan Postman**: Untuk testing via Postman, gunakan Method `POST` dan tambahkan field `_method` dengan value `PUT` di dalam Body.

#### 5. Menghapus Mahasiswa
-   **Method**: `DELETE`
-   **Endpoint**: `/students/{id}`
-   **Catatan Postman**: Untuk testing via Postman, gunakan Method `POST` dan tambahkan field `_method` dengan value `DELETE` di dalam Body.