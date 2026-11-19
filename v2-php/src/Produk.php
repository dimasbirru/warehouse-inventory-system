<?php
class Produk {
    private int $id;
    private string $sku;
    private string $nama;
    private string $kategori;
    private int $stok;
    private int $harga;

    public function __construct(string $sku, string $nama, string $kategori, int $stok, int $harga, int $id = 0) {
        $this->id = $id;
        $this->sku = $sku;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->stok = $stok;
        $this->harga = $harga;
    }

    public function getId(): int { return $this->id; }
    public function getSKU(): string { return $this->sku; }
    public function getNama(): string { return $this->nama; }
    public function getKategori(): string { return $this->kategori; }
    public function getStok(): int { return $this->stok; }
    public function getHarga(): int { return $this->harga; }
}