<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BosLaptop - Manajemen Pengguna</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Path CSS eksternal Anda --}}
    <link rel="stylesheet" href="{{ asset('css/pemilik/produkpemilik.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemilik/penggunapemilik.css') }}">
</head>

<body>

    @include('sidebar.sidebarpemilik')

    <div class="main-content">
        <div class="page-content">
            <div class="page-content">
                {{-- Topbar --}}
                <div class="topbar">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari pengguna atau peran...">
            </div>
            <div class="user-section">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="badge"></div>
                </div>
                <div class="help-icon">
                    <i class="far fa-question-circle"></i>
                </div>
            </div>
        </div>

        {{-- 1. Alert Sukses (Untuk Tambah, Edit, Hapus) --}}
        @if (session('success'))
            <div class="custom-alert alert-success" id="alert-success">
                <div class="alert-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="alert-content">
                    <div class="alert-title">Berhasil!</div>
                    <p class="alert-message">{{ session('success') }}</p>
                </div>
                <button class="alert-close" onclick="closeAlert('alert-success')">&times;</button>
            </div>
        @endif

        {{-- 2. Alert Gagal (Pesan Error Spesifik dari Controller) --}}
        @if (session('error'))
            <div class="custom-alert alert-danger" id="alert-error">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="alert-content">
                    <div class="alert-title">Terjadi Kesalahan!</div>
                    <p class="alert-message">{{ session('error') }}</p>
                </div>
                <button class="alert-close" onclick="closeAlert('alert-error')">&times;</button>
            </div>
        @endif

        {{-- 3. Alert Validasi Gagal (Misal: email sudah ada, password kurang panjang) --}}
        @if ($errors->any())
            <div class="custom-alert alert-danger" id="alert-validation">
                <div class="alert-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="alert-content">
                    <div class="alert-title">Gagal Menyimpan Data!</div>
                    <ul class="alert-message" style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="alert-close" onclick="closeAlert('alert-validation')">&times;</button>
            </div>
        @endif

        {{-- Header & Button --}}
        <div class="page-header-container">
            <div class="header-with-subtitle">
                <h2>Manajemen Pengguna</h2>
                <div class="subtitle">Kelola akun pengguna, peran, dan akses sistem dengan kontrol presisi tinggi.</div>
            </div>
            {{-- Tambahkan onclick untuk membuka modal --}}
            <button class="btn-primary-red" onclick="openModalTambah()">
                <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
            </button>
        </div>

        {{-- Stats Cards Khusus Pengguna --}}
        <div class="stats-grid-3">
            <div class="user-stat card-white">
                <div class="stat-content">
                    <span class="stat-title">TOTAL PENGGUNA</span>
                    <h2>{{ $daftarAdmin->count() + $daftarPelanggan->count() }}</h2>

                </div>
                <div class="stat-icon-wrapper bg-red-light text-red">
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="user-stat card-white border-left-purple">
                <div class="stat-content">
                    <span class="stat-title">PELANGGAN</span>
                    <h2>{{ $daftarPelanggan->count() }}</h2>

                </div>
                <div class="stat-icon-wrapper bg-purple-light text-purple">
                    <i class="fas fa-stream"></i>
                </div>
            </div>

            <div class="user-stat card-white">
                <div class="stat-content">
                    <span class="stat-title">ADMIN/STAFF</span>
                    <h2>{{ $daftarAdmin->count() }}</h2>
                    <div class="stat-trend text-gray-dark">
                        <i class="fas fa-shield-alt"></i> <span>Full access</span>
                    </div>
                </div>
                <div class="stat-icon-wrapper bg-gray-light text-gray-dark">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
        </div>

        {{-- TABEL DATA PENGGUNA UNIFIED --}}
        <div class="table-container">
            <div class="table-header">
                <h3>Daftar Pengguna</h3>
            </div>
            <table class="user-table">
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
                    {{-- Looping Data Admin --}}
                    @foreach ($daftarAdmin as $admin)
                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="user-initials bg-cyan-light text-cyan">
                                        {{ strtoupper(substr($admin->nama, 0, 2)) }}</div>
                                    <div class="user-details">
                                        <span class="user-name">{{ $admin->nama }}</span>
                                        <span class="user-role-sub">Admin System</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-email">{{ $admin->email }}</td>
                            <td><span class="badge-role role-admin">ADMIN</span></td>
                            <td>
                                <div class="status-text text-purple">
                                    <span class="status-dot dot-purple"></span> Aktif
                                </div>
                            </td>
                            <td>
                                <div class="action-btns">
                                    {{-- Tombol Edit Admin --}}
                                    <button class="btn-icon" data-peran="Admin" data-id="{{ $admin->id_admin }}"
                                        data-nama="{{ $admin->nama }}" data-email="{{ $admin->email }}"
                                        data-alamat="{{ $admin->alamat }}" data-gaji="{{ $admin->gaji }}"
                                        onclick="openModalEdit(this)">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    {{-- Tombol Hapus Admin --}}
                                    <button class="btn-icon" data-peran="Admin" data-id="{{ $admin->id_admin }}"
                                        data-nama="{{ $admin->nama }}" onclick="openModalHapus(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    {{-- Looping Data Pelanggan --}}
                    @foreach ($daftarPelanggan as $pelanggan)
                        @php
                            // Ambil teks alamat secara aman jika tipenya adalah array/JSON
                            $alamatString = '';
                            if (is_array($pelanggan->alamat)) {
                                // Cari alamat yang diset sebagai 'is_utama', jika tidak ada ambil alamat pertama
                                $alamatUtama =
                                    collect($pelanggan->alamat)->firstWhere('is_utama', true) ??
                                    collect($pelanggan->alamat)->first();
                                $alamatString = $alamatUtama['alamat_lengkap'] ?? '';
                            } else {
                                // Fallback jika di DB berupa string biasa
                                $alamatString = $pelanggan->alamat;
                            }
                        @endphp
                        <tr>
                            <td>
                                <div class="user-profile">
                                    <div class="user-initials bg-purple-light text-purple">
                                        {{ strtoupper(substr($pelanggan->nama, 0, 2)) }}</div>
                                    <div class="user-details">
                                        <span class="user-name">{{ $pelanggan->nama }}</span>
                                        <span class="user-role-sub">Customer</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-email">{{ $pelanggan->email }}</td>
                            <td><span class="badge-role role-customer">PELANGGAN</span></td>
                            <td>
                                <div class="status-text text-purple">
                                    <span class="status-dot dot-purple"></span> Aktif
                                </div>
                            </td>
                            <td>
                                <div class="action-btns">
                                    {{-- Tombol Edit Pelanggan --}}
                                    <button class="btn-icon" data-peran="Pelanggan"
                                        data-id="{{ $pelanggan->id_pelanggan }}" data-nama="{{ $pelanggan->nama }}"
                                        data-email="{{ $pelanggan->email }}" data-alamat="{{ $alamatString }}"
                                        {{-- Menggunakan variabel string yang sudah aman --}} data-nohp="{{ $pelanggan->no_hp }}"
                                        onclick="openModalEdit(this)">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    {{-- Tombol Hapus Pelanggan --}}
                                    <button class="btn-icon" data-peran="Pelanggan"
                                        data-id="{{ $pelanggan->id_pelanggan }}" data-nama="{{ $pelanggan->nama }}"
                                        onclick="openModalHapus(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            </div>

        {{-- Modal Tambah Pengguna --}}
        <div id="modalTambah" class="modal-container"
            style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
            <div class="modal-content"
                style="background-color: #fff; margin: 5% auto; padding: 20px; border-radius: 8px; width: 50%; max-width: 500px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Tambah Pengguna Baru</h3>
                    <span onclick="closeModalTambah()" style="cursor: pointer; font-size: 20px;">&times;</span>
                </div>

                <form action="{{ route('pengguna.tambah') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 15px;">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required minlength="6"
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Peran</label>
                        <select name="peran" id="selectPeran" class="form-control" onchange="toggleFields()"
                            required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                            <option value="Admin">Admin</option>
                            <option value="Pelanggan">Pelanggan</option>
                        </select>
                    </div>

                    {{-- Field No HP (Hanya muncul jika pelanggan) --}}
                    <div id="fieldNoHp" style="margin-bottom: 15px; display: none;">
                        <label>No HP</label>
                        <input type="number" name="no_hp" class="form-control"
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                    </div>

                    {{-- Bagian Tombol Batal & Simpan --}}
                    <div
                        style="display: flex; justify-content: flex-end; align-items: center; gap: 10px; margin-top: 20px;">
                        <button type="button" onclick="closeModalTambah()"
                            style="padding: 10px 20px; background: #e2e8f0; color: #475569; border: none; border-radius: 6px; cursor: pointer; font-weight: 500; font-family: inherit; margin: 0;">Batal</button>
                        <button type="submit" class="btn-primary-red"
                            style="padding: 10px 20px; background: #e74c3c; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500; font-family: inherit; margin: 0;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ==================================================== --}}
        {{-- MODAL EDIT PENGGUNA --}}
        {{-- ==================================================== --}}
        <div id="modalEdit" class="modal-container"
            style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
            <div class="modal-content"
                style="background-color: #fff; margin: 5% auto; padding: 20px; border-radius: 8px; width: 50%; max-width: 500px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3>Edit Pengguna (<span id="textPeranEdit"></span>)</h3>
                    <span onclick="closeModalEdit()" style="cursor: pointer; font-size: 20px;">&times;</span>
                </div>

                <form id="formEditAkun" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 15px;">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" id="editNama" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Email</label>
                        <input type="email" name="email" id="editEmail" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Kosongkan jika tidak ingin mengubah password"
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    {{-- Field Gaji (Hanya untuk Admin) --}}
                    <div id="editFieldGaji" style="margin-bottom: 15px; display: none;">
                        <label>Gaji</label>
                        <input type="number" name="gaji" id="editGaji" class="form-control"
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    {{-- Field No HP (Hanya untuk Pelanggan) --}}
                    <div id="editFieldNoHp" style="margin-bottom: 15px; display: none;">
                        <label>No HP</label>
                        <input type="number" name="no_hp" id="editNoHp" class="form-control"
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label>Alamat</label>
                        <textarea name="alamat" id="editAlamat" class="form-control" required
                            style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                    </div>

                    {{-- Tombol Aksi Sejajar --}}
                    <div
                        style="display: flex; justify-content: flex-end; align-items: center; gap: 10px; margin-top: 20px;">
                        <button type="button" onclick="closeModalEdit()"
                            style="padding: 10px 20px; background: #e2e8f0; color: #475569; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Batal</button>
                        <button type="submit"
                            style="padding: 10px 20px; background: #e74c3c; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ==================================================== --}}
        {{-- MODAL HAPUS PENGGUNA --}}
        {{-- ==================================================== --}}
        <div id="modalHapus" class="modal-container"
            style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
            <div class="modal-content"
                style="background-color: #fff; margin: 10% auto; padding: 20px; border-radius: 8px; width: 40%; max-width: 400px; text-align: center;">
                <div style="color: #e74c3c; font-size: 40px; margin-bottom: 15px;">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Konfirmasi Hapus</h3>
                <p style="margin: 15px 0; color: #475569;">Apakah Anda yakin ingin menghapus akun <strong
                        id="textNamaHapus"></strong>?</p>

                <form id="formHapusAkun" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- Tombol Aksi Sejajar --}}
                    <div
                        style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 20px;">
                        <button type="button" onclick="closeModalHapus()"
                            style="padding: 10px 20px; background: #e2e8f0; color: #475569; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Batal</button>
                        <button type="submit"
                            style="padding: 10px 20px; background: #e74c3c; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">Hapus
                            Akun</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Script untuk mengatur Modal dan Input Dinamis --}}
        <script>
            function openModalTambah() {
                document.getElementById('modalTambah').style.display = 'block';
                toggleFields(); // Panggil fungsi saat modal dibuka
            }

            function closeModalTambah() {
                document.getElementById('modalTambah').style.display = 'none';
            }

            function toggleFields() {
                var peran = document.getElementById('selectPeran').value;
                var fieldNoHp = document.getElementById('fieldNoHp');
                var inputNoHp = document.querySelector('input[name="no_hp"]');

                if (peran === 'Pelanggan') {
                    fieldNoHp.style.display = 'block';
                    inputNoHp.required = true;
                } else {
                    // Jika Admin, sembunyikan No HP
                    fieldNoHp.style.display = 'none';
                    inputNoHp.required = false;
                    inputNoHp.value = ''; // Kosongkan nilainya
                }
            }

            // --- FUNGSI MODAL EDIT ---
            function openModalEdit(button) {
                // Ambil data dari attributes tombol yang diklik
                var peran = button.getAttribute('data-peran');
                var id = button.getAttribute('data-id');
                var nama = button.getAttribute('data-nama');
                var email = button.getAttribute('data-email');
                var alamat = button.getAttribute('data-alamat');

                // Set teks judul peran
                document.getElementById('textPeranEdit').innerText = peran;

                // Isi field input dasar
                document.getElementById('editNama').value = nama;
                document.getElementById('editEmail').value = email;
                document.getElementById('editAlamat').value = alamat;

                // Atur action URL Form secara dinamis sesuai route Anda
                // URL akan menjadi: /penggunapemilik/edit/Admin/1 atau /penggunapemilik/edit/Pelanggan/2
                document.getElementById('formEditAkun').action = '/penggunapemilik/edit/' + peran + '/' + id;

                // Atur penampakan input khusus berdasarkan Peran
                var fieldGaji = document.getElementById('editFieldGaji');
                var inputGaji = document.getElementById('editGaji');
                var fieldNoHp = document.getElementById('editFieldNoHp');
                var inputNoHp = document.getElementById('editNoHp');

                if (peran === 'Admin') {
                    fieldGaji.style.display = 'block';
                    inputGaji.required = true;
                    inputGaji.value = button.getAttribute('data-gaji');

                    fieldNoHp.style.display = 'none';
                    inputNoHp.required = false;
                    inputNoHp.value = '';
                } else {
                    fieldGaji.style.display = 'none';
                    inputGaji.required = false;
                    inputGaji.value = '';

                    fieldNoHp.style.display = 'block';
                    inputNoHp.required = true;
                    inputNoHp.value = button.getAttribute('data-nohp');
                }

                // Tampilkan modal
                document.getElementById('modalEdit').style.display = 'block';
            }

            function closeModalEdit() {
                document.getElementById('modalEdit').style.display = 'none';
            }

            // --- FUNGSI MODAL HAPUS ---
            function openModalHapus(button) {
                var peran = button.getAttribute('data-peran');
                var id = button.getAttribute('data-id');
                var nama = button.getAttribute('data-nama');

                // Set nama di teks konfirmasi
                document.getElementById('textNamaHapus').innerText = nama;

                // Atur action URL Form secara dinamis sesuai route Anda
                // URL akan menjadi: /penggunapemilik/hapus/Admin/1
                document.getElementById('formHapusAkun').action = '/penggunapemilik/hapus/' + peran + '/' + id;

                // Tampilkan modal
                document.getElementById('modalHapus').style.display = 'block';
            }

            function closeModalHapus() {
                document.getElementById('modalHapus').style.display = 'none';
            }

            // Menutup modal otomatis jika user klik di luar area modal content
            window.onclick = function(event) {
                var modalEdit = document.getElementById('modalEdit');
                var modalHapus = document.getElementById('modalHapus');
                if (event.target == modalEdit) {
                    closeModalEdit();
                }
                if (event.target == modalHapus) {
                    closeModalHapus();
                }
            }
        </script>

    </div>

</body>

</html>
