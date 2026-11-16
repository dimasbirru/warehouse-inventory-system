<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';
require_once __DIR__ . '/../src/Auth.php';

$auth = new Auth($pdo);
$auth->cekLogin(); // Proteksi halaman

$gudang = new GudangInventaris($pdo);
$sku = $_GET['sku'] ?? '';

if ($sku !== '') {
    $gudang->hapus($sku);
}

header("Location: index.php?status=hapus_sukses");
exit;