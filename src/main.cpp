#include <iostream>
#include <string>

using namespace std;

struct Produk {
	string sku;
	string nama;
	int stok;
	double harga;
};

int main() {
	Produk inventaris[5];
	int jumlahProduk = 0;
	int pilihan = 0;
	
	while (pilihan != 6) {
		cout << "\n========================================\n";
		cout << "    APLIKASI WAREHOUSE INVENTORY SYSTEM   \n";
		cout << "========================================\n";
		cout << "1. Tambah Produk\n";
		cout << "2. Tampilkan Produk\n";
		cout << "3. Cari Produk\n";
		cout << "4. Update Stok\n";
		cout << "5. Hapus Produk\n";
		cout << "6. Keluar\n";
		cout << "Ketikan Pilihan Anda (1-6): ";
		cin >> pilihan;
		
		if (pilihan == 1) {
			if (jumlahProduk >= 5) {
				cout << "Maaf, Penyimpanan Gudang Sudah Penuh!\n";
			} else {
				cin.ignore();
				
				cout << "Masukkan SKU Produk : ";
				getline (cin, inventaris[jumlahProduk].sku);
				
				cout << "Masukkan Nama Produk : ";
				getline (cin, inventaris[jumlahProduk].nama);
				
				cout << "Masukkan Stok Produk : ";
				cin >> inventaris[jumlahProduk].stok;
				
				cout << "Masukkan Harga Produk: ";
				cin >> inventaris[jumlahProduk].harga;
				
				jumlahProduk++;
				cout << "[Sukses] Produk Berhasil Ditambahkan!\n";
			}
		}
		
		else if (pilihan == 2) {
			if (jumlahProduk == 0) {
				cout << "Belum ada produk di dalam inventaris gudang.\n";
			} else {
				cout << "\n=======================================================\n";
				cout << "                DAFTAR INVENTARIS GUDANG               \n";
				cout << "=======================================================\n";
				
				for (int i = 0; i < jumlahProduk; i++) {
					cout << i + 1 << ". SKU   : " << inventaris[i].sku << "\n";
					cout << "   Nama  : " << inventaris[i].nama << "\n";
					cout << "   Stok  : " << inventaris[i].stok << "\n";
					cout << "   Harga : Rp " << inventaris[i].harga << "\n";
					cout << "-------------------------------------------------------\n";
				}
			}
		}
		else if (pilihan == 3) {
			if (jumlahProduk == 0) {
				cout << "Guudang masih kosong, tidak ada produk yang bisa dicari.\n";
			} else {
				cin.ignore(); 
				string cariSKU;
				cout << "Masukkan SKU produk yang dicari: ";
				getline(cin, cariSKU);

				bool ditemukan = false;
				for (int i = 0; i < jumlahProduk; i++) {
					if (inventaris[i].sku == cariSKU) {
						cout << "\n[Produk Ditemukan!]\n";
						cout << "SKU   : " << inventaris[i].sku << "\n";
						cout << "Nama  : " << inventaris[i].nama << "\n";
						cout << "Stok  : " << inventaris[i].stok << "\n";
						cout << "Harga : Rp " << inventaris[i].harga << "\n";
						ditemukan = true;
						break; 
					}
				}

				if (!ditemukan) {
					cout << "Maaf, produk dengan SKU tersebut tidak ditemukan.\n";
				}
			}
		}
		
		else if (pilihan == 4) {
			if (jumlahProduk == 0) {
				cout << "Gudang masih kosog, tidak ada produk yang bisa diupdate.\n";
			} else {
				cin.ignore(); 
				string cariSKU;
				cout << "Masukkan SKU produk yang ingin diupdate stoknya: ";
				getline(cin, cariSKU);

				bool ditemukan = false;
				for (int i = 0; i < jumlahProduk; i++) {
					if (inventaris[i].sku == cariSKU) {
						ditemukan = true;
						cout << "\n[Produk Ditemukan]\n";
						cout << "Nama Produk   : " << inventaris[i].nama << "\n";
						cout << "Stok Saat Ini : " << inventaris[i].stok << "\n";
						
						cout << "Masukkan jumlah stok baru: ";
						cin >> inventaris[i].stok;
						
						cout << "[Sukses] Stok produk berhasil diperbarui!\n";
						break; 
					}
				}

				if (!ditemukan) {
					cout << "Maaf, produk dengan SKU tersebut tidak ditemukan.\n";
				}
			}
		}
		else if (pilihan == 5) {
			if (jumlahProduk == 0) {
				cout << "Tidak Bisa Menghapus Karena Belum Ada Produk Yang Ditambahkan\n";
			} else {
				cout << "\n=== DAFTAR PRODUK ===\n";
				for (int i = 0; i < jumlahProduk; i++) {
					cout << i << ". SKU: " << inventaris[i].sku << " | Nama: " << inventaris[i].nama << "\n";
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
		}
		else if (pilihan == 6) {
			cout << "Program Selesai. Terima kasih telah menggunakan aplikasi ini!\n";
		}
		else {
			cout << "Pilihan tidak valid! Masukkan angka 1 sampai 6.\n";
		}
	}
	
	return 0;
}
