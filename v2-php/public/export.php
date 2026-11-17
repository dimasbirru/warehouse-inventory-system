<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/GudangInventaris.php';
require_once __DIR__ . '/../src/Auth.php';

$auth = new Auth($pdo);
$auth->cekLogin();

$gudang = new GudangInventaris($pdo);
$semuaProduk = $gudang->semuaProduk();

$filename = "laporan_inventaris_" . date('Y-m-d') . ".csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$output = fopen('php://output', 'w');

fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// Tambahkan parameter "" (string kosong) di akhir
fputcsv($output, ['No', 'SKU', 'Nama Produk', 'Stok', 'Harga (Rp)', 'Total Nilai (Rp)'], ",", '"', "");

$no = 1;
foreach ($semuaProduk as $p) {
    $totalNilai = $p->getStok() * $p->getHarga();
    fputcsv($output, [
        $no++,
        $p->getSKU(),
        $p->getNama(),
        $p->getStok(),
        $p->getHarga(),
        $totalNilai
    ], ",", '"', "");
}

fputcsv($output, ['', '', '', '', 'Total Aset:', $gudang->totalNilaiInventaris()], ",", '"', "");

fclose($output);
exit;