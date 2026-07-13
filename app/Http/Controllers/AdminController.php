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

class AdminController extends Controller
{
    // ====================================================
    // BAGIAN PRODUK ADMIN
    // ====================================================

    public function tampilSemuaproduk()
    {
        $produk = ProdukModel::orderBy('created_at', 'desc')->get();
        // Mengubah view ke folder admin
        return view('admin.ProdukAdmin', compact('produk'));
    }

    public function formTambahProduk(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'merk' => 'required',
            'harga' => 'required|numeric',
            'speksifikasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
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
        $gambarPath = $produk->gambar;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
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

        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    // ====================================================
    // BAGIAN PESANAN ADMIN
    // ====================================================

    public function tampilPesanan()
    {
        $pesanan = Checkout::with(['pelanggan', 'keranjang.produk'])
            ->orderBy('tgl_checkout', 'desc')
            ->paginate(10);

        $totalPendapatan = Checkout::where('status_bayar', 'Sudah Bayar')->sum('total_bayar');
        $pesananAktif = Checkout::whereIn('status_bayar', ['Belum Bayar', 'Proses Pengiriman'])->count();

        // Mengubah view ke folder admin
        return view('admin.PesananAdmin', compact('pesanan', 'totalPendapatan', 'pesananAktif'));
    }

    public function FormeditPesanan(Request $request, $id)
    {
        $request->validate([
            'no_resi' => 'nullable|string',
            'bukti_kirim' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pesanan = Checkout::findOrFail($id);
        $updateData = [
            'no_resi' => $request->no_resi ?? '0',
        ];

        if ($request->hasFile('bukti_kirim')) {
            if ($pesanan->bukti_kirim && $pesanan->bukti_kirim !== '0' && Storage::disk('public')->exists($pesanan->bukti_kirim)) {
                Storage::disk('public')->delete($pesanan->bukti_kirim);
            }
            $path = $request->file('bukti_kirim')->store('bukti_kirim', 'public');
            $updateData['bukti_kirim'] = $path;
        }

        $pesanan->update($updateData);

        // Redirect ke route admin
        return redirect()->route('pesanan.admin')->with('success', 'Data resi dan bukti kirim berhasil diperbarui!');
    }

    // ====================================================
    // BAGIAN LAPORAN KEUANGAN ADMIN
    // ====================================================

    public function tampilKeuangan()
    {
        // PERBAIKAN: Menambahkan orderBy('id_keuangan', 'desc') agar ID terbaru selalu di atas
        $keuangan = KeuanganModel::orderBy('tanggal', 'desc')
            ->orderBy('id_keuangan', 'desc')
            ->paginate(10);

        $totalPemasukan = KeuanganModel::whereIn('jenis_transaksi', ['SALES', 'Pemasukan'])->sum('nominal');
        $totalPengeluaran = KeuanganModel::whereNotIn('jenis_transaksi', ['SALES', 'Pemasukan'])->sum('nominal');

        // Mengubah view ke folder admin
        return view('admin.LaporankeuanganAdmin', compact('keuangan', 'totalPemasukan', 'totalPengeluaran'));
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

        $idAdminLogin = session('user_id');

        KeuanganModel::create([
            'id_admin'        => $idAdminLogin, // KUNCI: Ubah menjadi id_admin agar terbaca sebagai Admin
            'id_pemilik'      => null,          // Set null agar tidak bentrok dengan data pemilik
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

        $idAdminLogin = session('user_id');
        $keuangan = KeuanganModel::findOrFail($id);

        $keuangan->update([
            'id_admin'        => $idAdminLogin, // KUNCI: Ubah menjadi id_admin saat update data
            'id_pemilik'      => null,          // Set null agar status penanggung jawab berpindah ke admin
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
}
