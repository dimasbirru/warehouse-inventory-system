<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$totalNilai = $gudang->totalNilaiInventaris();
$semuaProduk = $gudang->semuaProduk();
$stokMenipis = array_filter($semuaProduk, function($p) { return $p->getStok() < 10; });
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Warehouse Inventory</title>
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
    <div class="row mb-4">
        <!-- Kartu Total Aset -->
        <div class="col-md-12">
            <div class="card card-custom bg-primary text-white">
                <div class="card-body p-4">
                    <h5 class="text-white-50">Total Nilai Aset Gudang</h5>
                    <h1 class="display-4 fw-bold mb-0">Rp <?= number_format($totalNilai, 0, ',', '.') ?></h1>
                    <p class="mb-0 mt-2"><i class="fas fa-info-circle"></i> Berdasarkan perhitungan (Stok × Harga) dari <?= count($semuaProduk) ?> jenis produk.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Peringatan Stok Menipis -->
    <div class="card card-custom">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <h5 class="fw-bold"><i class="fas fa-exclamation-triangle text-warning me-2"></i>Produk dengan Stok Menipis (&lt; 10)</h5>
        </div>
        <div class="card-body">
            <?php if (empty($stokMenipis)): ?>
                <div class="alert alert-success mb-0"><i class="fas fa-check-circle me-2"></i>Aman! Semua stok produk masih di atas 10.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover table-custom">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Nama Produk</th>
                                <th>Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stokMenipis as $p): ?>
                            <tr>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($p->getSKU()) ?></span></td>
                                <td class="fw-bold"><?= htmlspecialchars($p->getNama()) ?></td>
                                <td><span class="badge bg-danger fs-6"><?= $p->getStok() ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>