# 📦 Warehouse Inventory System

Repositori ini berisi evolusi proyek **Warehouse Inventory System** dari versi konsol berbasis C++ menjadi aplikasi web berbasis **PHP Native**.

## 📂 Struktur Proyek

```text
warehouse-inventory-system/
├── v1-console/   # Versi 1 - Aplikasi konsol C++
└── v2-php/       # Versi 2 - Aplikasi web PHP Native

Versi 1 - Console (C++)
Berada di folder v1-console/.
Bahasa: C++ (OOP)

Fitur: Tambah, tampil, cari, update stok & harga, hapus produk

Penyimpanan: File gudang.txt (auto-save & auto-load)

Analitik: Laporan ringkas dengan Python (analytics/report.py)

Cara menjalankan: Bisa lewat run.bat atau compile manual dengan g++

Versi 2 - Web App (PHP Native + MySQL)
Berada di folder v2-php/.

Ini adalah rewrite dari versi konsol ke aplikasi web menggunakan PHP Native (tanpa framework), PDO, dan MySQL.

Database: MySQL (menggantikan gudang.txt)

CRUD Web: Interface berbasis web dengan validasi

Dashboard: Ringkasan total nilai aset dan peringatan produk stok menipis

Pencarian: Cari produk berdasarkan SKU atau Nama

Cara menjalankan:

Import v2-php/sql/schema.sql ke phpMyAdmin.
Jalankan php -S localhost:8000 di dalam folder v2-php/public.
Buka http://localhost:8000.
✅ Progress
☑ Pindahkan versi C++ ke v1-console/
☑ Setup struktur v2-php/
☑ Buat koneksi database (PDO)
☑ Buat Model Produk & GudangInventaris
☑ Buat CRUD Produk (Web UI)
☑ Tambah halaman laporan & pencarian
□ (Opsional) Fitur export CSV
□ (Opsional) Integrasi grafik Python ke Web
📄 Lisensi
Proyek ini dilisensikan dibawah MIT License.

Dibuat oleh @dimasbirru