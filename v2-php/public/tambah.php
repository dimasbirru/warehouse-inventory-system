<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = trim($_POST['sku']);
    $nama = trim($_POST['nama']);
    $stok = (int)$_POST['stok'];
    $harga = (int)$_POST['harga'];

    if ($sku === '' || $nama === '') {
        $pesan = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>SKU dan Nama tidak boleh kosong!</div>';
    } else {
        $produkBaru = new Produk($sku, $nama, $stok, $harga);
        if ($gudang->tambah($produkBaru)) {
            header("Location: index.php?status=tambah_sukses");
            exit;
        } else {
            $pesan = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Gagal! SKU sudah digunakan.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Warehouse Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-boxes text-primary me-2"></i>Warehouse System</a>
        <div class="ms-auto">
            <a href="index.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h4 class="fw-bold"><i class="fas fa-plus-circle text-success me-2"></i>Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <?= $pesan ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-bold">SKU Produk</label>
                            <input type="text" name="sku" class="form-control" required placeholder="Contoh: PRD-001">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" required placeholder="Contoh: Indomie Goreng">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stok Awal</label>
                                <input type="number" name="stok" class="form-control" required min="0" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control" required min="0" value="0">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <a href="index.php" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>