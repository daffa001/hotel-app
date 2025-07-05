<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Pengenalan Konsep Aplikasi
Project Hotel-app adalah website Pemesanan atau Booking kamar hotel online yang fokus pada satu perusahaan hotel. Melalui project ini, perusahaan dapat mempromosikan berbagai kamar kepada pelanggan mereka. Website ini menawarkan informasi terperinci tentang hotel. Selain itu, project ini menyediakan fitur pemesanan online yang aman dan nyaman bagi pelanggan. Dengan adanya website pemesanan kamar hotel ini, perusahaan dapat memperluas jangkauan mereka secara online dan memberikan pengalaman booking online yang lebih baik kepada pelanggan. Selain fitur pemesanan online, Project ini juga mempunyai fitur pemesanan melalui offline, karena data data nya terhubung langsung sehingga menjadi mudah untuk pengecekan reservasi kamar.


## Authentikasi 
Aplikasi ini menyediakan 2 role berikut :
### Admin
Admin memiliki tugas yang sangat kompleks, seperti membuat, mengedit dan menghapus data Kamar,Status Kamar,User,Metode Pembayaran, Metode Delivery, bahkan Transaksi sekaligus.
- Username : admin
- Password : admin (same as username)

### Konsumen
Siswa berperan sebagai konsumen, siswa dapat melihat history pembayaran dan profile nya sendiri.
- Username : customer
- Password : customer  (same as username)

## Setting UP
Menyiapkan dan mensetting project hotel-app (laravel 9) require (Composer v2.2.4 ,Git, MYSQL PHP > v5 (v8.1.1))
- Buka CMD atau Aplikasi Command lainnya
- Masuk ke Directory apa saja untuk menyiapkan folder project. Contoh (cd C:\xampp\htdocs)

- Setelah project berhasil di download ekstrak jika file berupa zip, lalu ketikan Composer install di CMD dan tunggu hingga selesai diunduh.
- Buat database MYSQL dan Buka project hotel-app, Cari file dengan nama .envexample kemudian edit nama file tersebut menjadi .env dan buka file tersebut.
- Setelah file dibuka, Ubah Database_name dan lainnya sesuai dengan database yang baru dibuat.
- Buka CMD kembali Ketik php artisan key:generate dan php artisan migrate --seed / php artisan migrate:fresh --seed. Setelah data berhasil di dapatkan lalu jalankan Project dengan PHP ARTISAN SERVE.
- Project Berhasil DiClone.



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
The Asset image (image room) is not mine, its free source image on google.
