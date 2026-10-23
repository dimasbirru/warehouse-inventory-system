<div align="center">

# 📦 Warehouse Inventory System

**Aplikasi manajemen inventaris gudang berbasis konsol — C++ berorientasi objek dengan penyimpanan data otomatis.**

[![C++](https://img.shields.io/badge/C%2B%2B-17-00599C?logo=cplusplus&logoColor=white)](https://isocpp.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Platform](https://img.shields.io/badge/platform-Windows%20%7C%20Linux%20%7C%20macOS-lightgrey)](#-cara-menjalankan)
[![Build](https://img.shields.io/badge/build-g%2B%2B-blue)](#-cara-menjalankan)

</div>

---

## 📖 Tentang

Warehouse Inventory System adalah program konsol sederhana untuk mencatat dan mengelola
stok barang di sebuah gudang. Dibangun menggunakan **C++ murni** dengan paradigma
**Object-Oriented Programming (OOP)**: data produk dibungkus dalam class `Produk`
(encapsulation), sedangkan seluruh operasi inventaris ditangani oleh class
`GudangInventaris`.

Data inventaris **tersimpan otomatis** ke file `gudang.txt` saat program ditutup dan
**dimuat kembali** saat program dijalankan, sehingga data tidak hilang antar sesi.

## ✨ Fitur

| # | Fitur | Deskripsi |
|---|-------|-----------|
| ➕ | **Tambah Produk** | Input SKU, nama, stok, dan harga (kapasitas maks. 5 produk) |
| 📋 | **Tampilkan Produk** | Menampilkan seluruh daftar inventaris dalam format tabel |
| 🔍 | **Cari Produk** | Pencarian produk berdasarkan SKU secara linear |
| 🔄 | **Update Stok** | Perbarui jumlah stok produk berdasarkan SKU |
| 🗑️ | **Hapus Produk** | Hapus produk dengan penggeseran elemen array (shift) |
| 💾 | **Penyimpanan Otomatis** | Simpan ke `gudang.txt` saat keluar & muat otomatis saat program dibuka |

## 🖥️ Preview

```
========================================
    APLIKASI WAREHOUSE INVENTORY SYSTEM
========================================
1. Tambah Produk
2. Tampilkan Produk
3. Cari Produk
4. Update Stok
5. Hapus Produk
6. Keluar
Ketikan Pilihan Anda (1-6): 2

=======================================================
                DAFTAR INVENTARIS GUDANG
=======================================================
1. SKU   : SKU-001
   Nama  : Kardus Packing 10kg
   Stok  : 120
   Harga : Rp 3500
-------------------------------------------------------
```

## 🚀 Cara Menjalankan

```bash
# Linux / macOS
g++ -std=c++11 -o warehouse src/main.cpp
./warehouse

# Windows (MinGW / TDM-G++)
g++ -std=c++11 -o warehouse.exe src/main.cpp
warehouse.exe
```

> Jalankan dari **root proyek** agar file `gudang.txt` tersimpan konsisten di satu lokasi.

## 📂 Struktur Proyek

```
warehouse-inventory-system/
├── src/
│   ├── main.cpp        # Class Produk & GudangInventaris + menu utama
│   └── gudang.txt      # Data inventaris (dibuat otomatis saat program keluar)
├── LICENSE             # Lisensi MIT
└── README.md
```

> `gudang.txt` adalah data runtime dan **tidak ikut di-commit** ke repository.

## 🧠 Konsep yang Dipelajari

- **OOP**: class, encapsulation (`private` + getter/setter), constructor
- Array statik dan pengelolaan jumlah elemen
- Algoritma **CRUD** (Create, Read, Update, Delete)
- Pencarian linier berdasarkan kunci (SKU)
- Algoritma penghapusan elemen array (memindahkan elemen ke kiri)
- **File I/O** dengan `ifstream` / `ofstream` untuk persistensi data

## 🗺️ Roadmap

- [x] ~~Penyimpanan data ke file (`fstream`) agar tidak hilang saat program ditutup~~
- [x] ~~Refactor ke paradigma OOP~~
- [ ] Kapasitas dinamis menggunakan `std::vector`
- [ ] Validasi input yang lebih ketat (angka, format SKU, duplikat)
- [ ] Pencarian binaris setelah data diurutkan
- [ ] Antarmuka berbasis terminal yang lebih rapi (warna & layout)
- [ ] Ekspor laporan inventaris ke CSV

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

<div align="center">
Dibuat oleh <a href="https://github.com/dimasbirru">@dimasbirru</a> · Belajar C++ satu proyek setiap waktu 💻
</div>
