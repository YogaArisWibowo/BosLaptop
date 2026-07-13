<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - BosLaptop</title>

    <!-- Mempertahankan aset khusus Admin -->
    <link rel="stylesheet" href="{{ asset('css/admin/produkadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pesananadmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="app-container">
        <!-- Sidebar Khusus Admin -->
        @include('sidebar.sidebaradmin')

        <main class="main-content">
            <header class="topbar">
                <button class="hamburger-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari Pesanan Produk">
                </div>
                <div class="topbar-icons">
                    <i class="far fa-bell"></i>
                    <i class="far fa-question-circle"></i>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="page-header">
                    <div>
                        <h1>Manajemen Pesanan</h1>
                        <p>Pantau dan Kelola Transaksi BosLaptop</p>
                    </div>
                </div>

                <!-- Menampilkan Nilai Statistik Secara Dinamis dari AdminController -->

                <!-- Notifikasi Alert Berhasil -->
                @if (session('success'))
                    <div
                        style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-container">
                    <div class="table-filters">
                        <div class="filter-group">
                            <select>
                                <option>Filter: Semua Kategori</option>
                            </select>
                            <select>
                                <option>Status: All</option>
                            </select>
                        </div>
                        <span class="filter-info">
                            Tampil {{ $pesanan->firstItem() ?? 0 }}-{{ $pesanan->lastItem() ?? 0 }} dari
                            {{ $pesanan->total() }} pesanan
                        </span>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>TOTAL BAYAR</th>
                                <th>JUMLAH</th>
                                <th>STATUS</th>
                                <th>NO RESI</th>
                                <th>BUKTI KIRIM</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pesanan as $order)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            @if ($order->keranjang->isNotEmpty() && $order->keranjang->first()->produk && $order->keranjang->first()->produk->gambar)
                                                <img src="{{ asset('storage/' . $order->keranjang->first()->produk->gambar) }}"
                                                    alt="Laptop">
                                            @else
                                                <img src="https://via.placeholder.com/48" alt="Laptop">
                                            @endif

                                            <div class="product-details">
                                                <h4>
                                                    @if ($order->keranjang->isNotEmpty())
                                                        @foreach ($order->keranjang as $detail)
                                                            {{ $detail->produk->nama ?? 'Produk Tidak Ditemukan' }}{{ !$loop->last ? ', ' : '' }}
                                                        @endforeach
                                                    @else
                                                        Tidak Ada Produk
                                                    @endif
                                                </h4>
                                                <span>Oleh:
                                                    {{ $order->pelanggan->nama_pelanggan ?? ($order->pelanggan->nama ?? 'Guest') }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td><strong>Rp {{ number_format($order->total_bayar, 0, ',', '.') }}</strong></td>
                                    <td>{{ $order->keranjang->sum('jumlah') }} Item</td>
                                    <td>
                                        <span class="status-dot tersedia"></span> {{ $order->status_bayar }}
                                    </td>
                                    <td>{{ $order->no_resi ?? 'Belum Ada' }}</td>

                                    <!-- KOLOM BUKTI KIRIM -->
                                    <td>
                                        @if ($order->bukti_kirim && $order->bukti_kirim !== '0')
                                            <a href="{{ asset('storage/' . $order->bukti_kirim) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $order->bukti_kirim) }}"
                                                    alt="Bukti Kirim"
                                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                            </a>
                                        @else
                                            <span style="color: #999; font-size: 0.85em;">Belum ada</span>
                                        @endif
                                    </td>

                                    <!-- KOLOM AKSI (Membuka Modal Edit Khusus Admin) -->
                                    <td>
                                        <div class="action-btns">
                                            <button type="button" class="btn-edit" title="Edit Pesanan"
                                                data-id="{{ $order->id_checkout }}"
                                                data-pelanggan="{{ $order->pelanggan->nama_pelanggan ?? ($order->pelanggan->nama ?? 'Guest') }}"
                                                data-resi="{{ $order->no_resi }}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 20px; color: #999;">
                                        Belum ada pesanan masuk ke sistem Admin.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Showing {{ $pesanan->firstItem() ?? 0 }} to {{ $pesanan->lastItem() ?? 0 }} of
                            {{ $pesanan->total() }} transactions</span>
                        <div class="pagination">
                            {{ $pesanan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- STRUKTUR HTML MODAL EDIT PESANAN (UNTUK ADMIN) -->
    <div id="editPesananModal" class="modal-overlay"
        style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
        <div class="modal-box"
            style="background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 500px; border-radius: 8px; position: relative;">
            <span class="close-modal-btn"
                style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <h2>Edit Resi & Bukti Kirim</h2>
            <p id="modal-sub-title" style="color: #666; margin-bottom: 20px; font-size: 14px;"></p>

            <form id="formEditPesanan" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-form-group" style="margin-bottom: 15px;">
                    <label for="modal_no_resi" style="display: block; margin-bottom: 5px; font-weight: bold;">Nomor Resi
                        Pengiriman</label>
                    <input type="text" name="no_resi" id="modal_no_resi"
                        placeholder="Masukkan nomor resi jika sudah dikirim"
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                </div>

                <div class="modal-form-group" style="margin-bottom: 20px;">
                    <label for="modal_bukti_kirim" style="display: block; margin-bottom: 5px; font-weight: bold;">Upload
                        Bukti Kirim / Resi Fisik</label>
                    <input type="file" name="bukti_kirim" id="modal_bukti_kirim" accept="image/*"
                        style="width: 100%;">
                    <small style="color: #888; font-size: 11px; display: block; margin-top: 4px;">Format file: JPG,
                        JPEG, PNG (Maks. 2MB)</small>
                </div>

                <button type="submit" class="modal-btn-submit"
                    style="background-color: #0d6efd; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold;">Simpan
                    Perubahan</button>
            </form>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const appContainer = document.querySelector('.app-container');

        // INTERAKSI KONTROL MODAL EDIT
        const editModal = document.getElementById('editPesananModal');
        const closeBtn = document.querySelector('.close-modal-btn');
        const formEdit = document.getElementById('formEditPesanan');
        const modalSubtitle = document.getElementById('modal-sub-title');
        const modalResi = document.getElementById('modal_no_resi');
        const modalBuktiFile = document.getElementById('modal_bukti_kirim');

        sidebarToggle.addEventListener('click', function() {
            if (sidebar) sidebar.classList.toggle('active');
            appContainer.classList.toggle('sidebar-open');
        });

        const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (sidebar) sidebar.classList.remove('active');
                appContainer.classList.remove('sidebar-open');
            });
        });

        document.addEventListener('click', function(event) {
            if (sidebar && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target) && sidebar
                .classList.contains('active')) {
                sidebar.classList.remove('active');
                appContainer.classList.remove('sidebar-open');
            }
        });

        // Event klik tombol edit di tabel untuk mengisi form modal (Diselaraskan ke Route Admin)
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const pelanggan = this.getAttribute('data-pelanggan');
                const resi = this.getAttribute('data-resi');

                // Mengubah target action form ke route update ADMIN
                formEdit.action = `/pesananadmin/update/${id}`;

                // Isi data teks ke komponen modal popup
                modalSubtitle.innerText = `ID Checkout: #${id} | Pelanggan: ${pelanggan}`;
                modalResi.value = (resi === '0' || resi === null || resi === 'Belum Ada') ? '' : resi;

                // Reset file input setiap kali modal baru dibuka
                modalBuktiFile.value = '';

                // Tampilkan popup modal
                editModal.style.display = 'block';
            });
        });

        // Tutup modal saat klik tanda silang (X)
        closeBtn.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        // Tutup modal jika mengklik area luar box modal
        window.addEventListener('click', (e) => {
            if (e.target === editModal) {
                editModal.style.display = 'none';
            }
        });
    </script>
</body>

</html>
