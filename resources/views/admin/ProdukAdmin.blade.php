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
                <button class="hamburger-btn" id="sidebarToggle"><i class="fas fa-bars"></i></button>
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
                @if($errors->any())
                <div style="background: #f87171; color: white; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                    <strong style="display: block; margin-bottom: 5px;">Waduh, Data Gagal Disimpan:</strong>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div style="background: #10b981; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
                @endif

                <div class="page-header">
                    <div>
                        <h1>Manajemen Produk</h1>
                        <p>Kelola Produk Laptop Anda</p>
                    </div>
                    <button class="btn-add" id="addProductBtn">
                        <i class="fas fa-plus"></i> Tambah Produk Baru
                    </button>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>NAMA</th>
                                <th>MERK</th>
                                <th>HARGA</th>
                                <th>SPEK</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produk as $item)
                            <tr>
                                <td>
                                    <div class="product-info">
                                        @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Laptop" style="width: 48px; height: 48px; object-fit: cover; border-radius: 4px;">
                                        @else
                                        <img src="https://via.placeholder.com/48" alt="Laptop" style="border-radius: 4px;">
                                        @endif
                                        <div class="product-details">
                                            <h4>{{ $item->nama }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-workstation">{{ strtoupper($item->merk) }}</span></td>
                                <td><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></td>
                                <td>{{ Str::limit($item->speksifikasi, 30) }}</td>
                                <td class="action-btns" style="display: flex; gap: 5px;">

                                    <button type="button" class="btn-edit"
                                        data-id="{{ $item->id_produk }}"
                                        data-nama="{{ $item->nama }}"
                                        data-merk="{{ $item->merk }}"
                                        data-harga="{{ $item->harga }}"
                                        data-speksifikasi="{{ $item->speksifikasi }}"
                                        onclick="openEditModal(this)">
                                        <i class="fas fa-pen"></i>
                                    </button>

                                    <form action="{{ route('produk.hapus.admin', $item->id_produk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: red;"><i class="fas fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Belum ada produk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div class="modal" id="addProductModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Produk Baru</h2>
                <button class="modal-close" onclick="closeModal('addProductModal')"><i class="fas fa-times"></i></button>
            </div>
            <form action="{{ route('produk.tambah.admin') }}" method="POST" enctype="multipart/form-data" class="modal-form">
                @csrf
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" name="gambar" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" placeholder="Masukkan nama produk" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" name="merk" placeholder="Contoh: Asus, Lenovo" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" placeholder="Masukkan harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Spesifikasi (Deskripsi)</label>
                    <textarea name="speksifikasi" placeholder="Masukkan spesifikasi produk" rows="4" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('addProductModal')">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="editProductModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Produk</h2>
                <button class="modal-close" onclick="closeModal('editProductModal')"><i class="fas fa-times"></i></button>
            </div>
            <form id="formEditProduk" method="POST" enctype="multipart/form-data" class="modal-form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Ganti Gambar Produk <span style="color: #6b7280; font-size: 12px;">(Kosongkan jika tidak ingin diubah)</span></label>
                    <input type="file" name="gambar" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" id="edit_nama" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" name="merk" id="edit_merk" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="edit_harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Spesifikasi (Deskripsi)</label>
                    <textarea name="speksifikasi" id="edit_speksifikasi" rows="4" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('editProductModal')">Batal</button>
                    <button type="submit" class="btn-submit">Update Produk</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Control Helper
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Buka Modal Tambah
        document.getElementById('addProductBtn').addEventListener('click', function() {
            document.getElementById('addProductModal').classList.add('active');
        });

        // Buka Modal Edit & Isi Data secara Dinamis
        function openEditModal(button) {
            let id = button.getAttribute('data-id');
            let nama = button.getAttribute('data-nama');
            let merk = button.getAttribute('data-merk');
            let harga = button.getAttribute('data-harga');
            let spek = button.getAttribute('data-speksifikasi');

            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_merk').value = merk;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_speksifikasi').value = spek;

            // URL disesuaikan dengan route utama baru kamu yaitu /produkpemilik
            document.getElementById('formEditProduk').action = `/produkadmin/edit/${id}`;

            document.getElementById('editProductModal').classList.add('active');
        }
    </script>
</body>

</html>