<?php
// v2-php/public/hapus.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';

$gudang = new GudangInventaris($pdo);

$sku = $_GET['sku'] ?? '';

if ($sku !== '') {
    $gudang->hapus($sku);
}

// Kembali ke halaman utama
header("Location: index.php?status=hapus_sukses");
exit;