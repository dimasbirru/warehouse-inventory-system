#include <iostream>
#include <string>
#include <fstream>

using namespace std;

class Produk {
private:
    string sku;
    string nama;
    int stok;
    double harga;

public:
    Produk() {
        sku = "";
        nama = "";
        stok = 0;
        harga = 0.0;
    }

    void setSKU(string s) { sku = s; }
    void setNama(string n) { nama = n; }
    void setStok(int st) { stok = st; }
    void setHarga(double h) { harga = h; }

    string getSKU() const { return sku; }
    string getNama() const { return nama; }
    int getStok() const { return stok; }
    double getHarga() const { return harga; }
};

class GudangInventaris {
private:
    Produk inventaris[5];
    int jumlahProduk;

public:
    GudangInventaris() {
        jumlahProduk = 0;
        muatData(); 
    }

    void muatData() {
        ifstream file("gudang.txt");
        if (file.is_open()) {
            string s, n;
            int st;
            double h;
            while (file >> s) {
                file.ignore();
                getline(file, n);
                file >> st >> h;
                
                if (jumlahProduk < 5) {
                    inventaris[jumlahProduk].setSKU(s);
                    inventaris[jumlahProduk].setNama(n);
                    inventaris[jumlahProduk].setStok(st);
                    inventaris[jumlahProduk].setHarga(h);
                    jumlahProduk++;
                }
            }
            file.close();
        }
    }

    void simpanData() {
        ofstream file("gudang.txt");
        for (int i = 0; i < jumlahProduk; i++) {
            file << inventaris[i].getSKU() << "\n";
            file << inventaris[i].getNama() << "\n";
            file << inventaris[i].getStok() << " " << inventaris[i].getHarga() << "\n";
        }
        file.close();
    }

    void tambahProduk() {
        if (jumlahProduk >= 5) {
            cout << "Maaf, Penyimpanan Gudang Sudah Penuh!\n";
            return;
        }
        cin.ignore();
        string s, n;
        int st;
        double h;

        cout << "Masukkan SKU Produk : ";
        getline(cin, s);
        cout << "Masukkan Nama Produk : ";
        getline(cin, n);
        cout << "Masukkan Stok Produk : ";
        cin >> st;
        cout << "Masukkan Harga Produk: ";
        cin >> h;

        inventaris[jumlahProduk].setSKU(s);
        inventaris[jumlahProduk].setNama(n);
        inventaris[jumlahProduk].setStok(st);
        inventaris[jumlahProduk].setHarga(h);
        jumlahProduk++;

        cout << "[Sukses] Produk Berhasil Ditambahkan!\n";
    }

    void tampilkanProduk() {
        if (jumlahProduk == 0) {
            cout << "Belum ada produk di dalam inventaris gudang.\n";
            return;
        }
        cout << "\n=======================================================\n";
        cout << "                  DAFTAR INVENTARIS GUDANG             \n";
        cout << "=======================================================\n";
        for (int i = 0; i < jumlahProduk; i++) {
            cout << i + 1 << ". SKU   : " << inventaris[i].getSKU() << "\n";
            cout << "   Nama  : " << inventaris[i].getNama() << "\n";
            cout << "   Stok  : " << inventaris[i].getStok() << "\n";
            cout << "   Harga : Rp " << inventaris[i].getHarga() << "\n";
            cout << "-------------------------------------------------------\n";
        }
    }

    void cariProduk() {
        if (jumlahProduk == 0) {
            cout << "Gudang masih kosong, tidak ada produk yang bisa dicari.\n";
            return;
        }
        cin.ignore();
        string cariSKU;
        cout << "Masukkan SKU produk yang dicari: ";
        getline(cin, cariSKU);

        bool ditemukan = false;
        for (int i = 0; i < jumlahProduk; i++) {
            if (inventaris[i].getSKU() == cariSKU) {
                cout << "\n[Produk Ditemukan!]\n";
                cout << "SKU   : " << inventaris[i].getSKU() << "\n";
                cout << "Nama  : " << inventaris[i].getNama() << "\n";
                cout << "Stok  : " << inventaris[i].getStok() << "\n";
                cout << "Harga : Rp " << inventaris[i].getHarga() << "\n";
                ditemukan = true;
                break;
            }
        }
        if (!ditemukan) {
            cout << "Maaf, produk dengan SKU tersebut tidak ditemukan.\n";
        }
    }

    void updateStok() {
        if (jumlahProduk == 0) {
            cout << "Gudang masih kosong, tidak ada produk yang bisa diupdate.\n";
            return;
        }
        cin.ignore();
        string cariSKU;
        cout << "Masukkan SKU produk yang ingin diupdate: ";
        getline(cin, cariSKU);

        bool ditemukan = false;
        for (int i = 0; i < jumlahProduk; i++) {
            if (inventaris[i].getSKU() == cariSKU) {
                ditemukan = true;
                cout << "\n[Produk Ditemukan]\n";
                cout << "Nama Produk   : " << inventaris[i].getNama() << "\n";
                cout << "Stok Saat Ini : " << inventaris[i].getStok() << "\n";
                cout << "Harga Saat Ini: Rp " << inventaris[i].getHarga() << "\n\n";
                
                int stokBaru;
                double hargaBaru;
                
                cout << "Masukkan jumlah stok baru : ";
                cin >> stokBaru;
                cout << "Masukkan harga baru (Rp)  : ";
                cin >> hargaBaru;

                inventaris[i].setStok(stokBaru);
                inventaris[i].setHarga(hargaBaru);
                
                cout << "[Sukses] Data produk berhasil diperbarui!\n";
                break;
            }
        }
        if (!ditemukan) {
            cout << "Maaf, produk dengan SKU tersebut tidak ditemukan.\n";
        }
    }

    void hapusProduk() {
        if (jumlahProduk == 0) {
            cout << "Tidak Bisa Menghapus Karena Belum Ada Produk Yang Ditambahkan\n";
            return;
        }
        cout << "\n=== DAFTAR PRODUK ===\n";
        for (int i = 0; i < jumlahProduk; i++) {
            cout << i << ". SKU: " << inventaris[i].getSKU() << " | Nama: " << inventaris[i].getNama() << "\n";
        }

        int hapusIndeks;
        cout << "\nMasukkan nomor indeks produk yang ingin dihapus (0-" << jumlahProduk - 1 << "): ";
        cin >> hapusIndeks;

        if (hapusIndeks >= 0 && hapusIndeks < jumlahProduk) {
            for (int i = hapusIndeks; i < jumlahProduk - 1; i++) {
                inventaris[i] = inventaris[i + 1];
            }
            jumlahProduk--;
            cout << "\n[Sukses] Produk pada indeks " << hapusIndeks << " berhasil dihapus!\n";
        } else {
            cout << "\n[Gagal] Indeks tidak valid.\n";
        }
    }

    void keluarProgram() {
        simpanData();
        cout << "Data tersimpan otomatis ke file 'gudang.txt'. Program Selesai!\n";
    }
};

int main() {
    GudangInventaris gudang;
    int pilihan = 0;

    while (pilihan != 6) {
        cout << "\n========================================\n";
        cout << "    APLIKASI WAREHOUSE INVENTORY SYSTEM   \n";
        cout << "========================================\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Cari Produk\n";
        cout << "4. Update Stok & Harga\n";
        cout << "5. Hapus Produk\n";
        cout << "6. Keluar\n";
        cout << "Ketikan Pilihan Anda (1-6): ";
        cin >> pilihan;

        switch (pilihan) {
            case 1: gudang.tambahProduk(); break;
            case 2: gudang.tampilkanProduk(); break;
            case 3: gudang.cariProduk(); break;
            case 4: gudang.updateStok(); break;
            case 5: gudang.hapusProduk(); break;
            case 6: gudang.keluarProgram(); break;
            default: cout << "Pilihan tidak valid! Masukkan angka 1 sampai 6.\n";
        }
    }

    return 0;
}