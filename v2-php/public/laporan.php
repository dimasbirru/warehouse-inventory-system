<?php
// v2-php/public/laporan.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$totalNilai = $gudang->totalNilaiInventaris();
$semuaProduk = $gudang->semuaProduk();

// Hitung produk yang stoknya menipis (< 10)
$stokMenipis = array_filter($semuaProduk, function($p) {
    return $p->getStok() < 10;
});
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <h1>📊 Laporan Inventaris Gudang</h1>
    <p><a href="index.php" class="btn">← Kembali ke Daftar Produk</a></p>

    <div style="background: #e8f4f8; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h2>Total Nilai Aset Gudang</h2>
        <h1 style="color: #2c3e50; margin: 0;">Rp <?= number_format($totalNilai, 0, ',', '.') ?></h1>
        <p>Berdasarkan perhitungan (Stok × Harga) dari <?= count($semuaProduk) ?> jenis produk.</p>
    </div>

    <h2>⚠️ Produk dengan Stok Menipis (< 10)</h2>
    <?php if (empty($stokMenipis)): ?>
        <p style="color: green;">Aman! Semua stok produk masih di atas 10.</p>
    <?php else: ?>
        <table>
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
                    <td><?= htmlspecialchars($p->getSKU()) ?></td>
                    <td><?= htmlspecialchars($p->getNama()) ?></td>
                    <td style="color: red; font-weight: bold;"><?= $p->getStok() ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>