# Warehouse Inventory System

Repositori ini berisi evolusi proyek **Warehouse Inventory System** dari versi konsol berbasis C++ menjadi aplikasi web berbasis Laravel.

## Struktur Proyek

```text
warehouse-inventory-system/
├── v1-console/   # Versi 1 - Aplikasi konsol C++ (CRUD + File I/O)
└── v2-laravel/   # Versi 2 - Aplikasi web Laravel (Rewrite)
```

## Versi 1 - Console (C++)

Berada di folder [`v1-console/`](./v1-console/).

- **Bahasa**: C++ (OOP)
- **Fitur**: Tambah, tampil, cari, update stok & harga, hapus produk
- **Penyimpanan**: File `gudang.txt` (auto-save & auto-load)
- **Analitik**: Laporan ringkas dengan Python (`analytics/report.py`)
- **Cara menjalankan**: Bisa lewat `run.bat` atau compile manual dengan `g++`

Lihat [README v1-console](./v1-console/README.md) untuk detail lengkap.

## Versi 2 - Web (Laravel) - *In Progress*

Berada di folder [`v2-laravel/`](./v2-laravel/).

Rewrite dari versi konsol ke aplikasi web dengan tujuan:

- **Database**: MySQL/SQLite (ganti `gudang.txt`)
- **CRUD Web**: Interface berbasis web dengan validasi
- **Dashboard**: Ringkasan stok, nilai aset, produk stok menipis
- **Lebih realistis**: Siap dikembangkan jadi sistem gudang yang bisa dipakai beneran

## Progress

- [x] Pindahkan versi C++ ke `v1-console/`
- [ ] Setup Laravel di `v2-laravel/`
- [ ] Buat CRUD Produk
- [ ] Import data dari `gudang.txt`
- [ ] Tambah dashboard & fitur pendukung

## Lisensi

Proyek ini dilisensikan dibawah [MIT License](./v1-console/LICENSE).

Dibuat oleh [@dimasbirru](https://github.com/dimasbirru)
