# REST API Data Mahasiswa - UAS Back-end Web Development

Project ini merupakan RESTful API sederhana yang dibuat untuk memenuhi tugas UAS mata kuliah Back-end Web Development.

## Daftar Isi

- [Anggota Kelompok](#anggota-kelompok)  
- [Tujuan Project](#tujuan-project)  
- [Fitur-Fitur](#fitur-fitur)  
- [Kebutuhan Sistem](#kebutuhan-sistem)  
- [Cara Setup Project](#cara-setup-project)  
- [API Endpoint List & Panduan Tes](#api-endpoint-list--panduan-tes)  

## Anggota Kelompok

- Revaldo Santosa (230040023)  
- Made Nico Bramantya Putra Wijaya (230040094)  
- Ida Bagus Gede Upadana Manuaba (230040121)  
- Ida Bagus Putu Gede Rama Pradnyana (230040175)

## Tujuan Project

Menyediakan layanan **back-end** untuk mengelola data mahasiswa dengan fitur:

- Autentikasi menggunakan token (JWT/Sanctum)  
- Operasi CRUD (Create, Read, Update, Delete) data mahasiswa  

## Fitur-Fitur

- Autentikasi user menggunakan token  
- CRUD lengkap untuk data mahasiswa  
- Akun superadmin otomatis tersedia setelah database di-import  
- Dibuat menggunakan **PHP** dan **Laravel**

## Kebutuhan Sistem

- PHP (versi 8.1+)  
- Composer  
- MySQL atau MariaDB  
- [Postman](https://www.postman.com/) untuk testing endpoint  
- [Laragon](https://laragon.org/) (rekomendasi)

## Cara Setup Project

__Panduan ini disusun khusus untuk pengguna **Laragon**.__

### 1. Nyalakan Laragon dan Clone Repository

  - Buka **Laragon**, lalu klik tombol **Start All**  
  - Klik tombol **Terminal**, maka terminal akan terbuka di directory `C:\laragon\www`  
  - Jalankan perintah berikut untuk clone repository project:
    ```bash
    git clone https://github.com/sankta777/api_mahasiswa.git

### 2. Buat Database

  - Klik tombol **Database** di Laragon untuk membuka phpMyAdmin  
  - Buat database baru dengan nama `api_mahasiswa`  
  - Pilih database tersebut, lalu masuk ke tab **Import**  
  - Klik **Choose File** dan pilih file `database.sql` dari folder project  
  - Scroll ke bawah dan klik tombol **Import**

### 3. Install & Config Project

  Di terminal Laragon, masuk ke directory project dengan **`cd`** atau change directory

  ```bash
  cd api_mahasiswa
  ```

  Install semua library yang dibutuhkan Laravel.

  ```bash
  composer install
  ```

  Buat file `.env` dan generate unique encryption key untuk aplikasi:

  ```bash
  cp .env.example .env
  php artisan key:generate
  ```

  > Tidak perlu mengubah file `.env` karena konfigurasi database default Laragon sudah sesuai.

### 4. Jalankan Server Laravel

  Pastikan masih berada di directory `api_mahasiswa`, lalu jalankan:

  ```bash
  php artisan serve
  ```

  Jika berhasil, akan muncul informasi seperti:

  ```
  Server running on http://127.0.0.1:8000
  ```

  Biarkan terminal tetap terbuka selama proses testing API.

## API Endpoint List & Panduan Tes

Gunakan **Postman** dengan base URL:

```
http://127.0.0.1:8000/api
```

### Autentikasi

  #### Langkah 1: Login untuk Mendapatkan Token

  Langkah ini harus dilakukan terlebih dahulu untuk mendapatkan access token.

  - **Method:** `POST`  
  - **Endpoint:** `/auth/login`  
  - **Body** (`form-data`):
    - `email`: `admin@example.com`
    - `password`: `password`

  Jika berhasil, copy value `access_token` dari response JSON yang muncul.

  #### Langkah 2: Cek Info User

  Tes ini dilakukan untuk memastikan token valid.

  - **Method:** `GET`  
  - **Endpoint:** `/auth/me`  
  - **Authorization:** Di tab **Authorization**, pilih `Bearer Token`, lalu paste token yang sudah dicopy.

### Mahasiswa (Students)

> Semua endpoint berikut memerlukan Bearer Token di tab Authorization.

  #### 1. Lihat Semua Mahasiswa (Read)

  - **Method:** `GET`  
  - **Endpoint:** `/students`

  #### 2. Tambah Mahasiswa (Create)

  - **Method:** `POST`  
  - **Endpoint:** `/students`  
  - **Body** (`form-data`): isi `nim`, `nama`, dan `jurusan`

  #### 3. Lihat Detail Mahasiswa (Read)

  - **Method:** `GET`  
  - **Endpoint:** `/students/{id}`  
    *(ganti `{id}` dengan ID mahasiswa, contoh: `/students/1`)*

  #### 4. Edit Mahasiswa (Update)

  - **Method:** `PUT`  
  - **Endpoint:** `/students/{id}`

    ##### Cara tes di Postman:
    - Gunakan method `POST` ke endpoint di atas  
    - Di Body (`form-data`), isi `nim`, `nama`, dan `jurusan` yang baru  
    - Tambahkan field `_method` dengan value `PUT`

  #### 5. Hapus Mahasiswa (Delete)

  - **Method:** `DELETE`  
  - **Endpoint:** `/students/{id}`

    ##### Cara tes di Postman:
    - Gunakan method `POST` ke endpoint di atas  
    - Di Body (`form-data`) 
    - Tambahkan field `_method` dengan value `DELETE`
