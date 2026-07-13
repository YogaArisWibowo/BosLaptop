<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


// Rute untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses data login dari form
Route::post('/login', [LoginController::class, 'authenticate']);

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/daftar', function () {
    return view('Daftar');
});
// Route untuk Menampilkan halaman produk (Menggantikan route lama kamu)
Route::get('/produkpemilik', [PemilikController::class, 'tampilSemuaproduk'])->name('pemilik.produk');

// Route untuk proses Tambah, Edit, dan Hapus
Route::post('/produkpemilik/tambah', [PemilikController::class, 'formTambahProduk'])->name('produk.tambah');
Route::put('/produkpemilik/edit/{id}', [PemilikController::class, 'updateProduk'])->name('produk.edit');
Route::delete('/produkpemilik/hapus/{id}', [PemilikController::class, 'hapusProduk'])->name('produk.hapus');


Route::get('/pesananpemilik', [PemilikController::class, 'tampilPesanan'])->name('pesanan.pemilik');
Route::put('/pemilik/pesanan/update/{id}', [PemilikController::class, 'FormeditPesanan'])->name('pemilik.updatepesanan');


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















// ================= ROUTE ADMIN ================= //

// Produk Admin
Route::get('/produkadmin', [AdminController::class, 'tampilSemuaproduk'])->name('produk.admin');
Route::post('/produkadmin/tambah', [AdminController::class, 'formTambahProduk'])->name('produk.tambah.admin');
Route::put('/produkadmin/edit/{id}', [AdminController::class, 'updateProduk'])->name('produk.edit.admin');
Route::delete('/produkadmin/hapus/{id}', [AdminController::class, 'hapusProduk'])->name('produk.hapus.admin');

// Pesanan Admin
Route::get('/pesananadmin', [AdminController::class, 'tampilPesanan'])->name('pesanan.admin');
Route::put('/pesananadmin/update/{id}', [AdminController::class, 'FormeditPesanan'])->name('pesanan.update.admin');

// Laporan Keuangan Admin
Route::get('/laporankeuanganadmin', [AdminController::class, 'tampilKeuangan'])->name('keuangan.admin');
Route::post('/laporankeuanganadmin/tambah', [AdminController::class, 'formTambahPemasukan'])->name('keuangan.tambah.admin');
Route::put('/laporankeuanganadmin/edit/{id}', [AdminController::class, 'formEditPemasukan'])->name('keuangan.edit.admin');
Route::delete('/laporankeuanganadmin/hapus/{id}', [AdminController::class, 'HapusPemasukan'])->name('keuangan.hapus.admin');














Route::get('/produkpelanggan', [PelangganController::class, 'tampilSemuaProduk']);



// Routes untuk Keranjang Belanja
Route::get('/keranjangpelanggan', [PelangganController::class, 'tampilSeluruhKeranjang'])->name('keranjang.tampil');
Route::post('/keranjang/tambah', [PelangganController::class, 'tambahProdukKeranjang'])->name('keranjang.tambah');
Route::post('/keranjang/edit/{id_keranjang}', [PelangganController::class, 'editProdukKeranjang'])->name('keranjang.edit');
Route::post('/keranjang/hapus/{id_keranjang}', [PelangganController::class, 'hapusProdukKeranjang'])->name('keranjang.hapus');



// Routes untuk Checkout
Route::get('/checkout', [PelangganController::class, 'tampilCheckout'])->name('checkout.tampil');
Route::post('/checkout/proses', [PelangganController::class, 'prosesCheckout'])->name('checkout.proses');

// TAMBAHKAN DUA ROUTE INI
Route::get('/checkout/payment/{id}', [PelangganController::class, 'paymentPage'])->name('checkout.payment');
Route::post('/checkout/callback-simulasi/{id}', [PelangganController::class, 'callbackSimulasi'])->name('checkout.callback-simulasi');


// Tampilkan profil
Route::get('/profilpengguna', [PelangganController::class, 'profilPengguna'])->name('profil');
// Simpan alamat
Route::post('/profilpengguna/tambah-alamat', [PelangganController::class, 'tambahAlamat']);
// Proses Edit & Hapus Alamat
Route::post('/profilpengguna/update-alamat/{id_alamat}', [PelangganController::class, 'updateAlamat']);
Route::post('/profilpengguna/hapus-alamat/{id_alamat}', [PelangganController::class, 'hapusAlamat']);
// Route untuk Ubah Profil (Data Diri + Foto)
Route::post('/profilpengguna/ubah-profil', [App\Http\Controllers\PelangganController::class, 'ubahProfilPengguna'])->name('profil.ubah');



Route::get('/riwayattransaksi', [PelangganController::class, 'tampilRiwayatTransaksi'])->name('riwayat.tampil');

    