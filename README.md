Project UAS Back-end Web Dev: REST API Data Mahasiswa
Ini adalah project API sederhana yang kami buat dan berikut adalah anggotanya:
Revaldo Santosa (230040023)
Made Nico Bramantya Putra Wijaya (230040094)
Ida Bagus Gede Upadana Manuaba (230040121)
Ida Bagus Putu Gede Rama Pradnyana (230040175)

Tujuan utama API ini adalah untuk menyediakan layanan back-end yang bisa melakukan operasi data mahasiswa (tambah, lihat, edit, hapus) dan sudah diamankan pakai sistem autentikasi token (JWT/Sanctum).

Fitur-fiturnya:
✅ Otentikasi user pakai token. Login dulu baru bisa akses data.
✅ CRUD (Create, Read, Update, Delete) lengkap untuk data mahasiswa.
✅ Ada akun superadmin yang langsung jadi pas database di-import.
✅ Dibuat pakai PHP & Laravel.
Yang Dibutuhin Biar Jalan:
PHP (v8.1+)
Composer
MySQL atau MariaDB
Postman (Buat ngetes endpoint)
Laragon (Rekomendasi buat yang pakai Windows, biar gampang)
Cara Setup & Jalanin Proyek
Clone Dulu Repo Ini Buka terminal, terus jalanin ini:
git clone https://github.com/sankta777/api_mahasiswa.git
cd api_mahasiswa

Install Library-nya Masih di terminal, ketik perintah ini buat download semua kebutuhan Laravel-nya.

composer install
Siapin Database

Buka phpMyAdmin, buat database baru. Kasih nama api_mahasiswa.
Abis itu, import file database.sql dari repo ini ke database api_mahasiswa yang baru dibuat.
Konfigurasi .env

Copy file .env.example jadi .env.
cp .env.example .env
Buka file .env yang baru, terus pastiin settingan database-nya udah bener (kalau pakai Laragon, biasanya default-nya gini):
DB_DATABASE=api_mahasiswa
DB_USERNAME=root
DB_PASSWORD=
Terakhir, generate application key-nya.
php artisan key:generate
Nyalain Servernya! Udah deh, tinggal jalanin server bawaan Laravel.

php artisan serve
Nanti API-nya bakal aktif di http://127.0.0.1:8000.

Daftar Endpoint API-nya
URL Dasar: http://127.0.0.1:8000/api

Otentikasi

1. Login
   Method: POST
   Endpoint: /auth/login
   Body (form-data):
   email: admin@example.com
   password: password
   Hasil: Kalau sukses, bakal dapat access_token buat dipakai di request lain.
2. Cek Info User
   Method: GET
   Endpoint: /auth/me
   Auth: Wajib pakai Bearer Token.
   Mahasiswa (Students)
   Semua endpoint di bawah ini wajib pakai Bearer Token di header Authorization.

3. Lihat Semua Mahasiswa
   Method: GET
   Endpoint: /students
4. Tambah Mahasiswa
   Method: POST
   Endpoint: /students
   Body (form-data): nim, nama, jurusan
5. Lihat Detail Mahasiswa
   Method: GET
   Endpoint: /students/{id}
6. Edit Mahasiswa
   Method: PUT
   Endpoint: /students/{id}
   Body: nim, nama, jurusan
   Catatan Penting: Kalau ngetes pakai Postman, pakai Method POST ke URL ini, terus di Body tambahin field \_method dengan value PUT. Ini trik khusus buat Laravel.
7. Hapus Mahasiswa
   Method: DELETE
   Endpoint: /students/{id}
   Catatan Penting: Sama kayak edit, kalau ngetes pakai Postman, pakai Method POST ke URL ini dan tambahin field \_method dengan value DELETE di Body.
