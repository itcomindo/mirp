# MM Inline Related Post (MIRP) - WordPress Plugin

**Plugin Name:** MM Inline Related Post (MIRP)  
**Plugin URI:** [https://budiharyono.id/](https://budiharyono.id/)  
**Description:** Plugin untuk menampilkan related post di dalam konten secara otomatis.  
**Version:** 1.0  
**Author:** Budi Haryono  
**Author URI:** [https://budiharyono.id/](https://budiharyono.id/)  
**License:** GPL2  
**License URI:** [https://www.gnu.org/licenses/gpl-2.0.html](https://www.gnu.org/licenses/gpl-2.0.html)  
**Tags:** related posts, inline related posts, content, WordPress, plugin  
**Requires at least:** 5.0  
**Tested up to:** 6.3  
**Requires PHP:** 7.4

## Deskripsi

MM Inline Related Post (MIRP) adalah plugin WordPress yang memungkinkan Anda untuk menampilkan post terkait secara otomatis di dalam konten artikel Anda. Plugin ini sangat berguna untuk meningkatkan interaksi pembaca dengan memberikan rekomendasi artikel terkait yang relevan pada posisi yang strategis di dalam artikel.

## Fitur Utama

- **Penempatan Otomatis Post Terkait:** Plugin ini memungkinkan Anda untuk menyisipkan post terkait secara otomatis setelah paragraf tertentu dalam artikel.
- **Kustomisasi Label:** Anda dapat mengatur label untuk post terkait sesuai keinginan Anda (default: "Baca Juga").
- **Jumlah Post Terkait:** Tentukan jumlah post terkait yang ingin ditampilkan, dengan pilihan antara 1 hingga 4 post.
- **Pengaturan Tampilan:** Atur warna latar belakang, warna label, dan warna tautan post terkait sesuai preferensi Anda.

## Penggunaan

1. **Instalasi dan Aktivasi:**
   - Unggah plugin ke direktori `/wp-content/plugins/` dan aktifkan plugin melalui menu 'Plugins' di WordPress.

2. **Pengaturan Plugin:**
   - Setelah aktivasi, masuk ke halaman **Settings > MIRP Options** untuk mengkonfigurasi pengaturan seperti label post terkait, jumlah post terkait, posisi penyisipan, dan pengaturan tampilan.

3. **Tampilan Post Terkait:**
   - Post terkait akan otomatis muncul pada artikel yang termasuk dalam kategori yang sama, di posisi yang telah Anda tentukan.

## Persyaratan

- WordPress 5.0 atau lebih tinggi
- PHP 7.4 atau lebih tinggi
- Carbon Fields Library (termasuk dalam plugin)

## Cara Kerja

- Plugin menggunakan kategori dari post saat ini untuk mencari post terkait dan menyisipkannya ke dalam konten pada paragraf yang ditentukan.
- Jika jumlah post terkait yang tersedia lebih sedikit dari posisi yang ditentukan, sisa post terkait akan disisipkan di paragraf terakhir artikel.

## FAQ

### 1. Bagaimana cara mengubah jumlah post terkait yang ditampilkan?
Anda bisa mengubahnya melalui pengaturan di **Settings > MIRP Options**.

### 2. Apakah plugin ini kompatibel dengan tema WordPress saya?
MIRP seharusnya kompatibel dengan semua tema WordPress yang sesuai dengan standar WordPress. Jika Anda menemukan masalah kompatibilitas, silakan hubungi pengembang.

### 3. Apakah plugin ini mempengaruhi performa situs?
Plugin ini dirancang untuk ringan dan tidak mempengaruhi performa situs secara signifikan.

## Lisensi

Plugin ini didistribusikan di bawah lisensi GPL2. Untuk detail lebih lanjut, silakan lihat [halaman lisensi GPL2](https://www.gnu.org/licenses/gpl-2.0.html).

## Kontribusi

Jika Anda memiliki ide, laporan bug, atau kontribusi kode, silakan kirim pull request ke [repository GitHub](https://github.com/username/repository) atau hubungi saya melalui [situs web saya](https://budiharyono.id/).

---

Terima kasih telah menggunakan MM Inline Related Post (MIRP). Semoga plugin ini bermanfaat bagi Anda!
