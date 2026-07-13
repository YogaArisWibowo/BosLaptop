<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - BosLaptop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/produkpelanggan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/riwayattransaksipengguna.css') }}">
</head>

<body>

    @include('sidebar.sidebarpelanggan')

    <div class="main-content">

        <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="search-input" placeholder="Cari nomor pesanan...">
            </div>
            <div class="user-section">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="badge"></div>
                </div>
            </div>
        </div>

        <h1 class="page-title">Riwayat Transaksi</h1>

        <!-- FILTER TABS (Ditambahkan atribut data-status) -->
        <div class="filter-tabs">
            <button class="tab-btn active" data-filter="all">Semua</button>
            <button class="tab-btn" data-filter="Belum Bayar">Perlu Dibayar</button>
            <button class="tab-btn" data-filter="Sudah Bayar">Selesai</button>
        </div>

        <div class="transaction-list">
            @if (session('success'))
                <div
                    style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if ($riwayat->isEmpty())
                <div class="transaction-card" style="text-align: center; padding: 50px 20px;">
                    <i class="fas fa-shopping-bag" style="font-size: 50px; color: #ccc; margin-bottom: 15px;"></i>
                    <h3 style="color: #666; font-weight: 500;">Belum Ada Transaksi</h3>
                    <p style="color: #999; font-size: 14px;">Anda belum pernah melakukan checkout atau pembelian produk
                        apapun.</p>
                </div>
            @else
                @foreach ($riwayat as $item)
                    <!-- Tambah atribut data-status untuk filter JS -->
                    <div class="transaction-card" data-status="{{ $item->status_bayar }}"
                        data-id="BLP-{{ date('Y', strtotime($item->tgl_checkout)) }}-{{ $item->id_checkout }}">
                        <div class="card-header">
                            <div class="status-info">
                                <div
                                    class="icon-box {{ $item->status_bayar == 'Sudah Bayar' ? 'selesai' : 'diantarkan' }}">
                                    <i
                                        class="fas {{ $item->status_bayar == 'Sudah Bayar' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                </div>
                                <div class="status-text">
                                    <h4>Pesanan {{ $item->status_bayar }}</h4>
                                    <p>No. Pesanan: <span
                                            class="purple-id">BLP-{{ date('Y', strtotime($item->tgl_checkout)) }}-{{ $item->id_checkout }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="timestamp-info">
                                <div class="label">TANGGAL CHECKOUT</div>
                                <div class="value">{{ date('d M Y, H:i', strtotime($item->tgl_checkout)) }} WIB</div>
                            </div>
                        </div>

                        @if ($item->keranjang && $item->keranjang->count() > 0)
                            @foreach ($item->keranjang as $detail)
                                <div class="card-body" style="border-bottom: 1px solid #f0f0f0;">
                                    <div class="product-details">
                                        <div class="product-img">
                                            <!-- Perbaikan Gambar Dinamis -->
                                            @if ($detail->produk && $detail->produk->gambar)
                                                <img src="{{ asset('storage/' . $detail->produk->gambar) }}"
                                                    alt="{{ $detail->produk->nama_produk }}">
                                            @else
                                                <!-- Gambar default jika produk tidak punya gambar -->
                                                <img src="https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?q=80&w=200"
                                                    alt="Mouse Gaming">
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <!-- TAMPILKAN NAMA PRODUK DI SINI -->
                                            <!-- Ganti bagian nama produk dengan kode ini -->
                                            <h3>{{ $detail->produk->nama ?? 'Nama Produk Tidak Ditemukan' }}</h3>
                                            </h3>

                                            <p class="variant">Metode: {{ $item->metode_pembayaran }}</p>
                                            <div class="badge-row">
                                                <span class="badge purple">100% ASLI</span>
                                                <span
                                                    class="badge {{ $item->status_bayar == 'Sudah Bayar' ? 'green' : 'purple' }}">{{ $item->status_bayar }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-info">
                                        <!-- TAMPILKAN HARGA PRODUK DI SINI -->
                                        <div class="price">Rp
                                            {{ number_format($detail->produk ? $detail->produk->harga : 0, 0, ',', '.') }}
                                        </div>
                                        <div class="qty">Jumlah: x{{ $detail->jumlah ?? 1 }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body">
                                <p style="color: #999; font-style: italic;">Detail item pesanan tidak tersedia.</p>
                            </div>
                        @endif

                        <div class="card-footer">
                            <div class="meta-summary">
                                <div class="meta-block">
                                    <div class="title">Metode Pembayaran</div>
                                    <div class="payment-badge">
                                        <span class="dana-logo">{{ $item->metode_pembayaran }}</span>
                                        <span class="method-text">Digital Wallet</span>
                                    </div>
                                </div>
                                <div class="meta-block">
                                    <div class="title">Total Transaksi (Inc. Ongkir)</div>
                                    <div class="total-amount">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                            <div class="action-group">
                                @if ($item->status_bayar == 'Belum Bayar')
                                    <a href="{{ url('/checkout/payment/' . $item->id_checkout) }}"
                                        class="btn-action-solid red"
                                        style="text-decoration: none; text-align: center; line-height: 2.2; display: inline-block; padding: 0 20px;">
                                        Bayar Sekarang
                                    </a>
                                @else
                                    <button class="btn-link-purple">Tulis Ulasan</button>
                                    <button class="btn-action-solid purple">Beli Lagi</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- SCRIPT UTK FILTER TABS & SEARCH DINAMIS -->
    <script>
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                // Ubah class active tab
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const filter = button.getAttribute('data-filter');
                document.querySelectorAll('.transaction-card').forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-status') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Live Search Nomor Pesanan
        document.getElementById('search-input').addEventListener('input', function() {
            const searchVal = this.value.toLowerCase();
            document.querySelectorAll('.transaction-card').forEach(card => {
                const orderId = card.getAttribute('data-id').toLowerCase();
                if (orderId.includes(searchVal)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
