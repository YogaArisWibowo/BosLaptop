<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Keuangan - BosLaptop Admin</title>

    <!-- Mempertahankan aset khusus Admin -->
    <link rel="stylesheet" href="{{ asset('css/admin/produkadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/laporankeuanganadmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="app-container">
        <!-- Sidebar Khusus Admin -->
        @include('sidebar.sidebaradmin')

        <main class="main-content">
            <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari Laporan Keuangan">
                </div>
                <div class="topbar-icons">
                    <i class="far fa-bell"></i>
                    <i class="far fa-question-circle"></i>
                </div>
            </header>

            <div class="dashboard-content">

                <!-- Notifikasi Berhasil -->
                @if (session('success'))
                    <div
                        style="background: #10b981; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Notifikasi Error -->
                @if ($errors->any())
                    <div
                        style="background: #f87171; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="page-header">
                    <div>
                        <h1>Laporan Keuangan</h1>
                    </div>
                    <div class="header-actions">
                        <!-- Button Unduh Dihapus Sesuai Permintaan -->
                        <button class="btn-add" onclick="openModal('addFinanceModal')">
                            <i class="fas fa-plus"></i> Tambah Laporan Keuangan
                        </button>
                    </div>
                </div>

                <!-- Statistik Dinamis -->
                <div class="stats-grid-3">
                    <div class="stat-card">
                        <div class="stat-icon bg-red-light"><i class="fas fa-chart-bar"></i></div>
                        <h3>PEMASUKAN</h3>
                        <div class="value">Rp {{ number_format($totalPemasukan ?? 0, 0, ',', '.') }}</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-purple-light"><i class="fas fa-wallet"></i></div>
                        <h3>PENGELUARAN</h3>
                        <div class="value">Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-blue-light"><i class="fas fa-money-bill-wave"></i></div>
                        <h3>TOTAL DANA</h3>
                        <div class="value">Rp
                            {{ number_format(($totalPemasukan ?? 0) - ($totalPengeluaran ?? 0), 0, ',', '.') }}</div>
                    </div>
                </div>

                <div class="table-container">
                    <div class="table-title">Keuangan Terkini</div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th class="nowrap">KEUANGAN ID</th>
                                <th class="nowrap">TANGGAL</th>
                                <th class="nowrap">KATEGORI</th>
                                <th class="nowrap">PENANGGUNG JAWAB</th>
                                <th>DESKRIPSI</th>
                                <th class="text-right nowrap">NOMINAL</th>
                                <th class="nowrap">STATUS</th>
                                <th class="nowrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($keuangan as $item)
                                <tr>
                                    <td class="nowrap"><strong>#TRX-{{ $item->id_keuangan }}</strong></td>
                                    <td class="nowrap">
                                        {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->format('M d, Y') }}
                                    </td>
                                    <td class="nowrap"><span
                                            class="badge-gray">{{ strtoupper($item->jenis_transaksi) }}</span></td>

                                    <td class="nowrap">
                                        @if ($item->id_pemilik && $item->pemilik)
                                            <span class="badge-blue"><i class="fas fa-user-tie"></i> Pemilik
                                                ({{ $item->pemilik->nama ?? 'Unknown' }})
                                            </span>
                                        @elseif($item->id_admin && $item->admin)
                                            <span class="badge-purple"><i class="fas fa-user-shield"></i> Admin
                                                ({{ $item->admin->nama ?? 'Unknown' }})</span>
                                        @else
                                            <span style="color: #999;">Sistem</span>
                                        @endif
                                    </td>

                                    <td class="col-deskripsi">{{ $item->keterangan }}</td>

                                    <td
                                        class="text-right nowrap {{ in_array(strtolower($item->jenis_transaksi), ['sales', 'pemasukan']) ? 'text-green' : 'text-red' }}">
                                        {{ in_array(strtolower($item->jenis_transaksi), ['sales', 'pemasukan']) ? '+' : '-' }}
                                        Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                    </td>

                                    <td class="nowrap">
                                        <span class="status-pill {{ strtolower($item->status ?? 'success') }}">
                                            <span class="status-dot"></span> {{ ucfirst($item->status ?? 'Success') }}
                                        </span>
                                    </td>

                                    <td class="action-btns">
                                        <button type="button" class="btn-action btn-edit"
                                            data-id="{{ $item->id_keuangan }}"
                                            data-tanggal="{{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->format('Y-m-d') }}"
                                            data-jenis="{{ $item->jenis_transaksi }}"
                                            data-nominal="{{ $item->nominal }}"
                                            data-keterangan="{{ $item->keterangan }}"
                                            data-status="{{ $item->status ?? 'Success' }}"
                                            onclick="openEditModal(this)">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <!-- Menggunakan Route Hapus Admin -->
                                        <form action="{{ route('keuangan.hapus.admin', $item->id_keuangan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?');"
                                            style="margin:0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 20px;">Belum ada data laporan
                                        keuangan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($keuangan instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="table-footer">
                            <span>Tampil {{ $keuangan->count() }} dari {{ $keuangan->total() }} Transaksi</span>
                            <div class="pagination">
                                {{ $keuangan->links() }}
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </main>
    </div>

    <!-- Modal Tambah Keuangan (Menggunakan Route Admin) -->
    <div class="modal" id="addFinanceModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Laporan Keuangan</h2>
                <button class="modal-close" onclick="closeModal('addFinanceModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('keuangan.tambah.admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" required value="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group">
                    <label>Kategori / Jenis Transaksi</label>
                    <select name="jenis_transaksi" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nominal (Rp)</label>
                    <input type="number" name="nominal" placeholder="Contoh: 5000000" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi / Keterangan</label>
                    <textarea name="keterangan" rows="3" placeholder="Masukkan detail transaksi" required></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="Success">Success</option>
                        <option value="Pending">Pending</option>
                        <option value="Failed">Failed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('addFinanceModal')">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Keuangan -->
    <div class="modal" id="editFinanceModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Laporan Keuangan</h2>
                <button class="modal-close" onclick="closeModal('editFinanceModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <form id="formEditKeuangan" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" id="edit_tanggal" required>
                </div>
                <div class="form-group">
                    <label>Kategori / Jenis Transaksi</label>
                    <select name="jenis_transaksi" id="edit_jenis" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nominal (Rp)</label>
                    <input type="number" name="nominal" id="edit_nominal" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi / Keterangan</label>
                    <textarea name="keterangan" id="edit_keterangan" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="edit_status">
                        <option value="Success">Success</option>
                        <option value="Pending">Pending</option>
                        <option value="Failed">Failed</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('editFinanceModal')">Batal</button>
                    <button type="submit" class="btn-submit">Update Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function openEditModal(button) {
            let id = button.getAttribute('data-id');
            let tanggal = button.getAttribute('data-tanggal');
            let jenis = button.getAttribute('data-jenis');
            let nominal = button.getAttribute('data-nominal');
            let keterangan = button.getAttribute('data-keterangan');
            let status = button.getAttribute('data-status');

            document.getElementById('edit_tanggal').value = tanggal;
            document.getElementById('edit_jenis').value = jenis;
            document.getElementById('edit_nominal').value = nominal;
            document.getElementById('edit_keterangan').value = keterangan;
            document.getElementById('edit_status').value = status;

            // Diubah ke URL route put Admin
            document.getElementById('formEditKeuangan').action = `/laporankeuanganadmin/edit/${id}`;

            openModal('editFinanceModal');
        }
    </script>
</body>

</html>
