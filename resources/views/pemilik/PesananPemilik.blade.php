<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - BosLaptop</title>
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/produkpemilik.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/pesananpemilik.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <div class="app-container">
        @include('sidebar.sidebarpemilik')

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
                    {{-- <button class="btn-add">
                        <i class="fas fa-plus"></i> New Order
                    </button> --}}
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>PENDAPATAN</h3>
                        <div class="value">$124,592.00</div>
                        <span class="trend-up"><i class="fas fa-arrow-up"></i> +12.5%</span>
                    </div>

                    <div class="stat-card">
                        <h3>PEMESANAN AKTIF</h3>
                        <div class="value">412</div>
                        <span class="status-stable"><i class="fas fa-sync"></i> Stable</span>
                    </div>

                    <div class="stat-card">
                        <h3>RETURNS</h3>
                        <div class="value">3</div>
                        <span class="trend-down"><i class="fas fa-arrow-down"></i> -2%</span>
                    </div>

                    {{-- <div class="stat-card system-health">
                        <div class="health-content">
                            <h3>SYSTEM HEALTH</h3>
                            <span class="status-text">Optimal</span>
                            <p class="latency">Processing latency: 45ms</p>
                        </div>
                        <i class="fas fa-bolt health-icon-bg"></i>
                    </div> --}}
                </div>

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
                        <span class="filter-info">Tampil 1-10 dari 128 produk</span>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>JUMLAH</th>
                                <th>STATUS</th>
                                <th>NO RESI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="https://via.placeholder.com/48" alt="Laptop">
                                        <div class="product-details">
                                            <h4>Titan Studio Z</h4>
                                            <span>SKU: TS-Z17-CREATOR</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">WORKSTATION</span></td>
                                <td><strong>$3,199.00</strong></td>
                                <td>18 Units</td>
                                <td><span class="status-dot tersedia"></span>  Proses Pengiriman</td>
                                <td>TRK-789012</td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="https://via.placeholder.com/48" alt="Laptop">
                                        <div class="product-details">
                                            <h4>Titan Studio Z</h4>
                                            <span>SKU: TS-Z17-CREATOR</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">WORKSTATION</span></td>
                                <td><strong>$3,199.00</strong></td>
                                <td>18 Units</td>
                                <td><span class="status-dot tersedia"></span>  Proses Pengiriman</td>
                                <td>TRK-789012</td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="https://via.placeholder.com/48" alt="Laptop">
                                        <div class="product-details">
                                            <h4>Titan Studio Z</h4>
                                            <span>SKU: TS-Z17-CREATOR</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">WORKSTATION</span></td>
                                <td><strong>$3,199.00</strong></td>
                                <td>18 Units</td>
                                <td><span class="status-dot tersedia"></span>  Proses Pengiriman</td>
                                <td>TRK-789012</td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="https://via.placeholder.com/48" alt="Laptop">
                                        <div class="product-details">
                                            <h4>Titan Studio Z</h4>
                                            <span>SKU: TS-Z17-CREATOR</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">WORKSTATION</span></td>
                                <td><strong>$3,199.00</strong></td>
                                <td>18 Units</td>
                                <td><span class="status-dot tersedia"></span>  Proses Pengiriman</td>
                                <td>TRK-789012</td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Showing 10 of 128 transactions</span>
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

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const appContainer = document.querySelector('.app-container');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            appContainer.classList.toggle('sidebar-open');
        });

        // Close sidebar when clicking on a link
        const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                sidebar.classList.remove('active');
                appContainer.classList.remove('sidebar-open');
            });
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickInsideToggle = sidebarToggle.contains(event.target);

            if (!isClickInsideSidebar && !isClickInsideToggle && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
                appContainer.classList.remove('sidebar-open');
            }
        });
    </script>
</body>

</html>
