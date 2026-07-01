<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - BosLaptop</title>
    
    <link rel="stylesheet" href="{{ asset('css/admin/produkadmin.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/admin/laporankeuanganadmin.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
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
                <div class="page-header">
                    <div>
                        <h1>Laporan Keuangan</h1>
                    </div>
                    <div class="header-actions">
                        <button class="btn-add">
                            <i class="fas fa-plus"></i> Tambah Laporan Keuangan
                        </button>
                    </div>
                </div>

                <div class="stats-grid-3">
                    <div class="stat-card">
                        <div class="stat-icon bg-red-light">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <span class="badge-top-right" style="color: #10B981; font-weight: 700; font-size:12px;"><i class="fas fa-arrow-up"></i> +12.5%</span>
                        <h3>PEMASUKAN</h3>
                        <div class="value">Rp 1.240.500.000</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon bg-purple-light">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h3>PENGELUARAN</h3>
                        <div class="value">Rp 482.320.000</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon bg-blue-light">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>TOTAL DANA</h3>
                        <div class="value">Rp 758.180.000</div>
                    </div>
                </div>

                <div class="table-container">
                    <div class="table-title">
                        Keuangan Terkini
                    </div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>KEUANGAN ID</th>
                                <th>TANGGAL</th>
                                <th>KATEGORI</th>
                                <th>DESKRIPSI</th>
                                <th class="text-right">NOMINAL</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#TRX-99201</strong></td>
                                <td>Oct<br>24,<br>2023</td>
                                <td><span class="badge-gray">INVENTORY</span></td>
                                <td>Purchased ROG Zephyrus<br>G14 (x5)</td>
                                <td class="text-right text-black">Rp 125.000.000</td>
                                <td>
                                    <span class="status-pill success">
                                        <span class="status-dot"></span> Success
                                    </span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#TRX-99202</strong></td>
                                <td>Oct<br>23,<br>2023</td>
                                <td><span class="badge-gray">SALES</span></td>
                                <td>Payment from Corporate<br>Order - BCA</td>
                                <td class="text-right text-green">+ Rp 45.200.000</td>
                                <td>
                                    <span class="status-pill pending">
                                        <span class="status-dot"></span> Pending
                                    </span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#TRX-99203</strong></td>
                                <td>Oct<br>22,<br>2023</td>
                                <td><span class="badge-gray">MARKETING</span></td>
                                <td>FB & Google Ads<br>Campaign - Oct</td>
                                <td class="text-right text-black">Rp 12.000.000</td>
                                <td>
                                    <span class="status-pill success">
                                        <span class="status-dot"></span> Success
                                    </span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#TRX-99204</strong></td>
                                <td>Oct<br>22,<br>2023</td>
                                <td><span class="badge-gray">REFUND</span></td>
                                <td>Customer Return -<br>MacBook Pro M2</td>
                                <td class="text-right text-red">- Rp 28.500.000</td>
                                <td>
                                    <span class="status-pill success">
                                        <span class="status-dot"></span> Success
                                    </span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Tampil 4 dari 128 Transaksi</span>
                        <div class="pagination">
                            <button><i class="fas fa-chevron-left"></i></button>
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                            <button><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>