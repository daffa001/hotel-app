# Instruksi Debugging untuk Date Blocking

## Langkah-langkah Debugging

### 1. Test API Endpoint
Buka browser dan akses URL berikut untuk memastikan API berfungsi:
```
http://your-domain.com/test-booked-dates
```
Seharusnya menampilkan JSON dengan message, timestamp, dan jumlah transactions.

### 2. Test API Booked Dates
Akses URL berikut untuk test API booked dates:
```
http://your-domain.com/api/booked-dates
```
Seharusnya menampilkan JSON dengan disabled_dates dan room_specific_dates.

### 3. Buka Developer Console
1. Buka halaman booking (yang memiliki form tanggal)
2. Tekan F12 atau klik kanan → Inspect Element
3. Pilih tab "Console"
4. Refresh halaman
5. Lihat output console log

### 4. Cek Log yang Seharusnya Muncul
Di console browser, Anda seharusnya melihat:
```
DOM Content Loaded - Initializing date blocking
Today date: 2024-12-17
Found date inputs: [jumlah]
Room ID input found: [null atau element]
Found general forms: [jumlah]
Fetching booked dates for room: [room_id atau null]
Response status: 200 OK
Received booked dates data: {disabled_dates: [...], room_specific_dates: {...}}
```

### 5. Test Manual Date Selection
1. Setelah halaman load, coba pilih tanggal yang sudah Anda booking (17-20)
2. Lihat di console apakah ada log validation
3. Cek apakah ada error message

### 6. Verifikasi Data di Database
Cek apakah booking Anda tersimpan dengan benar:
- Tabel: `transactions`
- Field: `room_id`, `check_in`, `check_out`, `status`
- Status seharusnya: 'Reservation'

### 7. Cek Laravel Logs
Buka file log Laravel di:
```
storage/logs/laravel.log
```
Cari log dengan keyword "getBookedDates called"

## Kemungkinan Masalah dan Solusi

### Masalah 1: Route Tidak Ditemukan (404)
**Gejala**: Console menampilkan HTTP error 404
**Solusi**: 
- Pastikan route sudah di-cache: `php artisan route:cache`
- Atau clear cache: `php artisan route:clear`

### Masalah 2: JavaScript Tidak Load
**Gejala**: Tidak ada log di console sama sekali
**Solusi**:
- Pastikan jQuery sudah load
- Cek apakah ada JavaScript error yang memblokir

### Masalah 3: Form Tidak Terdeteksi
**Gejala**: Log menunjukkan "Found general forms: 0" atau "Room ID input found: null"
**Solusi**:
- Cek struktur HTML form
- Pastikan input name="from", name="to", name="room" sesuai

### Masalah 4: Data Booking Tidak Ditemukan
**Gejala**: API return empty disabled_dates
**Solusi**:
- Cek database apakah booking tersimpan
- Pastikan tanggal check_out >= hari ini
- Cek format tanggal di database

### Masalah 5: Validasi Tidak Trigger
**Gejala**: Tanggal bisa dipilih tapi tidak ada alert
**Solusi**:
- Cek apakah event listener terpasang
- Pastikan data-disabled-dates attribute ada

## Test Manual Step by Step

1. **Buat Booking Baru**:
   - Pilih kamar ID 1
   - Tanggal: 17-20 Desember 2024
   - Simpan booking

2. **Test di Form yang Sama**:
   - Refresh halaman
   - Coba pilih tanggal 17, 18, 19
   - Seharusnya muncul alert error

3. **Cek Response API**:
   ```
   /api/booked-dates?room_id=1
   ```
   Seharusnya return:
   ```json
   {
     "disabled_dates": ["2024-12-17", "2024-12-18", "2024-12-19"],
     "room_specific_dates": {
       "2024-12-17": [1],
       "2024-12-18": [1], 
       "2024-12-19": [1]
     }
   }
   ```

## Troubleshooting Berdasarkan Console Log

### Jika Tidak Ada Log Sama Sekali:
- JavaScript error atau jQuery tidak load
- Cek Network tab untuk melihat resource yang gagal load

### Jika Log Hanya Sampai "Fetching booked dates":
- Masalah network/API
- Cek Network tab untuk melihat request status

### Jika API Return Data Tapi Validasi Tidak Jalan:
- Event listener tidak terpasang
- Selector JavaScript salah

### Jika Validasi Jalan Tapi Tidak Block Tanggal:
- Logic validation salah
- Data format tidak match

## Informasi yang Perlu Dilaporkan

Jika masalah masih berlanjut, berikan informasi berikut:

1. **Console Log Output**: Copy semua log dari console
2. **API Response**: Output dari `/api/booked-dates`
3. **Database Data**: Data dari tabel transactions
4. **Browser**: Chrome/Firefox/Safari version
5. **URL**: Halaman mana yang ditest
6. **Form Type**: General search atau room-specific booking