<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\KeuanganModel;
use App\Models\AdminModel;
use App\Models\Checkout;
use App\Models\PelangganModel;
use App\Models\InformasiToko;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PemilikController extends Controller
{
    // Fungsi untuk Menampilkan Semua Produk
    public function tampilSemuaproduk()
    {
        $produk = ProdukModel::orderBy('created_at', 'desc')->get();
        return view('pemilik.produkpemilik', compact('produk'));
    }

    public function formTambahProduk(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'merk' => 'required',
            'harga' => 'required|numeric',
            'speksifikasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Validasi file gambar maksimal 2MB
        ]);

        $gambarPath = null;
        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke folder storage/app/public/produk_images
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        }

        ProdukModel::create([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'speksifikasi' => $request->speksifikasi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'merk' => 'required',
            'harga' => 'required|numeric',
            'speksifikasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = ProdukModel::findOrFail($id);
        $gambarPath = $produk->gambar; // Gunakan gambar lama sebagai default

        // Jika user mengupload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        }

        $produk->update([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'speksifikasi' => $request->speksifikasi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function hapusProduk($id)
    {
        $produk = ProdukModel::findOrFail($id);

        // Hapus gambar dari storage sebelum menghapus data di database
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }


    public function tampilPesanan()
    {
        // 1. Ambil data checkout beserta relasi pelanggan, keranjang, dan produk di dalam keranjang
        $pesanan = \App\Models\Checkout::with(['pelanggan', 'keranjang.produk'])
            ->orderBy('tgl_checkout', 'desc')
            ->paginate(10);

        // 2. Hitung statistik secara dinamis dari database (Mengikuti format Rupiah)
        $totalPendapatan = \App\Models\Checkout::where('status_bayar', 'Sudah Bayar')->sum('total_bayar');

        // Hitung pesanan aktif (contoh: yang statusnya Belum Bayar atau Proses Pengiriman)
        $pesananAktif = \App\Models\Checkout::whereIn('status_bayar', ['Belum Bayar', 'Proses Pengiriman'])->count();

        // Kirim semua data ke view
        return view('pemilik.pesananpemilik', compact('pesanan', 'totalPendapatan', 'pesananAktif'));
    }

    public function FormeditPesanan(Request $request, $id)
    {
        // 1. Validasi input dari form modal (status_bayar dihapus)
        $request->validate([
            'no_resi' => 'nullable|string',
            'bukti_kirim' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        // 2. Cari data pesanan berdasar ID
        $pesanan = \App\Models\Checkout::findOrFail($id);

        // Siapkan data dasar yang akan diupdate (hanya resi)
        $updateData = [
            'no_resi' => $request->no_resi ?? '0',
        ];

        // Jika pemilik mengunggah file bukti kirim baru
        if ($request->hasFile('bukti_kirim')) {
            // Hapus bukti kirim lama di storage jika sebelumnya sudah ada file
            if ($pesanan->bukti_kirim && $pesanan->bukti_kirim !== '0' && Storage::disk('public')->exists($pesanan->bukti_kirim)) {
                Storage::disk('public')->delete($pesanan->bukti_kirim);
            }

            // Simpan file baru ke folder public/bukti_kirim
            $path = $request->file('bukti_kirim')->store('bukti_kirim', 'public');
            $updateData['bukti_kirim'] = $path;
        }

        // Eksekusi update ke database
        $pesanan->update($updateData);

        // 3. Kembalikan ke halaman manajemen pesanan dengan alert notifikasi sukses
        return redirect()->route('pesanan.pemilik')->with('success', 'Data resi dan bukti kirim berhasil diperbarui!');
    }


    // ====================================================
    // BAGIAN LAPORAN KEUANGAN
    // ====================================================

    // Fungsi untuk menampilkan halaman Laporan Keuangan (Wajib ada)
    public function tampilKeuangan()
    {
        $keuangan = KeuanganModel::orderBy('tanggal', 'desc')->paginate(10);

        // Hitung statistik (Sesuaikan kata kuncinya dengan inputanmu)
        $totalPemasukan = KeuanganModel::whereIn('jenis_transaksi', ['SALES', 'Pemasukan'])->sum('nominal');
        $totalPengeluaran = KeuanganModel::whereNotIn('jenis_transaksi', ['SALES', 'Pemasukan'])->sum('nominal');

        return view('pemilik.laporankeuanganpemilik', compact('keuangan', 'totalPemasukan', 'totalPengeluaran'));
    }

    public function formTambahPemasukan(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_transaksi' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        // MENGAMBIL ID DARI SESSION 'user_id' SESUAI LOGIN CONTROLLER
        $idPemilikLogin = session('user_id');

        KeuanganModel::create([
            'id_pemilik'      => $idPemilikLogin,
            'tanggal'         => $request->tanggal,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal'         => $request->nominal,
            'keterangan'      => $request->keterangan,
            'status'          => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data keuangan berhasil ditambahkan!');
    }

    public function formEditPemasukan(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_transaksi' => 'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        // MENGAMBIL ID DARI SESSION 'user_id' SESUAI LOGIN CONTROLLER
        $idPemilikLogin = session('user_id');

        $keuangan = KeuanganModel::findOrFail($id);
        $keuangan->update([
            'id_pemilik'      => $idPemilikLogin,
            'tanggal'         => $request->tanggal,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal'         => $request->nominal,
            'keterangan'      => $request->keterangan,
            'status'          => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data keuangan berhasil diperbarui!');
    }

    public function HapusPemasukan($id)
    {
        $keuangan = KeuanganModel::findOrFail($id);
        $keuangan->delete();

        return redirect()->back()->with('success', 'Data keuangan berhasil dihapus!');
    }

    public function CetakLaporanKeuangan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Query dasar
        $query = KeuanganModel::query();

        // Default jika memilih 'Semua Bulan'
        $namaBulan = 'Semua Bulan';

        // Jika user memilih bulan spesifik (bukan 'all')
        if ($bulan && $bulan != 'all') {
            $query->whereMonth('tanggal', $bulan);
            // Ubah angka bulan (contoh: '02') menjadi nama bulan (contoh: 'Februari')
            $namaBulan = Carbon::createFromDate($tahun, $bulan, 1)->locale('id')->translatedFormat('F');
        }

        // Filter berdasarkan tahun
        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        // Ambil datanya setelah difilter
        $keuangan = $query->orderBy('tanggal', 'asc')->get();
        $totalNominal = $keuangan->sum('nominal');

        // Return ke view khusus cetak
        return view('pemilik.CetakLaporan', compact('keuangan', 'namaBulan', 'tahun', 'totalNominal'));
    }

    // ====================================================
    // BAGIAN MANAJEMEN PENGGUNA (ADMIN & PELANGGAN)
    // ====================================================

    public function tampilPengguna()
    {
        $daftarAdmin = \App\Models\AdminModel::all(); // sesuaikan nama model admin kamu
        $daftarPelanggan = \App\Models\PelangganModel::all(); // sesuaikan nama model pelanggan kamu

        return view('pemilik.Penggunapemilik', compact('daftarAdmin', 'daftarPelanggan'));
    }

    public function FormTambahAkun(Request $request)
    {
        // Validasi dasar untuk semua
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'peran' => 'required|in:Admin,Pelanggan',
            'alamat' => 'required'
        ];

        // Validasi spesifik berdasarkan peran dari input form
        if ($request->peran === 'Admin') {
            $rules['gaji'] = 'required|numeric';
        } else {
            $rules['no_hp'] = 'required|numeric';
        }

        $request->validate($rules);

        // Proses penyimpanan berdasarkan peran
        if ($request->peran === 'Admin') {
            AdminModel::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'alamat' => $request->alamat,
                // 'gaji' => $request->gaji,
            ]);
        } else {
            PelangganModel::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Enkripsi password
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->back()->with('success', 'Akun ' . $request->peran . ' berhasil ditambahkan!');
    }

    public function FormEditAkun(Request $request, $peran, $id)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required'
        ];

        if ($peran === 'Admin') {
            $rules['gaji'] = 'required|numeric';
            $request->validate($rules);

            $admin = AdminModel::findOrFail($id);
            $password = $request->password ? Hash::make($request->password) : $admin->password;

            $admin->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'alamat' => $request->alamat,
                'gaji' => $request->gaji,
            ]);
        } else if ($peran === 'Pelanggan') {
            $rules['no_hp'] = 'required|numeric';
            $request->validate($rules);

            $pelanggan = PelangganModel::findOrFail($id);
            $password = $request->password ? Hash::make($request->password) : $pelanggan->password;

            // --- PENGAMANAN DATA ALAMAT ARRAY ---
            $alamatData = $pelanggan->alamat;

            if (is_array($alamatData)) {
                // Cari index alamat utama pelanggan
                $indexUtama = collect($alamatData)->search(function ($item) {
                    return isset($item['is_utama']) && $item['is_utama'] == true;
                });

                if ($indexUtama !== false) {
                    // Update alamat lengkap pada alamat utama yang sudah ada
                    $alamatData[$indexUtama]['alamat_lengkap'] = $request->alamat;
                } else if (count($alamatData) > 0) {
                    // Jika tidak ada 'is_utama', update index pertama
                    $alamatData[0]['alamat_lengkap'] = $request->alamat;
                } else {
                    // Jika array alamat ternyata kosong, buatkan struktur default barunya
                    $alamatData[] = [
                        'label' => 'Utama',
                        'telepon' => $request->no_hp,
                        'alamat_lengkap' => $request->alamat,
                        'is_utama' => true
                    ];
                }
            } else {
                // Jika data awal di DB memang hanya string biasa (bukan array)
                $alamatData = $request->alamat;
            }

            $pelanggan->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'no_hp' => $request->no_hp,
                'alamat' => $alamatData, // Simpan kembali dalam bentuk array yang terstruktur
            ]);
        }

        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }

    public function FormHapusAkun($peran, $id)
    {
        if ($peran === 'Admin') {
            $admin = AdminModel::findOrFail($id);
            $admin->delete();
        } else if ($peran === 'Pelanggan') {
            $pelanggan = PelangganModel::findOrFail($id);
            $pelanggan->delete();
        }

        return redirect()->back()->with('success', 'Akun berhasil dihapus!');
    }


    // Menampilkan halaman pengaturan toko
    public function indexPengaturanToko()
    {
        // Mengunci id_pemilik ke angka 1 sementara (ganti Auth::id() nanti jika sudah login)
        $id_pemilik = 1;

        $toko = InformasiToko::where('id_pemilik', $id_pemilik)->first();

        return view('pemilik.Pengaturantokopemilik', compact('toko'));
    }

    // Aksi Tambah
    public function tambahInformasiToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'kategori_utama' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'email_kontak' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'jam_operasional' => 'nullable|array',
            'store_banner' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $id_pemilik = $request->id_pemilik; // Ambil dari input hidden form sementara waktu

        $data = $request->except('store_banner');
        $data['id_pemilik'] = $id_pemilik;

        if ($request->hasFile('store_banner')) {
            $file = $request->file('store_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['store_banner'] = 'uploads/banners/' . $filename;
        }

        InformasiToko::create($data);

        return redirect()->back()->with('success', 'Informasi toko berhasil disimpan!');
    }

    // Aksi Ubah
    public function ubahInformasiToko(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'kategori_utama' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'email_kontak' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'jam_operasional' => 'nullable|array',
            'store_banner' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $id_pemilik = $request->id_pemilik;

        $informasiToko = InformasiToko::where('id_pemilik', $id_pemilik)->firstOrFail();
        $data = $request->except('store_banner');

        if ($request->hasFile('store_banner')) {
            // Hapus file banner lama jika ada
            if ($informasiToko->store_banner && file_exists(public_path($informasiToko->store_banner))) {
                unlink(public_path($informasiToko->store_banner));
            }

            $file = $request->file('store_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banners'), $filename);
            $data['store_banner'] = 'uploads/banners/' . $filename;
        }

        $informasiToko->update($data);

        return redirect()->back()->with('success', 'Pengaturan toko Anda berhasil diperbarui!');
    }
}
