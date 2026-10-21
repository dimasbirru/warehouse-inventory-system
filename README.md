<div align="center">

# 📦 Warehouse Inventory System

**Aplikasi manajemen inventaris gudang berbasis konsol — C++ murni, tanpa library eksternal.**

[![C++](https://img.shields.io/badge/C%2B%2B-17-00599C?logo=cplusplus&logoColor=white)](https://isocpp.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Platform](https://img.shields.io/badge/platform-Windows%20%7C%20Linux%20%7C%20macOS-lightgrey)](#-cara-menjalankan)
[![Build](https://img.shields.io/badge/build-CMake%20%7C%20g++-blue)](#-cara-menjalankan)

</div>

---

## 📖 Tentang

Warehouse Inventory System adalah program konsol sederhana untuk mencatat dan mengelola
stok barang di sebuah gudang. Dibangun menggunakan **C++ murni** dengan pendekatan
*menu-driven*, sehingga mudah dipahami bahkan bagi pemula yang sedang belajar
fundamental pemrograman: `struct`, array, perulangan, percabangan, dan operasi CRUD.

## ✨ Fitur

| # | Fitur | Deskripsi |
|---|-------|-----------|
| ➕ | **Tambah Produk** | Input SKU, nama, stok, dan harga (kapasitas maks. 5 produk) |
| 📋 | **Tampilkan Produk** | Menampilkan seluruh daftar inventaris dalam format tabel |
| 🔍 | **Cari Produk** | Pencarian produk berdasarkan SKU secara linear |
| 🔄 | **Update Stok** | Perbarui jumlah stok produk berdasarkan SKU |
| 🗑️ | **Hapus Produk** | Hapus produk dengan penggeseran elemen array (shift) |

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

### Opsi 1 — Kompilasi manual (paling cepat)

```bash
# Linux / macOS
g++ -std=c++11 -o warehouse src/main.cpp
./warehouse

# Windows (MinGW / TDM-G++)
g++ -std=c++11 -o warehouse.exe src/main.cpp
warehouse.exe
```

### Opsi 2 — Menggunakan CMake

```bash
cmake -B build
cmake --build build

# Windows
.\build\Release\warehouse_inventory.exe

# Linux / macOS
./build/warehouse_inventory
```

## 📂 Struktur Proyek

```
warehouse-inventory-system/
├── src/
│   └── main.cpp        # Seluruh logika aplikasi
├── CMakeLists.txt      # Konfigurasi build CMake
├── LICENSE             # Lisensi MIT
└── README.md
```

## 🧠 Konsep yang Dipelajari

- `struct` untuk memodelkan data produk
- Array statik dan pengelolaan jumlah elemen
- Algoritma **CRUD** (Create, Read, Update, Delete)
- Pencarian linier berdasarkan kunci (SKU)
- Algoritma penghapusan elemen array (memindahkan elemen ke kiri)

## 🗺️ Roadmap

- [ ] Kapasitas dinamis menggunakan `std::vector`
- [ ] Penyimpanan data ke file (`fstream`) agar tidak hilang saat program ditutup
- [ ] Validasi input yang lebih ketat (angka, format SKU, duplikat)
- [ ] Pencarian binaris setelah data diurutkan
- [ ] Antarmuka berbasis terminal yang lebih rapi (warna & layout)

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

<div align="center">
Dibuat oleh <a href="https://github.com/dimasbirru">@dimasbirru</a> · Belajar C++ satu proyek setiap waktu 💻
</div>
