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

    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('img/logo.png') }}" alt="BOSS LAPTOP JOGJA">
        </div>
        <ul class="sidebar-menu">
            <li><a href="/produkpelanggan"><i class="fas fa-laptop"></i> Produk</a></li>
            <li><a href="/keranjang"><i class="fas fa-shopping-cart"></i> Keranjang</a></li>
            <li><a href="/profilpengguna"><i class="far fa-user-circle"></i> Profil Pengguna</a></li>
            <li class="active"><a href="/riwayattransaksi"><i class="fas fa-history"></i> Riwayat Transaksi</a></li>
        </ul>
    </div>

    <div class="main-content">
        
        <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari transaksi atau nomor pesanan...">
            </div>
            <div class="user-section">
                <div class="notification-bell">
                    <i class="far fa-bell"></i>
                    <div class="dot"></div>
                </div>
                <div class="profile-badge">
                    <span>Pelanggan</span>
                    <img src="https://ui-avatars.com/api/?name=Pelanggan&background=random" alt="Avatar">
                </div>
            </div>
        </div>

        <h1 class="page-title">Riwayat Transaksi</h1>
        
        <div class="filter-tabs">
            <button class="tab-btn active">Semua</button>
            <button class="tab-btn">Perlu Dibayar</button>
            <button class="tab-btn">Dikirim</button>
            <button class="tab-btn">Selesai</button>
        </div>

        <div class="transaction-list">

            <div class="transaction-card">
                <div class="card-header">
                    <div class="status-info">
                        <div class="icon-box diantarkan">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="status-text">
                            <h4>Pesanan Diantarkan</h4>
                            <p>No. Pesanan: <span class="purple-id">BLP-2023-984421</span></p>
                        </div>
                    </div>
                    <div class="timestamp-info">
                        <div class="label">EST. KEDATANGAN</div>
                        <div class="value">Hari Ini, 18:00</div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="product-details">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?q=80&w=200" alt="Mouse Gaming">
                        </div>
                        <div class="product-info">
                            <h3>Mouse gaming</h3>
                            <p class="variant">Varian: Hitam + Putih</p>
                            <div class="badge-row">
                                <span class="badge purple">100% ASLI</span>
                                <span class="badge purple">GARANSI 1 BULAN</span>
                            </div>
                        </div>
                    </div>
                    <div class="price-info">
                        <div class="price">Rp 125.439</div>
                        <div class="qty">Jumlah: x1</div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="meta-summary">
                        <div class="meta-block">
                            <div class="title">Metode Pembayaran</div>
                            <div class="payment-badge">
                                <span class="dana-logo">DANA</span>
                                <span class="method-text">Digital Wallet</span>
                            </div>
                        </div>
                        <div class="meta-block">
                            <div class="title">Total Transaksi</div>
                            <div class="total-amount">Rp 116.219</div>
                        </div>
                    </div>
                    <div class="action-group">
                        <button class="btn-link-purple">Hubungi Penjual</button>
                        <button class="btn-action-solid red">Konfirmasi Pesanan Diterima</button>
                    </div>
                </div>
            </div>

            <div class="transaction-card">
                <div class="card-header">
                    <div class="status-info">
                        <div class="icon-box selesai">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="status-text">
                            <h4>Pesanan Selesai</h4>
                            <p>No. Pesanan: BLP-2023-772109</p>
                        </div>
                    </div>
                    <div class="timestamp-info">
                        <div class="label">SELESAI PADA</div>
                        <div class="value">12 Okt 2023, 14:20</div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="product-details">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1496181130204-755241524eab?q=80&w=200" alt="BosPro 16 Titanium">
                        </div>
                        <div class="product-info">
                            <h3>BosPro 16 Titanium</h3>
                            <p class="variant">Varian: M2 Ultra, 64GB RAM</p>
                            <div class="badge-row">
                                <span class="badge green">SELESAI</span>
                            </div>
                        </div>
                    </div>
                    <div class="price-info">
                        <div class="price">Rp 18.000.000</div>
                        <div class="qty">Jumlah: x1</div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="meta-summary">
                        <div class="meta-block">
                            <div class="title">Metode Pembayaran</div>
                            <div class="payment-badge">
                                <span class="dana-logo">DANA</span>
                                <span class="method-text">Digital Wallet</span>
                            </div>
                        </div>
                        <div class="meta-block">
                            <div class="title">Total Transaksi</div>
                            <div class="total-amount">Rp 18.000.000</div>
                        </div>
                    </div>
                    <div class="action-group">
                        <button class="btn-link-purple">Tulis Ulasan</button>
                        <button class="btn-action-solid purple">Beli Lagi</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>