<?php

class Produk {
    private int $id;
    private string $sku;
    private string $nama;
    private int $stok;
    private int $harga; // Di PHP kita pakai int (BIGINT di MySQL) untuk Rupiah

    public function __construct(string $sku, string $nama, int $stok, int $harga, int $id = 0) {
        $this->id = $id;
        $this->sku = $sku;
        $this->nama = $nama;
        $this->stok = $stok;
        $this->harga = $harga;
    }

    public function getId(): int { return $this->id; }
    public function getSKU(): string { return $this->sku; }
    public function getNama(): string { return $this->nama; }
    public function getStok(): int { return $this->stok; }
    public function getHarga(): int { return $this->harga; }
}