
## Instalasi

Beriikut merupakan Proses instalasi:

- Download / Clone Project ini
- lalu aktifkan web server lalu akses [phpmyadmin](http://localhost/phpmyadmin)
- setelah mengakses phpmyadmin, pastikan bahwa anda memiliki User Account dengan username = root dan password = '' (kosong)
- buat database baru dengan nama laravel-holahalo-katalog

setelah membuat database, maka proses selanjutnya :

- buka folder project
- ubah file .env.example menjadi .env
- buka file .env tersebut lalu ubah
- - DB_DATABASE=homestead
- - DB_USERNAME=homestead
- - DB_PASSWORD=secret

menjadi

- - DB_DATABASE=laravel-holahalo-katalog
- - DB_USERNAME=root
- - DB_PASSWORD=

setelah mengubah file .env maka selanjutnya yaitu:

- membuka terminal didalam directory Project ini (contoh: c:xampp/htdocs/simple-katalog-master/)
- jalankan perintah "composer install" (pastikan composer telah terinstall di komputer anda) dan tunggu sampai proses selesai
- selanjutnya jalankan perintah "php artisan key:generate"
- jika telah selesai, maka selanjutnya adalah jalankan peritah "php artisan migrate" pada terminal anda dan tunggu sampai proses selesai

Jika semua instuksi diatas telah dilaksanakan, maka proses instalasi telah selesai. selanjutnya yaitu jalankan perintah "php artisan serve" pada terminal anda untuk mengakses project ini.
akses link yang muncul pada terminal (atau akses [link-link-ini](http://127.0.0.1:8000/)) melalui browser.

Untuk selanjutnya baca instruksi dibawah ini.

## WEBSITE

- pertama-tama akses [halaman-register](http://127.0.0.1:8000/register) untuk membuat admin baru
- masukan nama, email, password dan konfirmasi password
- setelah berhasil maka akan menampilkan halaman awal website
- setelah berhasil membuat admin baru, anda dapat langsung mengakses [panel-admin](http://127.0.0.1:8000/admin/katalog) untuk menambah Produk dan Kategori baru

--

- sebelum menambah produk, pastikan anda telah menambah kategori pada halaman [Kategori](http://127.0.0.1:8000/admin/kategori) dengan menekan tombol "Tambah Kategori"
- isi nama kategori, lalu submit
- isilah kategori sesuai dengan kemauan anda

-- 

- setelah kategori tersedia maka selanjutnya adalah membuat postingan baru untuk produk dengan mengakses halaman [Katalog](http://127.0.0.1:8000/admin/katalog)
- lalu tekan tombol "Tambah Produk"
- lalu isi formulir yang tersedia seperti Nama Produk, Nama Model, Foto dan Kategori. Anda bebas memilih kategori manapun
- lalu submit
- setalah menekan submit anda akan diarahkan ke halaman Katalog, disitu terdapat katalog yang telah diinputkan sebelumnya

-- 

- untuk melihat tampilan depan, anda dapat mengakses link yang terdapat diatas bertuliskan [Lihat-Halaman-Depan](http://127.0.0.1:8000/katalog)
- anda dapat mencari produk sesuai kategori dengan memilih kategori lalu menekan tombol "cari" ataupun dengan menekan salah satu kategori yang terdapat dibawah postingan produk

