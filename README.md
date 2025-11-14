# TP8DPBO2425C1
## Janji
Saya Dzaka Musyaffa Hidayat dengan NIM 2404913 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi 

Aplikasi ini adalah implementasi sederhana dari pola desain Model-View-Controller (MVC) menggunakan PHP murni. Aplikasi ini berfungsi sebagai sistem manajemen data akademik dasar, yang memungkinkan pengguna untuk mengelola data Dosen, Mata Kuliah, dan Publikasi.

Proyek ini tidak menggunakan framework eksternal (selain Bootstrap untuk UI) dan dirancang untuk menunjukkan pemisahan yang jelas antara logika bisnis, data, dan presentasi. Interaksi database diamankan menggunakan PDO dengan *prepared statements*.

---

## Fitur Utama

* Manajemen CRUD (Create, Read, Update, Delete) penuh untuk data:
    * Dosen (Lecturers)
    * Mata Kuliah (Courses)
    * Publikasi (Publications)
* Pola CRUD dalam satu halaman (Form Tambah dan Edit digabung dengan tabel data).
* Desain responsif modern menggunakan Bootstrap 5.
* Halaman "Home" sebagai halaman selamat datang.
* Router sederhana (Front Controller) untuk menangani semua permintaan.
* Interaksi database yang aman menggunakan PDO.

## Struktur MVC

Aplikasi ini secara ketat mengikuti pola MVC:

* **Model** (`models/`)

    Bertanggung jawab atas semua interaksi database (koneksi PDO, kueri SQL). Berisi *base model* (`Model.php`) dan model spesifik (`Lecturer.php`, `Course.php`, `Publication.php`). Menyediakan fungsi-fungsi seperti `getLecturer()`, `add()`, `update()`, dan `delete()`.

* **View** (`views/`)

    Bertanggung jawab atas presentasi (UI) kepada pengguna. Terdiri dari file-file *template* (`layout/header.php`, `footer.php`) dan file view utama (`home.php`, `lecturer.php`, dll.). Menerima data dari Controller untuk ditampilkan dalam format HTML/Bootstrap.

* **Controller** (`controllers/`)

    Bertindak sebagai perantara antara Model dan View. Menerima input dari pengguna (melalui `index.php`). Memanggil metode yang sesuai di Model untuk mengambil atau memanipulasi data. Memuat View yang relevan dan mengirimkan data yang diperlukan ke View tersebut.

## Struktur Folder
```
TP8DPBO2425C1
Project
assets
│  │  ├─ bootstrap.bundle.min.js
│  │  ├─ bootstrap.min.css
│  │  ├─ bootstrap.min.js
jquery.min.js
│  │  └─ popper.min.js
│  ├─ config
│  │  └─ connection.php
│  ├─ controllers
│  │  ├─ CourseController.php
│  │  ├─ HomeController.php
│  │  ├─ LecturerController.php
│  │  └─ PublicationController.php
│  ├─ index.php
│  ├─ models
│  │  ├─ Course.php
│  │  ├─ Lecturer.php
Model.php
│  │  └─ Publication.php
│  └─ views
│     ├─ course.php
│     ├─ home.php
layout
│     │  ├─ footer.php
│     │  ├─ header.php
│     │  └─ nav.php
│     ├─ lecturer.php
│     └─ publication.php
README.md
tp_mvc25.sql
```
