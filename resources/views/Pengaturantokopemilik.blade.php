<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Toko - BosLaptop</title>
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/produkpemilik.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/pemilik/pengaturantokopemilik.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-container">
        @include('sidebar.sidebarpemilik')

        <main class="main-content">
            <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari pengaturan...">
                </div>
                <div class="topbar-icons">
                    <i class="far fa-bell"></i>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="page-header header-with-subtitle">
                    <div>
                        <h1>Pengaturan Toko</h1>
                        <p class="subtitle">Manage your store's core identity, physical location, and operational scheduling.</p>
                    </div>
                </div>

                <div class="settings-grid">
                    
                    <div class="settings-left">
                        <div class="setting-card">
                            <div class="card-header">
                                <div>
                                    <h2>Informasi Utama Toko</h2>
                                    <span class="sub-heading">IDENTITAS DIGITAL & BRANDING</span>
                                </div>
                                <div class="header-icon bg-red-light text-red">
                                    <i class="fas fa-store"></i>
                                </div>
                            </div>

                            <form class="settings-form">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>NAMA TOKO</label>
                                        <input type="text" value="BosLaptop Official Jakarta">
                                    </div>
                                    <div class="form-group">
                                        <label>KATEGORI UTAMA</label>
                                        <div class="select-wrapper">
                                            <select>
                                                <option>Electronic & High-End Computing</option>
                                                <option>Accessories</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>ALAMAT LENGKAP</label>
                                    <textarea rows="3">Gedung Cyber 2, Lantai 15, Jl. H. R. Rasuna Said No.13, RT.7/RW.2, Kuningan Timur, Setiabudi, Jakarta Selatan, 12950</textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label>EMAIL KONTAK</label>
                                        <div class="input-with-icon">
                                            <i class="far fa-envelope"></i>
                                            <input type="email" value="contact@boslaptop.com">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>NOMOR TELEPON</label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-phone-alt"></i>
                                            <input type="text" value="+62 21 5550 1234">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn-reset">RESET</button>
                                    <button type="button" class="btn-save">SIMPAN PERUBAHAN</button>
                                </div>
                            </form>
                        </div>

                        <div class="setting-card">
                            <div class="card-header">
                                <h2>Lokasi Toko</h2>
                                <span class="badge-status text-red">GPS COORDINATES ACTIVE</span>
                            </div>
                            <div class="map-container">
                                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Map Location">
                                <div class="map-overlay">
                                    Lat: -6.2241 | Long: 106.8294
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="settings-right">
                        <div class="setting-card card-schedule border-purple">
                            <div class="card-header">
                                <h2><i class="far fa-clock text-purple" style="margin-right: 8px;"></i> Jam Operasional</h2>
                            </div>
                            
                            <div class="schedule-list">
                                <div class="schedule-item active">
                                    <label class="checkbox-container">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        <strong>Senin</strong>
                                    </label>
                                    <div class="time-range">
                                        <input type="text" value="09:00" readonly>
                                        <span>-</span>
                                        <input type="text" value="21:00" readonly>
                                    </div>
                                </div>

                                <div class="schedule-item active">
                                    <label class="checkbox-container">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        <strong>Selasa</strong>
                                    </label>
                                    <div class="time-range">
                                        <input type="text" value="09:00" readonly>
                                        <span>-</span>
                                        <input type="text" value="21:00" readonly>
                                    </div>
                                </div>

                                <div class="schedule-item active">
                                    <label class="checkbox-container">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                        <strong>Jumat</strong>
                                    </label>
                                    <div class="time-range">
                                        <input type="text" value="09:00" readonly>
                                        <span>-</span>
                                        <input type="text" value="22:00" readonly>
                                    </div>
                                </div>

                                <div class="schedule-item disabled">
                                    <label class="checkbox-container">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span class="text-gray">Minggu</span>
                                    </label>
                                    <span class="status-closed">CLOSED</span>
                                </div>
                            </div>

                            <button class="btn-dashed-purple">ADD SPECIAL HOLIDAY SCHEDULE</button>
                        </div>

                        <div class="setting-card">
                            <div class="card-header">
                                <h2>Store Banner</h2>
                            </div>
                            <div class="banner-preview">
                                <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Store Banner">
                            </div>
                            <p class="helper-text">Recommended size: 1920x400px. Supports PNG, JPG, WebP. Max size 2MB.</p>
                        </div>

                        <div class="setting-card bg-red-verylight">
                            <div class="danger-header">
                                <i class="fas fa-exclamation-triangle text-red"></i>
                                <h2>Area Berbahaya</h2>
                            </div>
                            <p class="helper-text">Actions here cannot be undone. Be certain before proceeding.</p>
                            <button class="btn-outline-red">NONAKTIFKAN TOKO SEMENTARA</button>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

</body>
</html>