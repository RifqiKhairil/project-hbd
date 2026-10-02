# Projek HBD

Website PHP untuk ucapan ulang tahun. Aplikasi menggunakan runtime PHP komunitas di Vercel dan database MySQL eksternal.

## Deploy ke Vercel

1. Push repository ke GitHub, lalu impor repository tersebut di Vercel.
2. Tambahkan environment variables berikut di **Project Settings > Environment Variables** untuk environment Production (tambahkan Preview juga bila diperlukan):
   - `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`: kredensial MySQL dari penyedia database eksternal.
   - `LOGIN_USERNAME` dan `LOGIN_PASSWORD`: kredensial halaman login.
   - `AUTH_SECRET`: secret acak minimal 32 byte. Buat dengan `php -r "echo bin2hex(random_bytes(32)), PHP_EOL;"`.
3. Siapkan database MySQL dan tabel pesan:

   ```sql
   CREATE TABLE tb_pesan (
     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     nama VARCHAR(100) NOT NULL,
     pesan TEXT NOT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Deploy dari Vercel. `vercel.json` memakai runtime PHP komunitas `vercel-php`; build pertama mungkin perlu waktu lebih lama.

Vercel tidak menyediakan MySQL lokal. Gunakan database yang dapat diakses dari internet dan isi variabel koneksi dari penyedia tersebut. Jangan commit file `.env` atau memasukkan nilai environment ke source code.

## Lokal

Salin `.env.example` menjadi `.env` sebagai catatan konfigurasi lokal, lalu atur nilainya di environment PHP yang digunakan. PHP bawaan tidak memuat `.env` secara otomatis. Jalankan situs dengan PHP lokal dan pastikan database MySQL serta tabel `tb_pesan` sudah tersedia.
 
