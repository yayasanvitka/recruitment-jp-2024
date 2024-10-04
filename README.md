# Recruitment Test

**Junior Programmer Yayasan Vitka (Backend) 2024**
<hr>

Ini merupakan Test Untuk Backend Junior Programmer Yayasan Vitka,

## Batas Waktu pengerjaan

<hr>

Maksimal 7 Hari setelah soal diberikan. **Lebih cepat lebih baik**

### Skill Requirement

<hr>

- PHP
- CSS
- understand Laravel Framework
- Understand GIT and able to use it in workflow
- Understand MySQL
- JavaScript

### Detail Tentang Aplikasi

<hr>

![image](https://github.com/user-attachments/assets/196777aa-b38b-47f2-9713-d396cd5c58b3)

Aplikasi ini digunakan untuk pendataan dan memiliki fitur sebagai berikut:

1. CRUD untuk Supplier
   - Terdapat operasi Create, Read, Update, dan Delete untuk Supplier.

2. CRUD untuk Category
   - Terdapat operasi Create, Read, Update, dan Delete untuk Category.

3. CRUD untuk Product
   - Terdapat operasi Create, Read, Update, dan Delete untuk Product.
   - Pada form Product, dapat memilih Supplier dan Category.
   - Setiap Product terhubung dengan satu Supplier dan satu Categori.

4. CRUD untuk Warehouse
   - Terdapat operasi Create, Read, Update, dan Delete untuk Warehouse.
   - Fitur untuk mengelola product di setiap warehouse:
     **a.** Menambahkan product  ke warehouse; 
     **b.** Menghapus product  dari warehouse; 
     **c.** Menampilkan daftar product yang tersedia di setiap warehouse.

### Challenge Detail

<hr>
Kamu diminta menggunakan [BackPack](https://backpackforlaravel.com/docs) untuk membuat fitur no 4 pada 'Detail Tentang Aplikasi' dengan detail:

1. Buat Migrasi, Model dan CRUD untuk Warehouses. Tabel ini hanya memiliki column `name` selain primary dan timestamp.
2. Relasikan products dengan warehouses (implementasikan relasi database dan CRUD,_many-to-many_) dan intermediate
   table product_warehouse, sesuaikan dengan penjelasan fitur no 4 pada 'Detail Tentang Aplikasi'.
3. Tambahkan validasi form ketika create dan update pada Products dan Warehouse yang sesuai pada model masing-masing.
4. Tambahkan filters (berdasarkan Category dan Supplier) pada halaman Products.

Bonus Quest:

5. Buat API untuk data Products dengan format API: `{“data”:[[…], […], …], “count”:X}`.

Silahkan fork repositori ini, jalankan migrasi database, dan seeder untuk user.

Lakukan <strong>Pull Request</strong> untuk challenge di bawah ini:

### Rules Tambahan

<hr>

1. Setiap point dalam challenge harus di submit dalam `pull request` yang terpisah.
2. Peserta tidak harus menyelesaikan seluruh challenge, namun bobot penilaian tentunya akan lebih tinggi jika peserta
   mampu menyelesaikan seluruh challenge yang diberikan.

### Referensi

<hr>

- <img src="https://avatars3.githubusercontent.com/u/958072?s=200&v=4" width="12px"></img> [Laravel](https://laravel.com/docs/11.x)
- <img src="https://avatars0.githubusercontent.com/u/15017015?s=200&v=4" width="12px"></img> [BackPack](https://backpackforlaravel.com/docs)
- [Web Development Standard - Yayasan Vitka](https://kb.yayasanvitka.id/books/development-guidelines/page/web-development)

### Contact

<hr>

**[Stefanus E. Prasetyo](mailto:stefanus@yayasanvitka.id)** <br/>
**[Indra](mailto:indra@yayasanvitka.id)**
