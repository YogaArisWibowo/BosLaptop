<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Login');
});
Route::get('/daftar', function () {
    return view('Daftar');
});
// Route untuk Menampilkan halaman produk (Menggantikan route lama kamu)
Route::get('/produkpemilik', [PemilikController::class, 'tampilSemuaproduk'])->name('pemilik.produk');

// Route untuk proses Tambah, Edit, dan Hapus
Route::post('/produkpemilik/tambah', [PemilikController::class, 'formTambahProduk'])->name('produk.tambah');
Route::put('/produkpemilik/edit/{id}', [PemilikController::class, 'updateProduk'])->name('produk.edit');
Route::delete('/produkpemilik/hapus/{id}', [PemilikController::class, 'hapusProduk'])->name('produk.hapus');


Route::get('/pesananpemilik', function () {
    return view('pemilik.PesananPemilik');
});


// Route untuk menampilkan halaman (tampilKeuangan)
Route::get('/laporankeuanganpemilik', [PemilikController::class, 'tampilKeuangan'])->name('pemilik.keuangan');

// Route sesuai request function kamu
Route::post('/laporankeuanganpemilik/tambah', [PemilikController::class, 'formTambahPemasukan'])->name('keuangan.tambah');
Route::put('/laporankeuanganpemilik/edit/{id}', [PemilikController::class, 'formEditPemasukan'])->name('keuangan.edit');
Route::delete('/laporankeuanganpemilik/hapus/{id}', [PemilikController::class, 'HapusPemasukan'])->name('keuangan.hapus');
Route::get('/laporankeuanganpemilik/cetak', [PemilikController::class, 'CetakLaporanKeuangan'])->name('keuangan.cetak');



// Menampilkan Halaman Pengguna (Gabungan Admin & Pelanggan)
Route::get('/penggunapemilik', [PemilikController::class, 'tampilPengguna'])->name('pengguna.index');

// Route Sesuai Request Function Kamu
Route::post('/penggunapemilik/tambah', [PemilikController::class, 'FormTambahAkun'])->name('pengguna.tambah');

// Perhatikan: Ada parameter {peran} dan {id} agar sistem tidak bingung update tabel yang mana
Route::put('/penggunapemilik/edit/{peran}/{id}', [PemilikController::class, 'FormEditAkun'])->name('pengguna.edit');
Route::delete('/penggunapemilik/hapus/{peran}/{id}', [PemilikController::class, 'FormHapusAkun'])->name('pengguna.hapus');



// 1. Menampilkan halaman Pengaturan Toko (Mengambil data otomatis jika sudah ada)
Route::get('/pengaturantokopemilik', [PemilikController::class, 'indexPengaturanToko'])->name('toko.index');

// 2. Aksi simpan pertama kali / Create (Saat data toko masih kosong di database)
Route::post('/pengaturantokopemilik/tambah', [PemilikController::class, 'tambahInformasiToko'])->name('toko.tambah');

// 3. Aksi perbarui data / Update (Saat data toko sudah ada dan mau diubah)
Route::put('/pengaturantokopemilik/ubah', [PemilikController::class, 'ubahInformasiToko'])->name('toko.ubah');



Route::get('/produkadmin', function () {
    return view('admin.ProdukAdmin');
});
Route::get('/pesananadmin', function () {
    return view('admin.PesananAdmin');
});
Route::get('/laporankeuanganadmin', function () {
    return view('admin.LaporankeuanganAdmin');
});
Route::get('/produkpelanggan', function () {
    return view('pelanggan.ProdukPelanggan');
});
Route::get('/keranjangpelanggan', function () {
    return view('pelanggan.KeranjangPelanggan');
});
Route::get('/profilpengguna', function () {
    return view('pelanggan.ProfilPengguna');
});
Route::get('/riwayattransaksi', function () {
    return view('pelanggan.RiwayatTransaksiPengguna');
});
    