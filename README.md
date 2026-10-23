<div align="center">

# 📦 Warehouse Inventory System

**Aplikasi manajemen inventaris gudang berbasis konsol — C++ berorientasi objek dengan penyimpanan data otomatis.**

[![C++](https://img.shields.io/badge/C%2B%2B-11-00599C?logo=cplusplus&logoColor=white)](https://isocpp.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Platform](https://img.shields.io/badge/platform-Windows%20%7C%20Linux%20%7C%20macOS-lightgrey)](#-cara-menjalankan-dev-c)
[![Build](https://img.shields.io/badge/build-Dev--C%2B%2B-blue)](#-cara-menjalankan-dev-c)

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

## 🚀 Cara Menjalankan (Dev-C++)

1. Buka **Dev-C++** → `File` → `Open` → pilih `src/main.cpp`.
2. Klik **Execute** → **Compile & Run** (atau tekan `F11`).
3. Jendela konsol akan terbuka dan menu aplikasi langsung tampil.

> File `gudang.txt` dibuat otomatis di folder tempat program dijalankan (saat lewat Dev-C++, biasanya di folder `src/`).

## 🧠 Konsep yang Dipelajari

- **OOP**: class, encapsulation (`private` + getter/setter), constructor
- Array statik dan pengelolaan jumlah elemen
- Algoritma **CRUD** (Create, Read, Update, Delete)
- Pencarian linier berdasarkan kunci (SKU)
- Algoritma penghapusan elemen array (memindahkan elemen ke kiri)
- **File I/O** dengan `ifstream` / `ofstream` untuk persistensi data

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

<div align="center">
Dibuat oleh <a href="https://github.com/dimasbirru">@dimasbirru</a> · Belajar C++ satu proyek setiap waktu 💻
</div>
