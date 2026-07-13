<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\Keranjang;
use App\Models\Checkout;
use App\Models\PelangganModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    public function tampilSemuaProduk()
    {
        // Mengambil semua data produk dari database (tabel produk)
        $products = ProdukModel::all();

        // Mengirim data ke view 'produkpelanggan'
        return view('pelanggan.ProdukPelanggan', compact('products'));
    }

    public function tampilSeluruhKeranjang()
    {
        // PERBAIKAN: Ambil dari session 'user_id' sesuai LoginController
        $id_pelanggan = session('user_id');

        $keranjang = Keranjang::with('produk')
            ->where('id_pelanggan', $id_pelanggan)
            ->whereNull('id_checkout')
            ->get();

        $totalBelanja = 0;
        $totalBarang = 0;
        foreach ($keranjang as $item) {
            $totalBelanja += ($item->produk->harga * $item->jumlah);
            $totalBarang += $item->jumlah;
        }

        return view('pelanggan.KeranjangPelanggan', compact('keranjang', 'totalBelanja', 'totalBarang'));
    }

    // 2. Menambah Produk ke Keranjang
    public function tambahProdukKeranjang(Request $request)
    {
        // PERBAIKAN: Ambil dari session 'user_id' sesuai LoginController
        $id_pelanggan = session('user_id');
        $id_produk = $request->id_produk;

        // Validasi tambahan: Pastikan pelanggan sudah login
        if (!$id_pelanggan) {
            return redirect('/login')->withErrors(['Silakan login terlebih dahulu untuk menambah keranjang.']);
        }

        $keranjangAda = Keranjang::where('id_pelanggan', $id_pelanggan)
            ->where('id_produk', $id_produk)
            ->whereNull('id_checkout')
            ->first();

        if ($keranjangAda) {
            $keranjangAda->jumlah += 1;
            $keranjangAda->save();
        } else {
            Keranjang::create([
                'id_pelanggan' => $id_pelanggan,
                'id_produk' => $id_produk,
                'jumlah' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // 3. Mengubah Jumlah Produk di Keranjang (+ / -)
    public function editProdukKeranjang(Request $request, $id_keranjang)
    {
        $keranjang = Keranjang::with('produk')->findOrFail($id_keranjang);

        if ($request->aksi == 'tambah') {
            $keranjang->jumlah += 1;
        } elseif ($request->aksi == 'kurang' && $keranjang->jumlah > 1) {
            $keranjang->jumlah -= 1;
        }
        $keranjang->save();

        // Hitung ulang total belanja keseluruhan
        $id_pelanggan = session('user_id');
        $semuaKeranjang = Keranjang::with('produk')
            ->where('id_pelanggan', $id_pelanggan)
            ->whereNull('id_checkout')
            ->get();

        $totalBelanja = 0;
        $totalBarang = 0;
        foreach ($semuaKeranjang as $item) {
            $totalBelanja += ($item->produk->harga * $item->jumlah);
            $totalBarang += $item->jumlah;
        }

        // Subtotal untuk 1 jenis barang ini
        $subtotalBarang = $keranjang->jumlah * $keranjang->produk->harga;

        // Kembalikan data dalam format JSON (tanpa refresh halaman)
        return response()->json([
            'success' => true,
            'qty_baru' => $keranjang->jumlah,
            'subtotal_baru' => 'Rp ' . number_format($subtotalBarang, 0, ',', '.'),
            'total_barang' => $totalBarang,
            'total_belanja' => 'Rp ' . number_format($totalBelanja, 0, ',', '.')
        ]);
    }

    // 4. Menghapus Produk dari Keranjang
    public function hapusProdukKeranjang($id_keranjang)
    {
        $keranjang = Keranjang::findOrFail($id_keranjang);
        $keranjang->delete();

        return redirect()->route('keranjang.tampil')->with('success', 'Produk dihapus dari keranjang.');
    }


    // 1. Menampilkan Halaman Checkout
    public function tampilCheckout()
    {
        $id_pelanggan = session('user_id');

        if (!$id_pelanggan) {
            return redirect('/login')->withErrors(['Silakan login terlebih dahulu.']);
        }

        // Ambil data pelanggan (untuk menampilkan Alamat Pengiriman)
        $pelanggan = \App\Models\PelangganModel::find($id_pelanggan);

        // Ambil data keranjang yang belum di-checkout
        $keranjang = Keranjang::with('produk')
            ->where('id_pelanggan', $id_pelanggan)
            ->whereNull('id_checkout')
            ->get();

        // Cegah user masuk ke halaman checkout jika keranjang kosong
        if ($keranjang->isEmpty()) {
            return redirect('/keranjangpelanggan')->withErrors(['Keranjang Anda kosong!']);
        }

        // Hitung Subtotal Harga Barang
        $totalHarga = 0;
        $totalBarang = 0;
        foreach ($keranjang as $item) {
            $totalHarga += ($item->produk->harga * $item->jumlah);
            $totalBarang += $item->jumlah;
        }

        // Tentukan Ongkir (Bisa statis dulu seperti desain Anda, misal Rp 32.000)
        $biayaOngkir = 32000;

        // Hitung Total Bayar
        $totalBayar = $totalHarga + $biayaOngkir;

        return view('pelanggan.CheckoutPelanggan', compact(
            'pelanggan',
            'keranjang',
            'totalBarang',
            'totalHarga',
            'biayaOngkir',
            'totalBayar'
        ));
    }

    // 2. Memproses Checkout ke Database
    public function prosesCheckout(Request $request)
    {
        $id_pelanggan = session('user_id');

        $request->validate([
            'metode_pembayaran' => 'required',
            'biaya_ongkir' => 'required|numeric'
        ]);

        $keranjang = Keranjang::with('produk')
            ->where('id_pelanggan', $id_pelanggan)
            ->whereNull('id_checkout')
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect('/keranjangpelanggan');
        }

        $totalHarga = 0;
        foreach ($keranjang as $item) {
            $totalHarga += ($item->produk->harga * $item->jumlah);
        }

        $biayaOngkir = (int) $request->biaya_ongkir;
        $totalBayar = $totalHarga + $biayaOngkir;

        // Simpan data ke tabel 'checkout'
        $checkout = Checkout::create([
            'id_pelanggan' => $id_pelanggan,
            'tgl_checkout' => \Carbon\Carbon::now(),
            'metode_pembayaran' => $request->metode_pembayaran,
            'biaya_ongkir' => $biayaOngkir,
            'total_bayar' => $totalBayar,
            'status_bayar' => 'Belum Bayar',
            'bukti_bayar' => null,
        ]);

        // Kunci keranjang dengan id_checkout
        // Note: Pastikan kolom ID di model Checkout kamu sesuai ($checkout->id atau $checkout->id_checkout)
        $idCheckoutTerbuat = $checkout->id_checkout ?? $checkout->id;

        Keranjang::where('id_pelanggan', $id_pelanggan)
            ->whereNull('id_checkout')
            ->update(['id_checkout' => $idCheckoutTerbuat]);

        // UBAH BAGIAN REDIRECT: Alihkan ke halaman simulasi Midtrans bawaan kita
        return redirect()->route('checkout.payment', $idCheckoutTerbuat);
    }

    // TAMBAHKAN FUNGSI INI: Menampilkan halaman simulasi pembayaran
    public function paymentPage($id)
    {
        // Ambil data checkout beserta data pelanggannya
        $checkout = \App\Models\Checkout::with('pelanggan')->find($id);

        if (!$checkout) {
            return redirect('/')->withErrors(['Data transaksi tidak ditemukan.']);
        }

        return view('pelanggan.payment', compact('checkout'));
    }

    // TAMBAHKAN FUNGSI INI: Mengubah status pembayaran tanpa hit Midtrans asli
    public function callbackSimulasi($id)
    {
        $checkout = \App\Models\Checkout::find($id);

        if ($checkout) {
            // Update status menjadi Sudah Bayar
            $checkout->update([
                'status_bayar' => 'Sudah Bayar'
            ]);
        }

        return redirect()->route('riwayat.tampil')->with('success', 'Simulasi Berhasil!');
    }



    // 1. Menampilkan Halaman Profil
    public function profilPengguna()
    {
        $id_pelanggan = session('user_id');
        $pelanggan = PelangganModel::findOrFail($id_pelanggan);

        // Jika alamat masih kosong/null dari database, jadikan array kosong
        $daftarAlamat = $pelanggan->alamat ?? [];

        return view('pelanggan.profilpengguna', compact('pelanggan', 'daftarAlamat'));
    }

    // 2. Menyimpan Alamat Baru
    public function tambahAlamat(Request $request)
    {
        // Validasi input dari form modal/halaman tambah alamat
        $request->validate([
            'label' => 'required', // Contoh: "Rumah", "Kantor"
            'telepon' => 'required',
            'alamat_lengkap' => 'required'
        ]);

        $id_pelanggan = session('user_id');
        $pelanggan = PelangganModel::findOrFail($id_pelanggan);

        // Ambil data alamat lama (bentuknya sudah array)
        $alamatSaatIni = $pelanggan->alamat ?? [];

        // Susun data alamat baru dengan ID unik (agar bisa diedit/dihapus nanti)
        $alamatBaru = [
            'id_alamat' => uniqid(),
            'label' => $request->label,
            'telepon' => $request->telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'is_utama' => empty($alamatSaatIni) ? true : false // Jika ini alamat pertama, jadikan utama
        ];

        // Masukkan alamat baru ke dalam kumpulan alamat lama
        $alamatSaatIni[] = $alamatBaru;

        // Simpan kembali ke database (Otomatis menjadi JSON format)
        $pelanggan->alamat = $alamatSaatIni;
        $pelanggan->save();

        return redirect()->back()->with('success', 'Alamat baru berhasil ditambahkan!');
    }

    public function updateAlamat(Request $request, $id_alamat)
    {
        $id_pelanggan = session('user_id');
        $pelanggan = PelangganModel::findOrFail($id_pelanggan);
        $alamatSaatIni = $pelanggan->alamat ?? [];

        // Cari alamat yang mau diedit berdasarkan ID, lalu ubah isinya
        foreach ($alamatSaatIni as &$alamat) {
            if ($alamat['id_alamat'] === $id_alamat) {
                $alamat['label'] = $request->label;
                $alamat['telepon'] = $request->telepon;
                $alamat['alamat_lengkap'] = $request->alamat_lengkap;
                break;
            }
        }

        $pelanggan->alamat = $alamatSaatIni;
        $pelanggan->save();

        return redirect()->back()->with('success', 'Data alamat berhasil diperbarui!');
    }

    // 4. Fungsi untuk Mengubah Profil (Nama, No HP, dan Foto)
    public function ubahProfilPengguna(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $id_pelanggan = session('user_id');
        $pelanggan = PelangganModel::findOrFail($id_pelanggan);

        // Update data teks
        $pelanggan->nama = $request->nama;
        $pelanggan->no_hp = $request->no_hp;

        // Cek jika ada file foto yang diunggah
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($pelanggan->foto_profil && Storage::disk('public')->exists($pelanggan->foto_profil)) {
                Storage::disk('public')->delete($pelanggan->foto_profil);
            }

            // Simpan foto baru
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('foto_profil', $filename, 'public');

            // Simpan path ke database
            $pelanggan->foto_profil = $path;
        }

        $pelanggan->save();

        // (Opsional) Update session nama agar nama di topbar pojok kanan atas langsung berubah
        session()->put('user_name', $pelanggan->nama);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    // 5. Hapus Alamat
    public function hapusAlamat($id_alamat)
    {
        $id_pelanggan = session('user_id');
        $pelanggan = PelangganModel::findOrFail($id_pelanggan);
        $alamatSaatIni = $pelanggan->alamat ?? [];

        // Buang alamat yang ID-nya cocok dengan yang diklik
        $alamatBaru = array_filter($alamatSaatIni, function ($alamat) use ($id_alamat) {
            return $alamat['id_alamat'] !== $id_alamat;
        });

        // Susun ulang array agar rapi, lalu simpan kembali
        $pelanggan->alamat = array_values($alamatBaru);
        $pelanggan->save();

        return redirect()->back()->with('success', 'Alamat berhasil dihapus!');
    }


    public function tampilRiwayatTransaksi()
    {
        // PERBAIKAN: Gunakan session('user_id') agar sama dengan login dan keranjang kamu
        $idPelanggan = session('user_id');

        // Jika user iseng akses tanpa login, tendang ke halaman login
        if (!$idPelanggan) {
            return redirect('/login')->withErrors(['Silakan login terlebih dahulu.']);
        }

        // Ambil data checkout milik id_pelanggan tersebut
        $riwayat = \App\Models\Checkout::with(['keranjang.produk'])
            ->where('id_pelanggan', $idPelanggan)
            ->orderBy('tgl_checkout', 'desc')
            ->get();
        
        return view('pelanggan.RiwayatTransaksiPengguna', compact('riwayat'));
    }
}
