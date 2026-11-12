<?php
// v2-php/public/tambah.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = trim($_POST['sku']);
    $nama = trim($_POST['nama']);
    $stok = (int)$_POST['stok'];
    $harga = (int)$_POST['harga'];

    // Validasi sederhana
    if ($sku === '' || $nama === '') {
        $pesan = '<div class="alert alert-danger">SKU dan Nama tidak boleh kosong!</div>';
    } else {
        $produkBaru = new Produk($sku, $nama, $stok, $harga);
        if ($gudang->tambah($produkBaru)) {
            // Jika berhasil, redirect ke index dengan pesan sukses
            header("Location: index.php?status=tambah_sukses");
            exit;
        } else {
            $pesan = '<div class="alert alert-danger">Gagal! SKU sudah digunakan.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Tambah Produk Baru</h1>
    
    <?= $pesan ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>SKU Produk</label>
            <input type="text" name="sku" required placeholder="Contoh: PRD-001">
        </div>
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama" required placeholder="Contoh: Indomie Goreng">
        </div>
        <div class="form-group">
            <label>Stok Awal</label>
            <input type="number" name="stok" required min="0" value="0">
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" required min="0" value="0">
        </div>
        <button type="submit" class="btn btn-success">Simpan Produk</button>
        <a href="index.php" class="btn">Batal</a>
    </form>
</div>
</body>
</html>