<?php
// v2-php/public/index.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);
$semuaProduk = $gudang->semuaProduk();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Warehouse Inventory System</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
        <h1>📦 Warehouse Inventory System</h1>
    
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'tambah_sukses'): ?>
            <div class="alert alert-success">✅ Produk berhasil ditambahkan!</div>
        <?php elseif ($_GET['status'] == 'edit_sukses'): ?>
            <div class="alert alert-success">✅ Produk berhasil diperbarui!</div>
        <?php elseif ($_GET['status'] == 'hapus_sukses'): ?>
            <div class="alert alert-success">✅ Produk berhasil dihapus!</div>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="tambah.php" class="btn btn-success">+ Tambah Produk Baru</a></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($semuaProduk)): ?>
                <tr><td colspan="6" style="text-align:center;">Belum ada produk di gudang.</td></tr>
            <?php else: ?>
                <?php foreach ($semuaProduk as $index => $p): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($p->getSKU()) ?></td>
                    <td><?= htmlspecialchars($p->getNama()) ?></td>
                    <td><?= $p->getStok() ?></td>
                    <td>Rp <?= number_format($p->getHarga(), 0, ',', '.') ?></td>
                    <td>
                        <a href="edit.php?sku=<?= urlencode($p->getSKU()) ?>" class="btn">Edit</a>
                        <a href="hapus.php?sku=<?= urlencode($p->getSKU()) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>