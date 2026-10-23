import os

# Menentukan path absolut berdasarkan letak file report.py ini berada
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
DATA_FILE = os.path.join(BASE_DIR, "..", "gudang.txt")

def load_warehouse_data():
    if not os.path.exists(DATA_FILE):
        return []

    data = []
    with open(DATA_FILE, "r") as f:
        lines = f.readlines()

    i = 0
    while i < len(lines):
        if i + 2 < len(lines):
            sku = lines[i].strip()
            nama = lines[i+1].strip()
            stok_harga = lines[i+2].strip().split()
            if len(stok_harga) >= 2:
                stok = int(stok_harga[0])
                harga = float(stok_harga[1])
                data.append({"sku": sku, "nama": nama, "stok": stok, "harga": harga})
        i += 3
    return data

def main():
    print("=" * 45)
    print("      AUTOMATED WAREHOUSE ANALYTICS REPORT   ")
    print("=" * 45)
    
    products = load_warehouse_data()
    if not products:
        print("[INFO] Belum ada data produk di dalam file gudang.txt.")
        return

    total_types = len(products)
    total_stock = sum(p['stok'] for p in products)
    total_valuation = sum(p['stok'] * p['harga'] for p in products)

    print(f"\n[Ringkasan Bisnis Gudang]")
    print(f"- Total Jenis Produk : {total_types} jenis")
    print(f"- Total Unit Barang  : {total_stock} pcs")
    print(f"- Total Valuasi Aset : Rp {total_valuation:,.2f}")

    print(f"\n[Peringatan Stok Menipis (< 5 pcs)]")
    low_stock_found = False
    for p in products:
        if p['stok'] < 5:
            print(f"-> PERINGATAN: Produk '{p['nama']}' (SKU: {p['sku']}) sisa {p['stok']} pcs!")
            low_stock_found = True
            
    if not low_stock_found:
        print("-> Aman! Semua stok produk di atas batas minimum.")
    print("=" * 45)

if __name__ == "__main__":
    main()