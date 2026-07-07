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
                        <p class="subtitle">Kelola Identitas Utama, Lokasi, dan Jadwal Operasional Toko Anda.</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert-danger">
                        <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                    </div>
                @endif

                <form action="{{ $toko ? route('toko.ubah') : route('toko.tambah') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($toko) @method('PUT') @endif

                    <input type="hidden" name="id_pemilik" value="1"> <div class="settings-grid">
                        
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

                                <div class="settings-form">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>NAMA TOKO</label>
                                            <input type="text" name="nama_toko" value="{{ $toko->nama_toko ?? 'BosLaptop Official Yogyakarta' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>KATEGORI UTAMA</label>
                                            <div class="select-wrapper">
                                                <select name="kategori_utama" required>
                                                    <option value="Electronic & High-End Computing" {{ ($toko && $toko->kategori_utama == 'Electronic & High-End Computing') ? 'selected' : '' }}>Electronic & High-End Computing</option>
                                                    <option value="Accessories" {{ ($toko && $toko->kategori_utama == 'Accessories') ? 'selected' : '' }}>Accessories</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>ALAMAT LENGKAP</label>
                                        <textarea name="alamat_lengkap" rows="3" required>{{ $toko->alamat_lengkap ?? '' }}</textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>EMAIL KONTAK</label>
                                            <div class="input-with-icon">
                                                <i class="far fa-envelope"></i>
                                                <input type="email" name="email_kontak" value="{{ $toko->email_kontak ?? 'contact@boslaptop.com' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>NOMOR TELEPON</label>
                                            <div class="input-with-icon">
                                                <i class="fas fa-phone-alt"></i>
                                                <input type="text" name="nomor_telepon" value="{{ $toko->nomor_telepon ?? '' }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="reset" class="btn-reset">RESET</button>
                                        <button type="submit" class="btn-save">SIMPAN PERUBAHAN</button>
                                    </div>
                                </div>
                            </div>

                            <div class="setting-card">
                                <div class="card-header">
                                    <h2>Lokasi Toko</h2>
                                    <span class="badge-status text-red">LOCATION PREVIEW</span>
                                </div>
                                <div class="map-container">
                                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Map Location">
                                    <div class="map-overlay">
                                        Peta Lokasi Sesuai Alamat Terdaftar
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
                                    @php
                                        $daftar_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                        $jam_saved = $toko ? $toko->jam_operasional : [];
                                    @endphp

                                   @foreach($daftar_hari as $hari)
                                        @php
                                            $is_buka = isset($jam_saved[$hari]['buka']) && $jam_saved[$hari]['buka'] == '1';
                                            $jam_mulai = $jam_saved[$hari]['jam_mulai'] ?? '09:00';
                                            $jam_selesai = $jam_saved[$hari]['jam_selesai'] ?? '21:00';
                                        @endphp
                                        
                                        <div class="schedule-item {{ $is_buka ? 'active' : 'disabled' }}" id="row-{{ $hari }}">
                                            <label class="checkbox-container">
                                                <input type="checkbox" name="jam_operasional[{{ $hari }}][buka]" value="1" {{ $is_buka ? 'checked' : '' }} onchange="toggleOperasional('{{ $hari }}')">
                                                <span class="checkmark"></span>
                                                <strong>{{ $hari }}</strong>
                                            </label>
                                            
                                            <div class="time-range" id="time-group-{{ $hari }}" style="{{ $is_buka ? 'display: flex;' : 'display: none;' }} gap: 5px; align-items: center;">
                                                <input type="time" name="jam_operasional[{{ $hari }}][jam_mulai]" value="{{ $jam_mulai }}" {{ $is_buka ? '' : 'disabled' }}>
                                                <span>-</span>
                                                <input type="time" name="jam_operasional[{{ $hari }}][jam_selesai]" value="{{ $jam_selesai }}" {{ $is_buka ? '' : 'disabled' }}>
                                            </div>
                                            
                                            <span class="status-closed" id="status-text-{{ $hari }}" style="{{ $is_buka ? 'display: none;' : 'display: block;' }}">CLOSED</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="setting-card">
                                <div class="card-header">
                                    <h2>Store Banner</h2>
                                </div>
                                <div class="banner-preview" style="margin-bottom: 15px; border-radius: 6px; overflow: hidden;">
                                    @if($toko && $toko->store_banner)
                                        <img src="{{ asset($toko->store_banner) }}" alt="Store Banner" style="width: 100%; object-fit: cover; max-height: 150px;">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Store Banner Default" style="width: 100%; object-fit: cover; max-height: 150px;">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="file" name="store_banner" class="form-control" style="border: none; padding: 0;">
                                </div>
                                <p class="helper-text">Recommended size: 1920x400px. Supports PNG, JPG, WebP. Max size 2MB.</p>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        function toggleOperasional(hari) {
            const row = document.getElementById(`row-${hari}`);
            const timeGroup = document.getElementById(`time-group-${hari}`);
            const statusText = document.getElementById(`status-text-${hari}`);
            const inputs = timeGroup.getElementsByTagName('input');
            const checkbox = row.querySelector('input[type="checkbox"]');

            if (checkbox.checked) {
                row.classList.remove('disabled');
                row.classList.add('active');
                timeGroup.style.display = 'flex';
                statusText.style.display = 'none';
                for (let input of inputs) { input.disabled = false; }
            } else {
                row.classList.remove('active');
                row.classList.add('disabled');
                timeGroup.style.display = 'none';
                statusText.style.display = 'block';
                for (let input of inputs) { input.disabled = true; }
            }
        }
    </script>
</body>
</html>