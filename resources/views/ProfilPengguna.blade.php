<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - BosLaptop</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/produkpelanggan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/profilpengguna.css') }}">
</head>
<body>

    @include('sidebar.sidebarpelanggan')

    <div class="main-content">
        <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari laptop, aksesoris, atau SKU...">
            </div>
            <div class="user-section">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="badge"></div>
                </div>
                <div class="profile-info">
                    <span>Pelanggan</span>
                    <img src="https://ui-avatars.com/api/?name=Pelanggan&background=random" alt="Profile">
                </div>
            </div>
        </div>

        <div class="page-header">
            <h1>Profil Pengguna</h1>
            <p>Kelola informasi pribadi, preferensi akun, dan daftar alamat pengiriman Anda untuk pengalaman belanja yang lebih cepat di BosLaptop Jogja.</p>
        </div>

        <div class="profile-container">
            
            <div>
                <div class="card">
                    <div class="profile-header-info">
                        <div class="avatar-wrapper">
                            <img src="https://ui-avatars.com/api/?name=Pelanggan+Utama&background=random" alt="User Avatar">
                            <div class="btn-edit-avatar"><i class="fas fa-pen"></i></div>
                        </div>
                        <div class="user-meta">
                            <h3>Pelanggan Utama</h3>
                            <p>Pelanggan@boslaptop.id</p>
                            <span class="badge-verified">AKUN TERVERIFIKASI</span>
                        </div>
                    </div>

                    <form>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="input-wrapper">
                                <i class="far fa-user"></i>
                                <input type="text" value="Pelanggan Utama BosLaptop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone-alt"></i>
                                <input type="text" value="+62 812-3456-7890">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Perusahaan</label>
                            <div class="input-wrapper">
                                <i class="far fa-envelope"></i>
                                <input type="email" value="Pelanggan@boslaptop.id">
                            </div>
                        </div>
                        <button type="button" class="btn-save">Simpan Perubahan</button>
                    </form>
                </div>

                <div class="card" style="padding: 20px;">
                    <div class="security-header">Keamanan Akun</div>
                    <div class="security-box">
                        <div class="security-info">
                            <i class="fas fa-unlock-alt"></i>
                            <div>
                                <h4>Ganti Kata Sandi</h4>
                                <p>Terakhir diubah 2 bulan lalu</p>
                            </div>
                        </div>
                        <button class="btn-update-purple">Update</button>
                    </div>
                </div>
            </div>

            <div>
                <div class="address-header">
                    <div>
                        <h2>Daftar Alamat</h2>
                        <p>Alamat pengiriman pesanan Anda</p>
                    </div>
                    <button class="btn-add-address">
                        <i class="fas fa-plus"></i> Tambah Alamat Baru
                    </button>
                </div>

                <div class="card">
                    <div class="address-card-primary">
                        <span class="badge-utama">ALAMAT UTAMA</span>
                        <div class="address-grid">
                            <div class="address-details">
                                <div class="address-title">
                                    <i class="fas fa-map-marker-alt"></i> Admin Utama (BosLaptop HQ)
                                </div>
                                <div class="contact-row">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>+62 812-3456-7890</span>
                                </div>
                                <div class="contact-row">
                                    <i class="fas fa-home"></i>
                                    <span>Jl. Kaliurang KM 5.6 No. 12A, Manggung, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</span>
                                </div>
                            </div>
                            <div class="map-placeholder">
                                <img src="https://static.vecteezy.com/system/resources/previews/001/833/276/non_2x/roadmap-city-map-vector.jpg" alt="Map Placeholder">
                            </div>
                        </div>
                        <div class="address-actions">
                            <button class="btn-action-outline btn-ubah-merah">
                                <i class="fas fa-pen"></i> Ubah Alamat
                            </button>
                            <button class="btn-action-outline">
                                <i class="far fa-map"></i> Lihat di Peta
                            </button>
                        </div>
                    </div>

                    <div class="address-card-secondary">
                        <div class="address-title">
                            <i class="fas fa-map-marker-alt"></i> Gudang Distribusi
                        </div>
                        <div class="contact-row" style="margin-left: 28px;">
                            <i class="fas fa-phone-alt"></i>
                            <span>+62 819-8765-4321</span>
                        </div>
                        <div class="contact-row" style="margin-left: 28px;">
                            <i class="fas fa-home"></i>
                            <span>Jl. Ring Road Utara No. 45, Condongcatur, Sleman, Yogyakarta</span>
                        </div>
                        <div class="secondary-actions">
                            <a>Ubah</a> <span>|</span> <a>Hapus</a> <span>|</span> <a class="text-dark">Jadikan Utama</a>
                        </div>
                    </div>

                    <div class="new-location-box">
                        <div class="new-location-icon">
                            <i class="fas fa-map-pin"></i>
                        </div>
                        <h4>Ingin mengirim ke lokasi baru?</h4>
                        <p>Tambahkan alamat baru untuk mempermudah manajemen logistik Anda.</p>
                        <button class="btn-outline-purple">+ Daftarkan Alamat Baru</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>