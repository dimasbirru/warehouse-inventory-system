<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);

$keyword = $_GET['cari'] ?? '';
if ($keyword !== '') {
    $semuaProduk = $gudang->cariBanyak($keyword);
} else {
    $semuaProduk = $gudang->semuaProduk();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Warehouse Inventory</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-boxes text-primary me-2"></i>Warehouse System</a>
        <div class="ms-auto">
            <a href="laporan.php" class="btn btn-outline-primary me-2"><i class="fas fa-chart-pie"></i> Laporan</a>
            <a href="tambah.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Notifikasi -->
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?php 
                if ($_GET['status'] == 'tambah_sukses') echo "Produk berhasil ditambahkan!";
                elseif ($_GET['status'] == 'edit_sukses') echo "Produk berhasil diperbarui!";
                elseif ($_GET['status'] == 'hapus_sukses') echo "Produk berhasil dihapus!";
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card card-custom mb-4">
        <div class="card-body">
            <!-- Form Pencarian -->
            <form method="GET" action="" class="d-flex mb-4">
                <input class="form-control me-2" type="search" name="cari" placeholder="Cari berdasarkan SKU atau Nama Produk..." value="<?= htmlspecialchars($keyword) ?>">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="index.php" class="btn btn-secondary ms-2"><i class="fas fa-times"></i> Reset</a>
                <?php endif; ?>
            </form>

            <!-- Tabel Produk -->
            <div class="table-responsive">
                <table class="table table-hover table-custom">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SKU</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($semuaProduk)): ?>
                            <tr><td colspan="6" class="text-center text-muted py-4"><i class="fas fa-box-open fa-2x mb-3 text-secondary"></i><br>Belum ada produk ditemukan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($semuaProduk as $index => $p): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($p->getSKU()) ?></span></td>
                                <td class="fw-bold"><?= htmlspecialchars($p->getNama()) ?></td>
                                <td>
                                    <?php if ($p->getStok() < 10): ?>
                                        <span class="badge bg-danger"><?= $p->getStok() ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-success"><?= $p->getStok() ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>Rp <?= number_format($p->getHarga(), 0, ',', '.') ?></td>
                                <td class="text-end">
                                    <a href="edit.php?sku=<?= urlencode($p->getSKU()) ?>" class="btn btn-sm btn-warning btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="hapus.php?sku=<?= urlencode($p->getSKU()) ?>" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Yakin ingin menghapus produk ini?')" title="Hapus"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Untuk Alert Close) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>