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

                @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="page-header header-with-subtitle">
                    <div>
                        <h1>Manajemen Pengguna</h1>
                        <p class="subtitle">Kelola akun pengguna, peran, dan akses sistem dengan kontrol presisi tinggi.</p>
                    </div>
                    <div class="header-actions">
                        <button class="btn-add" onclick="openAddModal()">
                            <i class="fas fa-user-plus"></i> Tambah Pengguna Baru
                        </button>
                    </div>
                </div>

                <div class="stats-grid-3">
                    <div class="stat-card user-stat">
                        <div class="stat-content">
                            <h3>TOTAL PENGGUNA</h3>
                            <div class="value-icon-row">
                                <div class="value">{{ $pengguna->count() }}</div>
                                <div class="stat-icon bg-red-light">
                                    <i class="fas fa-users text-red"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card user-stat card-active-purple">
                        <div class="stat-content">
                            <h3>ADMIN</h3>
                            <div class="value-icon-row">
                                <div class="value">{{ $pengguna->where('peran', 'Admin')->count() }}</div>
                                <div class="stat-icon bg-purple-light">
                                    <i class="fas fa-shield-alt text-purple"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card user-stat">
                        <div class="stat-content">
                            <h3>PELANGGAN</h3>
                            <div class="value-icon-row">
                                <div class="value">{{ $pengguna->where('peran', 'Pelanggan')->count() }}</div>
                                <div class="stat-icon bg-gray-light">
                                    <i class="fas fa-user text-gray"></i>
                                </div>
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
                                <th>ALAMAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengguna as $p)
                            <tr>
                                <td>
                                    <div class="user-profile">
                                        <div class="user-initials" style="background-color: #eee; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold; margin-right: 10px;">
                                            {{ strtoupper(substr($p->nama, 0, 2)) }}
                                        </div>
                                        <div class="user-details">
                                            <span class="user-name">{{ $p->nama }}</span>
                                            <span class="user-role-sub">
                                                {{ $p->peran == 'Admin' ? 'Gaji: Rp '.number_format($p->gaji, 0, ',', '.') : 'No HP: '.$p->no_hp }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $p->email }}</td>
                                <td>
                                    @if($p->peran == 'Admin')
                                    <span class="badge-role role-admin" style="background-color: #ffeef0; color: #ff4757; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">ADMIN</span>
                                    @else
                                    <span class="badge-role role-customer" style="background-color: #e8f0fe; color: #1a73e8; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">PELANGGAN</span>
                                    @endif
                                </td>
                                <td>{{ $p->alamat }}</td>
                                <td class="action-btns">
                                    <button type="button"
                                        onclick="openEditModal(this)"
                                        data-id="{{ $p->id_pengguna }}"
                                        data-nama="{{ $p->nama }}"
                                        data-email="{{ $p->email }}"
                                        data-peran="{{ $p->peran }}"
                                        data-alamat="{{ $p->alamat }}"
                                        data-gaji="{{ $p->gaji ?? '' }}"
                                        data-nohp="{{ $p->no_hp ?? '' }}">
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <form action="{{ route('pengguna.hapus', ['peran' => $p->peran, 'id' => $p->id_pengguna]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: #ff4757; background: none; border: none; cursor: pointer;"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 20px;">Belum ada data pengguna.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="table-footer">
                        <span>Total: {{ $pengguna->count() }} Pengguna Terdaftar</span>
                    </div>
                </div>

            </div>
        </main>
    </div>

    /* MODAL TAMBAH PENGGUNA */
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Pengguna Baru</h2>
                <button class="close-btn" onclick="closeAddModal()">&times;</button>
            </div>
            <form action="{{ route('pengguna.tambah') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Peran / Role</label>
                    <select name="peran" id="add_peran" onchange="toggleAddFields()" required>
                        <option value="Admin">Admin</option>
                        <option value="Pelanggan">Pelanggan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3" required></textarea>
                </div>

                <div class="form-group" id="add_gaji_group">
                    <label>Gaji (Rupiah)</label>
                    <input type="number" name="gaji" id="add_gaji" required>
                </div>

                <div class="form-group" id="add_nohp_group" style="display:none;">
                    <label>No HP / Telepon</label>
                    <input type="number" name="no_hp" id="add_nohp">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeAddModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan Akun</button>
                </div>
            </form>
        </div>
    </div>

    /* MODAL EDIT PENGGUNA */
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Pengguna</h2>
                <button class="close-btn" onclick="closeEditModal()">&times;</button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Peran: <strong id="edit_peran_text"></strong></label>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" id="edit_nama" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="edit_email" required>
                </div>
                <div class="form-group">
                    <label>Password Baru <span style="font-size:0.8rem; font-weight:normal; color:#888;">(Kosongkan jika tidak diubah)</span></label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="edit_alamat" rows="3" required></textarea>
                </div>

                <div class="form-group" id="edit_gaji_group">
                    <label>Gaji (Rupiah)</label>
                    <input type="number" name="gaji" id="edit_gaji">
                </div>

                <div class="form-group" id="edit_nohp_group">
                    <label>No HP / Telepon</label>
                    <input type="number" name="no_hp" id="edit_nohp">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    /* JAVASCRIPT LOGIC MODAL & TOGGLE FIELD */
    <script>
        // --- LOGIC MODAL TAMBAH ---
        function openAddModal() {
            document.getElementById('addModal').classList.add('show');
            toggleAddFields();
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.remove('show');
        }

        function toggleAddFields() {
            const peran = document.getElementById('add_peran').value;
            const gajiGroup = document.getElementById('add_gaji_group');
            const nohpGroup = document.getElementById('add_nohp_group');

            if (peran === 'Admin') {
                gajiGroup.style.display = 'block';
                document.getElementById('add_gaji').required = true;
                nohpGroup.style.display = 'none';
                document.getElementById('add_nohp').required = false;
            } else {
                gajiGroup.style.display = 'none';
                document.getElementById('add_gaji').required = false;
                nohpGroup.style.display = 'block';
                document.getElementById('add_nohp').required = true;
            }
        }

        // --- LOGIC MODAL EDIT ---
        function openEditModal(button) {
            // Ambil data atribut dari tombol yang diklik
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const email = button.getAttribute('data-email');
            const peran = button.getAttribute('data-peran');
            const alamat = button.getAttribute('data-alamat');
            const gaji = button.getAttribute('data-gaji');
            const nohp = button.getAttribute('data-nohp');

            // Set Form action URL secara dinamis ke route edit Laravel
            document.getElementById('editForm').action = `/penggunapemilik/edit/${peran}/${id}`;

            // Isi nilai input modal edit
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_peran_text').innerText = peran.toUpperCase();

            // Atur visibility input gaji vs no hp berdasarkan peran data terkait
            const gajiGroup = document.getElementById('edit_gaji_group');
            const nohpGroup = document.getElementById('edit_nohp_group');

            if (peran === 'Admin') {
                gajiGroup.style.display = 'block';
                document.getElementById('edit_gaji').value = gaji;
                document.getElementById('edit_gaji').required = true;

                nohpGroup.style.display = 'none';
                document.getElementById('edit_nohp').value = '';
                document.getElementById('edit_nohp').required = false;
            } else {
                gajiGroup.style.display = 'none';
                document.getElementById('edit_gaji').value = '';
                document.getElementById('edit_gaji').required = false;

                nohpGroup.style.display = 'block';
                document.getElementById('edit_nohp').value = nohp;
                document.getElementById('edit_nohp').required = true;
            }

            document.getElementById('editModal').classList.add('show');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('show');
        }

        // Menutup modal otomatis jika klik area background luar modal
        window.onclick = function(event) {
            const addModal = document.getElementById('addModal');
            const editModal = document.getElementById('editModal');
            if (event.target == addModal) {
                addModal.classList.remove('show');
            }
            if (event.target == editModal) {
                editModal.classList.remove('show');
            }
        }
    </script>
</body>

</html>