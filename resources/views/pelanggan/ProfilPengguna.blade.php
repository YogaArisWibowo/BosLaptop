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
            </div>
        </div>

        <div class="page-header">
            <h1>Profil Pengguna</h1>
            <p>Kelola informasi pribadi, preferensi akun, dan daftar alamat pengiriman Anda untuk pengalaman belanja
                yang lebih cepat di BosLaptop Jogja.</p>
        </div>

        {{-- Alert Notifikasi Sukses --}}
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Alert Error Validasi --}}
        @if ($errors->any())
            <div
                style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="profile-container">

            <div>
                <div class="card">

                    {{-- SATU FORM UNTUK MENGUBAH FOTO, NAMA, DAN NO HP --}}
                    <form action="{{ route('profil.ubah') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="profile-header-info">
                            <div class="avatar-wrapper">
                                <img id="preview-foto"
                                    src="{{ $pelanggan->foto_profil ? asset('storage/' . $pelanggan->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($pelanggan->nama) . '&background=random' }}"
                                    alt="User Avatar">

                                {{-- Input File (Disembunyikan) --}}
                                <input type="file" name="foto_profil" id="input-foto-profil"
                                    accept="image/png, image/jpeg, image/jpg" style="display: none;"
                                    onchange="previewImage(event)">

                                {{-- Tombol Edit yang memanggil input file --}}
                                <div class="btn-edit-avatar"
                                    onclick="document.getElementById('input-foto-profil').click();"
                                    style="cursor: pointer; z-index: 10;">
                                    <i class="fas fa-pen"></i>
                                </div>
                            </div>

                            <div class="user-meta">
                                <h3>{{ $pelanggan->nama }}</h3>
                                <p>{{ $pelanggan->email }}</p>
                                <span class="badge-verified">AKUN TERVERIFIKASI</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <div class="input-wrapper">
                                <i class="far fa-user"></i>
                                <input type="text" name="nama" value="{{ $pelanggan->nama }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone-alt"></i>
                                <input type="text" name="no_hp" value="{{ $pelanggan->no_hp }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email Perusahaan / Pribadi</label>
                            <div class="input-wrapper">
                                <i class="far fa-envelope"></i>
                                <input type="email" value="{{ $pelanggan->email }}" readonly
                                    style="background-color: #f8f9fa;">
                            </div>
                        </div>

                        {{-- Tombol submit akan memproses form ini --}}
                        <button type="submit" class="btn-save">Simpan Perubahan</button>
                    </form>

                </div>

                <div class="card" style="padding: 20px;">
                    <div class="security-header">Keamanan Akun</div>
                    <div class="security-box">
                        <div class="security-info">
                            <i class="fas fa-unlock-alt"></i>
                            <div>
                                <h4>Ganti Kata Sandi</h4>
                                <p>Gunakan sandi yang kuat</p>
                            </div>
                        </div>
                        <button
                            style="color: var(--primary-purple); background: none; border: none; font-weight: 600; font-size: 14px; cursor: pointer;">Update</button>
                    </div>
                </div>
            </div>

            <div>
                <div class="address-header">
                    <div>
                        <h2>Daftar Alamat</h2>
                        <p>Alamat pengiriman pesanan Anda</p>
                    </div>
                    <button class="btn-add-address"
                        onclick="document.getElementById('tambah-alamat-form').style.display='block'">
                        <i class="fas fa-plus"></i> Tambah Alamat Baru
                    </button>
                </div>

                <div class="card">

                    @forelse($daftarAlamat as $alamat)
                        {{-- JIKA ALAMAT UTAMA --}}
                        @if (isset($alamat['is_utama']) && $alamat['is_utama'])
                            <div class="address-card-primary">
                                <span class="badge-utama">ALAMAT UTAMA</span>
                                <div class="address-grid">
                                    <div class="address-details">
                                        <div class="address-title">
                                            <i class="fas fa-map-marker-alt"></i> {{ $alamat['label'] }}
                                        </div>
                                        <div class="contact-row">
                                            <i class="fas fa-phone-alt"></i>
                                            <span>{{ $alamat['telepon'] }}</span>
                                        </div>
                                        <div class="contact-row">
                                            <i class="fas fa-home"></i>
                                            <span>{{ $alamat['alamat_lengkap'] }}</span>
                                        </div>
                                    </div>
                                    <div class="map-placeholder">
                                        <img src="https://static.vecteezy.com/system/resources/previews/001/833/276/non_2x/roadmap-city-map-vector.jpg"
                                            alt="Map Placeholder">
                                    </div>
                                </div>
                                <div class="address-actions">
                                    <button
                                        onclick="document.getElementById('edit-alamat-{{ $alamat['id_alamat'] }}').style.display='block'"
                                        class="btn-action-outline btn-ubah-merah">
                                        <i class="fas fa-pen"></i> Ubah Alamat
                                    </button>

                                    <form action="/profilpengguna/hapus-alamat/{{ $alamat['id_alamat'] }}"
                                        method="POST" style="margin: 0;">
                                        @csrf
                                        <button type="submit" class="btn-action-outline"
                                            style="color: var(--primary-red); border-color: #fecdd3;"
                                            onclick="return confirm('Yakin ingin menghapus alamat ini?')">
                                            <i class="far fa-trash-alt"></i> Hapus Alamat
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{-- JIKA ALAMAT SEKUNDER (TAMBAHAN) --}}
                        @else
                            <div class="address-card-secondary" style="margin-top: 20px;">
                                <div class="address-title">
                                    <i class="fas fa-map-marker-alt"></i> {{ $alamat['label'] }}
                                </div>
                                <div class="contact-row" style="margin-left: 28px;">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>{{ $alamat['telepon'] }}</span>
                                </div>
                                <div class="contact-row" style="margin-left: 28px;">
                                    <i class="fas fa-home"></i>
                                    <span>{{ $alamat['alamat_lengkap'] }}</span>
                                </div>

                                <div class="secondary-actions"
                                    style="display: flex; align-items: center; gap: 12px; margin-left: 28px; margin-top: 15px;">
                                    <a onclick="document.getElementById('edit-alamat-{{ $alamat['id_alamat'] }}').style.display='block'"
                                        style="color: var(--primary-purple); cursor:pointer; font-weight:600;">Ubah</a>
                                    <span style="color: var(--border-color);">|</span>

                                    <form action="/profilpengguna/hapus-alamat/{{ $alamat['id_alamat'] }}"
                                        method="POST" style="margin: 0;">
                                        @csrf
                                        <button type="submit"
                                            style="background:none; border:none; color: var(--primary-purple); cursor:pointer; font-weight:600; font-size:13px; font-family:inherit;"
                                            onclick="return confirm('Yakin ingin menghapus alamat ini?')">Hapus</button>
                                    </form>
                                    <span style="color: var(--border-color);">|</span>

                                    <a class="text-dark" style="cursor:pointer;">Jadikan Utama</a>
                                </div>
                            </div>
                        @endif

                        {{-- FORM EDIT ALAMAT (Disembunyikan) --}}
                        <div id="edit-alamat-{{ $alamat['id_alamat'] }}"
                            style="display: none; margin-top: 15px; border: 1px dashed var(--primary-purple); padding: 20px; border-radius: 8px; background: var(--light-purple);">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                                <h3 style="font-size: 16px; color: var(--primary-purple);">Edit Alamat</h3>
                                <button type="button"
                                    onclick="document.getElementById('edit-alamat-{{ $alamat['id_alamat'] }}').style.display='none'"
                                    style="background:none; border:none; color:red; cursor:pointer;">
                                    <i class="fas fa-times"></i> Tutup
                                </button>
                            </div>

                            <form action="/profilpengguna/update-alamat/{{ $alamat['id_alamat'] }}" method="POST">
                                @csrf
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label style="font-size: 12px;">Label Alamat</label>
                                    <input type="text" name="label" value="{{ $alamat['label'] }}" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px;">
                                </div>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label style="font-size: 12px;">Nomor Telepon</label>
                                    <input type="text" name="telepon" value="{{ $alamat['telepon'] }}" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px;">
                                </div>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <label style="font-size: 12px;">Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" rows="3" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px; resize: none; font-family: inherit;">{{ $alamat['alamat_lengkap'] }}</textarea>
                                </div>
                                <button type="submit" class="btn-save-purple">Update Alamat</button>
                            </form>
                        </div>

                    @empty
                        <div style="text-align: center; padding: 40px 20px;">
                            <i class="fas fa-map-marked-alt"
                                style="font-size: 40px; color: #ddd; margin-bottom: 15px;"></i>
                            <h4 style="color: #666;">Belum Ada Alamat</h4>
                            <p style="color: #999; font-size: 14px;">Tambahkan alamat agar pesanan Anda bisa dikirim ke
                                tujuan.</p>
                        </div>
                    @endforelse

                    {{-- FORM TAMBAH ALAMAT BARU (Disembunyikan) --}}
                    <div id="tambah-alamat-form"
                        style="display: none; margin-top: 30px; border-top: 1px dashed #ddd; padding-top: 20px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <h3 style="font-size: 16px; color: #333;">Tambah Alamat Baru</h3>
                            <button type="button"
                                onclick="document.getElementById('tambah-alamat-form').style.display='none'"
                                style="background:none; border:none; color:red; cursor:pointer;">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </div>

                        <form action="/profilpengguna/tambah-alamat" method="POST">
                            @csrf
                            <div class="form-group">
                                <label style="font-size: 12px;">Label Alamat (Contoh: Rumah, Kantor, Kos)</label>
                                <input type="text" name="label" required
                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px;">
                            </div>
                            <div class="form-group" style="margin-top: 15px;">
                                <label style="font-size: 12px;">Nomor Telepon Penerima</label>
                                <input type="text" name="telepon" required
                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px;">
                            </div>
                            <div class="form-group" style="margin-top: 15px;">
                                <label style="font-size: 12px;">Alamat Lengkap (Jalan, RT/RW, Desa, Kecamatan)</label>
                                <textarea name="alamat_lengkap" rows="3" required
                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; margin-top: 5px; resize: none; font-family: inherit;"></textarea>
                            </div>
                            <button type="submit" class="btn-save-purple">Simpan Alamat</button>
                        </form>
                    </div>

                    <div class="new-location-box" style="margin-top: 25px;">
                        <div class="new-location-icon">
                            <i class="fas fa-map-pin"></i>
                        </div>
                        <h4>Ingin mengirim ke lokasi baru?</h4>
                        <p>Tambahkan alamat baru untuk mempermudah manajemen logistik Anda.</p>
                        <button class="btn-outline-purple"
                            onclick="document.getElementById('tambah-alamat-form').style.display='block'">+ Daftarkan
                            Alamat Baru</button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Script untuk Preview Gambar sebelum disave --}}
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-foto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
