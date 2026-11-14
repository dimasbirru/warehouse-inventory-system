<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$pesan = '';

$sku = $_GET['sku'] ?? '';
if ($sku === '') {
    header("Location: index.php");
    exit;
}

$produk = $gudang->cariBySKU($sku);
if (!$produk) {
    die("Produk tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stokBaru = (int)$_POST['stok'];
    $hargaBaru = (int)$_POST['harga'];

    if ($gudang->update($sku, $stokBaru, $hargaBaru)) {
        header("Location: index.php?status=edit_sukses");
        exit;
    } else {
        $pesan = '<div class="alert alert-danger"><i class="fas fa-exclamation-circle me-2"></i>Gagal memperbarui data.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Warehouse Inventory</title>
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
                    <h4 class="fw-bold"><i class="fas fa-edit text-warning me-2"></i>Edit Produk</h4>
                </div>
                <div class="card-body">
                    <?= $pesan ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label fw-bold">SKU Produk (Tidak bisa diubah)</label>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($produk->getSKU()) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk (Tidak bisa diubah)</label>
                            <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($produk->getNama()) ?>" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stok Baru</label>
                                <input type="number" name="stok" class="form-control" required min="0" value="<?= $produk->getStok() ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Harga Baru (Rp)</label>
                                <input type="number" name="harga" class="form-control" required min="0" value="<?= $produk->getHarga() ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <a href="index.php" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-warning text-dark"><i class="fas fa-save me-1"></i> Update Data</button>
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