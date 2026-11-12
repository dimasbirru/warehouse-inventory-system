<?php
require_once __DIR__ . '/Produk.php';

class GudangInventaris {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function semuaProduk(): array {
        $stmt = $this->pdo->query("SELECT * FROM produk ORDER BY id ASC");
        $hasil = [];
        while ($row = $stmt->fetch()) {
            $hasil[] = new Produk($row['sku'], $row['nama'], (int)$row['stok'], (int)$row['harga'], (int)$row['id']);
        }
        return $hasil;
    }

    public function cariBySKU(string $sku): ?Produk {
        $stmt = $this->pdo->prepare("SELECT * FROM produk WHERE sku = ?");
        $stmt->execute([$sku]);
        $row = $stmt->fetch();
        
        if ($row) {
            return new Produk($row['sku'], $row['nama'], (int)$row['stok'], (int)$row['harga'], (int)$row['id']);
        }
        return null; 
    }

    public function tambah(Produk $produk): bool {
        if ($this->cariBySKU($produk->getSKU()) !== null) {
            return false; 
        }

        $stmt = $this->pdo->prepare("INSERT INTO produk (sku, nama, stok, harga) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$produk->getSKU(), $produk->getNama(), $produk->getStok(), $produk->getHarga()]);
    }
    public function update(string $sku, int $stokBaru, int $hargaBaru): bool {
        $stmt = $this->pdo->prepare("UPDATE produk SET stok = ?, harga = ? WHERE sku = ?");
        return $stmt->execute([$stokBaru, $hargaBaru, $sku]);
    }
    public function hapus(string $sku): bool {
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE sku = ?");
        return $stmt->execute([$sku]);
    }

    public function totalNilaiInventaris(): int {
        $stmt = $this->pdo->query("SELECT SUM(stok * harga) as total FROM produk");
        $row = $stmt->fetch();
        return (int)($row['total'] ?? 0);
    }
}