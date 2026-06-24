<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - BosLaptop</title>
    <link rel="stylesheet" href="{{ asset('css/admin/produkadmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        @include('sidebar.sidebaradmin')

        <main class="main-content">
            <header class="topbar">
                <button class="hamburger-btn" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari komponen, Produk, DLL...">
                </div>
                <div class="topbar-icons">
                    <i class="far fa-bell"></i>
                    <i class="far fa-question-circle"></i>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="page-header">
                    <div>
                        <h1>Manajemen Produk</h1>
                        <p>Monitor, edit, and manage your high-performance laptop fleet.</p>
                    </div>
                    <button class="btn-add" id="addProductBtn">
                        <i class="fas fa-plus"></i> Add New Product
                    </button>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon bg-red-light">
                            <i class="fas fa-box"></i>
                        </div>
                        <span class="badge-top-right badge-red">+12%</span>
                        <h3>PRODUK TERSEDIA</h3>
                        <div class="value">1,284 Unit</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon bg-purple-light">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span class="badge-top-right badge-purple">LIVE</span>
                        <h3>ACTIVE LISTINGS</h3>
                        <div class="value">942 Pro</div>
                    </div>

                    <div class="stat-card system-perf">
                        <h3>System Performance</h3>
                        <p>Real-time inventory sync is active across all global data centers.</p>
                    </div>
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
                                <th>STOK</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="https://via.placeholder.com/48" alt="Laptop">
                                        <div class="product-details">
                                            <h4>BosMaster Pro X15</h4>
                                            <span>SKU: BM-PX15-2024</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">WORKSTATION</span></td>
                                <td><strong>$2,499.00</strong></td>
                                <td>42<br><small style="color:#6b7280;">Unit</small></td>
                                <td><span class="status-dot tersedia"></span> Tersedia</td>
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
                                            <h4>HyperBlade Elite</h4>
                                            <span>SKU: HB-ELT14-BLK</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-gaming">GAMING</span></td>
                                <td><strong>$1,899.00</strong></td>
                                <td>12<br><small style="color:#6b7280;">Unit</small></td>
                                <td><span class="status-dot hampir-habis"></span> Hampir habis</td>
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
                                            <h4>AeroAir Ultrabook</h4>
                                            <span>SKU: AA-ULT13-WHT</span>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-portable">PORTABLE</span></td>
                                <td><strong>$1,250.00</strong></td>
                                <td>0<br><small style="color:#6b7280;">Unit</small></td>
                                <td><span class="status-dot habis"></span> Habis</td>
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
                                <td>18<br><small style="color:#6b7280;">Unit</small></td>
                                <td><span class="status-dot tersedia"></span> Tersedia</td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Showing 4 of 128 transactions</span>
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

    <!-- Modal Tambah Produk -->
    <div class="modal" id="addProductModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Produk Baru</h2>
                <button class="modal-close" id="closeModalBtn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="modal-form">
                <div class="form-group">
                    <label for="productName">Nama Produk</label>
                    <input type="text" id="productName" placeholder="Masukkan nama produk" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productCategory">Kategori</label>
                        <select id="productCategory" required>
                            <option value="">Pilih Kategori</option>
                            <option value="workstation">Workstation</option>
                            <option value="gaming">Gaming</option>
                            <option value="portable">Portable</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Harga</label>
                        <input type="number" id="productPrice" placeholder="Masukkan harga" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="productStock">Stok</label>
                        <input type="number" id="productStock" placeholder="Masukkan jumlah stok" required>
                    </div>
                    <div class="form-group">
                        <label for="productSKU">SKU</label>
                        <input type="text" id="productSKU" placeholder="Masukkan SKU" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="productDescription">Deskripsi</label>
                    <textarea id="productDescription" placeholder="Masukkan deskripsi produk" rows="4"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="cancelBtn">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Produk</button>
                </div>
            </form>
        </div>
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

        // Modal functionality
        const addProductBtn = document.getElementById('addProductBtn');
        const addProductModal = document.getElementById('addProductModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        addProductBtn.addEventListener('click', function() {
            addProductModal.classList.add('active');
        });

        closeModalBtn.addEventListener('click', function() {
            addProductModal.classList.remove('active');
        });

        cancelBtn.addEventListener('click', function() {
            addProductModal.classList.remove('active');
        });

        // Close modal when clicking outside
        addProductModal.addEventListener('click', function(event) {
            if (event.target === addProductModal) {
                addProductModal.classList.remove('active');
            }
        });

        // Handle form submission
        document.querySelector('.modal-form').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Produk berhasil ditambahkan!');
            addProductModal.classList.remove('active');
            this.reset();
        });
    </script>
</body>
</html>