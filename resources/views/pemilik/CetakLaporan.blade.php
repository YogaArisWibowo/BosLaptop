<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Keuangan BossLaptop</title>
    <link rel="stylesheet" href="{{ asset('css/pemilik/cetaklaporan.css') }}">
</head>
<body>

    <div class="header">
        <!-- Logo di tengah -->
        <img src="{{ asset('img/logo.png') }}" alt="Logo BossLaptop">
    </div>
    
    <hr>

    <div class="report-title">
        Laporan Rekapitulasi Toko BossLaptop Periode {{ $namaBulan }} {{ $tahun }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Kategori</th>
                <th width="30%">Keterangan / Deskripsi</th>
                <th width="20%">Nominal</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($keuangan as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                <td class="text-center">{{ strtoupper($item->jenis_transaksi) }}</td>
                <td>{{ $item->keterangan }}</td>
                <td class="text-right">
                    Rp {{ number_format($item->nominal, 0, ',', '.') }}
                </td>
                <td class="text-center">{{ ucfirst($item->status ?? 'Success') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data laporan keuangan untuk periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-container">
        <div class="signature">
            <p>{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
            <p>Pemilik Toko</p>
            <!-- Gambar Tanda Tangan -->
            <img src="{{ asset('img/tanda_tangan_yoga.png') }}" alt="Tanda Tangan Yoga">
        </div>
    </div>

    <!-- Script untuk otomatis print saat halaman terbuka -->
    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>
</html>