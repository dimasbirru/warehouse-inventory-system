<?php
// v2-php/public/edit.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$pesan = '';

// Ambil SKU dari URL
$sku = $_GET['sku'] ?? '';
if ($sku === '') {
    header("Location: index.php");
    exit;
}

// Cari produk yang mau diedit
$produk = $gudang->cariBySKU($sku);
if (!$produk) {
    die("Produk tidak ditemukan.");
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stokBaru = (int)$_POST['stok'];
    $hargaBaru = (int)$_POST['harga'];

    if ($gudang->update($sku, $stokBaru, $hargaBaru)) {
        header("Location: index.php?status=edit_sukses");
        exit;
    } else {
        $pesan = '<div class="alert alert-danger">Gagal memperbarui data.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>Edit Produk: <?= htmlspecialchars($produk->getNama()) ?></h1>
    
    <?= $pesan ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>SKU Produk (Tidak bisa diubah)</label>
            <input type="text" value="<?= htmlspecialchars($produk->getSKU()) ?>" disabled style="background-color: #eee;">
        </div>
        <div class="form-group">
            <label>Nama Produk (Tidak bisa diubah)</label>
            <input type="text" value="<?= htmlspecialchars($produk->getNama()) ?>" disabled style="background-color: #eee;">
        </div>
        <div class="form-group">
            <label>Stok Baru</label>
            <input type="number" name="stok" required min="0" value="<?= $produk->getStok() ?>">
        </div>
        <div class="form-group">
            <label>Harga Baru (Rp)</label>
            <input type="number" name="harga" required min="0" value="<?= $produk->getHarga() ?>">
        </div>
        <button type="submit" class="btn btn-success">Update Data</button>
        <a href="index.php" class="btn">Batal</a>
    </form>
</div>
</body>
</html>