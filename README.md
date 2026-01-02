# 📝 Aplikasi Todo List - Dikerjain

Aplikasi web sederhana untuk manajemen tugas pribadi yang memungkinkan pengguna untuk menambah, mengedit, dan menghapus tugas secara efisien. Proyek ini dibangun menggunakan **PHP Native** dengan arsitektur **MVC**.

---


## 🔐 Important!

> ⚠️ Untuk menjalankan aplikasi web dengan baik, pastikan device terhubung dengan internet.

---

## 🎯 Tujuan Proyek
Membangun sistem manajemen tugas yang terorganisir dengan fokus pada keamanan data dan kemudahan penggunaan antarmuka.

---

## ✨ Fitur Wajib

### 1. Autentikasi Pengguna
* **Registrasi & Login:** Pengguna harus mendaftar sebelum dapat mengelola tugas.
* **Keamanan Password:** Implementasi hash dan salt untuk penyimpanan kata sandi yang aman.

### 2. Manajemen Tugas
* **Pembuatan Tugas:** Input judul, deskripsi, dan tanggal jatuh tempo.
* **Format Daftar:** Menampilkan seluruh tugas dalam tampilan list yang rapi.
* **Edit & Hapus:** Fleksibilitas untuk memperbarui atau menghapus data tugas.

### 3. Session Management
* **Kontrol Sesi:** Memastikan pengguna tetap masuk saat beraktivitas.
* **Keamanan Sesi:** Sesi berakhir otomatis ketika pengguna keluar atau setelah periode inaktivitas tertentu.

---

## 📂 Struktur Folder (MVC)

Pemisahan folder dilakukan berdasarkan tanggung jawab masing-masing komponen:

* **📁 controllers/** : Berisi logika kontrol aplikasi (Task, User, Calendar, Setting).
* **📁 models/** : Menangani operasi database dan logika data.
* **📁 views/** : Berisi file antarmuka (UI) untuk setiap fitur.
    * *calendar/* : Tampilan jadwal.
    * *settings/* : Pengaturan profil.
    * *tasks/* : Halaman kelola tugas (Board, List, Edit).
    * *users/* : Halaman Login dan Sign up.
* **📁 src/** : Aset pendukung seperti CSS (Tailwind), JS, dan gambar.
* **📄 config.php** : File konfigurasi koneksi database.
* **📄 Schema.sql** : Skema tabel database (Users & Tasks).
* **📄 index.php** : File utama yang menjalankan aplikasi.

---

## 🛠️ Pengembangan & Keamanan

Sesuai ketentuan pengembangan, aplikasi ini mengimplementasikan:
1. **Desain Database:** Relasi efektif antara tabel pengguna dan tabel tugas.
2. **Backend PHP:** Script CRUD yang menangani operasi data.
3. **Sanitasi Data:** Menghindari serangan SQL Injection melalui validasi input.
4. **Frontend UI:** Desain sederhana dan fungsional menggunakan HTML, CSS, dan JS untuk validasi form.

---

## 🚀 Cara Menjalankan

1. **Database:** Import `Schema.sql` ke MySQL Anda.
2. **Konfigurasi:** Sesuaikan data user/pass database pada file `config.php`.
3. **Akses:** Letakkan folder di penyimpanan lokal komputer dan akses melalui browser.

---
**Status Proyek:** Selesai Pengembangan & Testing

---

## 👥 Contributors

| Role | Name | GitHub | Picture |
|------|------|--------|---------|
| 👑 Lead | I Putu Willy Nugraha | [@Lincosin](https://github.com/Lincosin) | <img src="https://github.com/Lincosin.png" width="50"/> |
|      | Gede Dirandra Satya Mahayana | [@D1RYZX](https://github.com/D1RYZX) | <img src="https://github.com/D1RYZX.png" width="50"/> |
|      | I Made Gede Nuryana Putra | [@nuryanaputra19-stack](https://github.com/nuryanaputra19-stack) | <img src="https://github.com/nuryanaputra19-stack.png" width="50"/> |


---

> 📚 **Let's start our productivity day with Dikerjain!.**
