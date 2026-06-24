<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - BosLaptop</title>
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/produkpemilik.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/penggunapemilik.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        @include('sidebar.sidebarpemilik')

        <main class="main-content">
            <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari pengguna atau peran...">
                </div>
                <div class="topbar-icons">
                    <i class="far fa-bell"></i>
                    <i class="far fa-question-circle"></i>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="page-header header-with-subtitle">
                    <div>
                        <h1>Manajemen Pengguna</h1>
                        <p class="subtitle">Kelola akun pengguna, peran, dan akses sistem dengan kontrol presisi tinggi.</p>
                    </div>
                    <div class="header-actions">
                        <button class="btn-add">
                            <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
                        </button>
                    </div>
                </div>

                <div class="stats-grid-3">
                    <div class="stat-card user-stat">
                        <div class="stat-content">
                            <h3>TOTAL PENGGUNA</h3>
                            <div class="value-icon-row">
                                <div class="value">1,240</div>
                                <div class="stat-icon bg-red-light">
                                    <i class="fas fa-users text-red"></i>
                                </div>
                            </div>
                            <div class="stat-trend text-red">
                                <i class="fas fa-arrow-up"></i> +4.2% bulan ini
                            </div>
                        </div>
                    </div>
                    
                    <div class="stat-card user-stat card-active-purple">
                        <div class="stat-content">
                            <h3>PENGGUNA AKTIF</h3>
                            <div class="value-icon-row">
                                <div class="value">1,180</div>
                                <div class="stat-icon bg-purple-light">
                                    <i class="fas fa-broadcast-tower text-purple"></i>
                                </div>
                            </div>
                            <div class="stat-trend text-purple">
                                <i class="far fa-check-circle"></i> 95% Engagement
                            </div>
                        </div>
                    </div>

                    <div class="stat-card user-stat">
                        <div class="stat-content">
                            <h3>ADMIN/STAFF</h3>
                            <div class="value-icon-row">
                                <div class="value">12</div>
                                <div class="stat-icon bg-gray-light">
                                    <i class="fas fa-shield-alt text-gray"></i>
                                </div>
                            </div>
                            <div class="stat-trend text-gray-dark">
                                <i class="fas fa-shield-alt"></i> Full access
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <div class="table-title">
                        Daftar Pengguna
                    </div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>NAMA PENGGUNA</th>
                                <th>EMAIL</th>
                                <th>PERAN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <img src="https://i.pravatar.cc/150?img=11" alt="Alex Rivera" class="user-avatar">
                                        <div class="user-details">
                                            <span class="user-name">Alex Rivera</span>
                                            <span class="user-role-sub">Admin System</span>
                                        </div>
                                    </div>
                                </td>
                                <td>alex.r@boslaptop.co</td>
                                <td><span class="badge-role role-admin">ADMIN</span></td>
                                <td>
                                    <span class="status-text text-purple"><span class="status-dot dot-purple"></span> Aktif</span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <img src="https://i.pravatar.cc/150?img=5" alt="Sarah Chen" class="user-avatar">
                                        <div class="user-details">
                                            <span class="user-name">Sarah Chen</span>
                                            <span class="user-role-sub">Sales Manager</span>
                                        </div>
                                    </div>
                                </td>
                                <td>sarah.chen@boslaptop.co</td>
                                <td><span class="badge-role role-staff">STAFF</span></td>
                                <td>
                                    <span class="status-text text-purple"><span class="status-dot dot-purple"></span> Aktif</span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <img src="https://i.pravatar.cc/150?img=8" alt="Marcus Knight" class="user-avatar">
                                        <div class="user-details">
                                            <span class="user-name">Marcus Knight</span>
                                            <span class="user-role-sub">Premium Buyer</span>
                                        </div>
                                    </div>
                                </td>
                                <td>m.knight@external.id</td>
                                <td><span class="badge-role role-customer">CUSTOMER</span></td>
                                <td>
                                    <span class="status-text text-gray-dark"><span class="status-dot dot-gray"></span> Nonaktif</span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <div class="user-initials">JD</div>
                                        <div class="user-details">
                                            <span class="user-name">Jane Doe</span>
                                            <span class="user-role-sub">Support Staff</span>
                                        </div>
                                    </div>
                                </td>
                                <td>j.doe@boslaptop.co</td>
                                <td><span class="badge-role role-staff">STAFF</span></td>
                                <td>
                                    <span class="status-text text-purple"><span class="status-dot dot-purple"></span> Aktif</span>
                                </td>
                                <td class="action-btns">
                                    <button><i class="fas fa-pen"></i></button>
                                    <button><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Menampilkan 1-4 dari 1,240 pengguna</span>
                        <div class="pagination">
                            <button><i class="fas fa-chevron-left"></i></button>
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                            <span>...</span>
                            <button><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>