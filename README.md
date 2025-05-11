# TP9DPBO2025C2

# JANJI
Saya Faiz Bayu Erlangga dengan NIM 2311231 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## DESAIN PROGRAM
Program ini berisikan data mahasiswa yang dimana terdapat ID, NIM, NAMA, TEMPAT, TANGGAL LAHIR, GENDER, EMAIL, dan TELP. Dalam pemograman ini menggunakan konsep MVP (Model, View, Presenter), dimana memiliki peran dan fungsi yang berbeda beda. 

A. Struktur File

1. Model
   - DB.class.php
   - Mahasiswa.class.php
   - TabelMahasiswa.php
   - Template.class.php
2. Presenter
   - KontrakPresenter.php
   - ProsesMahasiswa.php
3. Templates
   - skin.html
4. View
   - EditMahasiswa.php
   - KontrakView.php
   - TambahMahasiswa.php
   - TampilMahasiswa.php
5. Index.php

B. Penjelasan MVP

1. Model : Berisi seluruh logika data, termasuk akses database dan representasi data.
- DB.class.php	: Mengelola koneksi ke database (open, close, query, dll).
- Mahasiswa.class.php	: Representasi satu entitas Mahasiswa (dengan getter-setter). (atribut ada nim, nama, tanggal lahir(tl), tempat(tempat lahir), gender, email, telp(nomor telepon))
- TabelMahasiswa.php : Berinteraksi langsung dengan tabel mahasiswa di database (CRUD), terdapat fungsi yang menggunakan query SQL, seperti getMahasiswa, getMahasiswaById, addMahasiswa, updateMahasiswa, deleteMahasiswa.
- Template.class.php : Mengatur layout/tampilan HTML dinamis menggunakan template.
   
3. Presenter : Berisi logika bisnis dan penghubung antara View dan Model. Presenter tidak tahu UI secara langsung, tapi bertugas mengatur data yang akan ditampilkan.
- ProsesMahasiswa.php : Menangani proses data Mahasiswa (mengambil dari model dan mempersiapkan untuk View).
- KontrakPresenter.php : Interface atau kontrak yang mendefinisikan metode-metode yang wajib dimiliki Presenter.
   
4. View : Berisi tampilan antarmuka pengguna (form HTML, tabel, dsb), dan hanya menampilkan data yang dikirim oleh Presenter.
- TampilMahasiswa.php : Menampilkan daftar mahasiswa (dapat memanggil presenter untuk mengambil data).
- EditMahasiswa.php : Form untuk mengedit data mahasiswa.
- TambahMahasiswa.php : Form untuk menambah data mahasiswa.
- KontrakView.php : interface View, untuk kontrak tampilan.

5. Tambahan index : Sebagai entry point, mengatur alur program: Menampilkan tampilan default (list mahasiswa), Menangani input GET / POST, Meneruskan aksi ke Presenter yang sesuai

## ALUR PROGRAM

1. User membuka index.php (halaman utama)
- View TampilMahasiswa.php di-load.
- Objek TampilMahasiswa dibuat → memanggil Presenter ProsesMahasiswa.
- Presenter memanggil Model TabelMahasiswa untuk mengambil data dari database.
- Data dikembalikan ke View dan ditampilkan dalam tabel HTML.
  
2. Ketika user menambah mahasiswa dengan klik tambah mahasiswa
- User klik menu Tambah Mahasiswa → membuka TambahMahasiswa.php.
- User mengisi form dan menekan tombol Submit.
- Form dikirim via POST ke index.php.
- Di index.php, dicek: jika POST dan isset($_POST['nim']), maka:
- Objek TampilMahasiswa dibuat, lalu add($_POST) dipanggil.
- Di dalam TampilMahasiswa, dipanggil ProsesMahasiswa->tambahMahasiswa($data).
- ProsesMahasiswa memanggil TabelMahasiswa->addMahasiswa($data).
- TabelMahasiswa menjalankan query SQL INSERT ke database.
- Data berhasil ditambahkan
- Kembali ke page index

3. Ketika user klik edit
- Browser membuka EditMahasiswa.php?id=10.
- File EditMahasiswa.php memanggil kembali TampilMahasiswa untuk mengambil data id=10.
- getId() meneruskan permintaan ke Presenter ProsesMahasiswa.
- Presenter mencari data mahasiswa dengan ID tersebut.
- Data ditampilkan dalam form isian (HTML <input>).
- User mengedit data
- User klik update
- Form dikirim ke index.php via metode POST.
- Fungsi edit() di TampilMahasiswa memanggil ubahMahasiswa() di Presenter.
- Presenter (ProsesMahasiswa) memanggil updateMahasiswa() di Model TabelMahasiswa.
- Data di-update di database.
- Kembali ke page index

4. Ketika user klik hapus
- index.php dijalankan dengan parameter ?delete=10
- TampilMahasiswa memanggil fungsi $this->prosesmahasiswa->hapusMahasiswa($id);
- Presenter ProsesMahasiswa melakukan $this->tabelmahasiswa->deleteMahasiswa($id);
- Model TabelMahasiswa mengeksekusi query SQL
- Data terhapus dari database
- Kembali ke page index

## DOKUMENTASI
https://github.com/user-attachments/assets/9dfd17a8-a638-443e-b480-3dce2e588d9b






