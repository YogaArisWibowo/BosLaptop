<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BosLaptop - Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pelanggan/produkpelanggan.css') }}">
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

        <div class="filter-section">
            <strong>Filter Merk:</strong>
            <select class="filter-select" id="merkFilter">
                <option value="semua">Semua Merk</option>
                <option value="asus">ASUS</option>
                <option value="lenovo">Lenovo</option>
                <option value="hp">HP</option>
                <option value="acer">Acer</option>
                <option value="msi">MSI</option>
                <option value="apple">Apple</option>
            </select>
        </div>

        <div class="product-grid">

            {{-- Looping data dari database --}}
            @foreach ($products as $item)
                <div class="product-card" data-merk="{{ strtolower(trim($item->merk)) }}">
                    {{-- Modifikasi wrapper gambar agar menampilkan file foto dari DB --}}
                    <div class="product-img-wrapper" style="background-color: transparent; border:none;">
                        {{-- Asumsi gambar disimpan di storage/app/public/produk_images --}}
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                            style="width: 100%; height: 100%; object-fit: contain;">
                    </div>

                    {{-- Memanggil kolom 'nama' dan 'merk' --}}
                    <div class="product-title">{{ $item->merk }} {{ $item->nama }}</div>

                    {{-- Memanggil kolom 'spesifikasi' dan dibatasi 40 karakter agar rapi --}}
                    <div class="product-desc">{{ \Illuminate\Support\Str::limit($item->spesifikasi, 40) }}</div>

                    {{-- Memanggil kolom 'harga' dengan format Rupiah --}}
                    <div class="product-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

                    <form action="{{ route('keranjang.tambah') }}" method="POST" style="margin-top: 15px;">
                        @csrf
                        <!-- Kirim ID Produk secara rahasia -->
                        <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">

                        <button type="submit" class="btn-add-cart">
                            <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>
    {{-- SCRIPT UNTUK FILTER KATEGORI --}}
    <script>
        document.getElementById('merkFilter').addEventListener('change', function() {
            // Ambil nilai filter, ubah ke huruf kecil, dan hapus spasi berlebih
            let filterValue = this.value.toLowerCase().trim();

            let products = document.querySelectorAll('.product-card');

            products.forEach(function(card) {
                // Ambil data-merk dari HTML, ubah ke huruf kecil, dan hapus spasi
                let merkProduk = (card.getAttribute('data-merk') || '').toLowerCase().trim();

                if (filterValue === 'semua') {
                    card.style.display = 'block';
                } else if (merkProduk === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

    {{-- TAMBAHKAN KODE INI UNTUK MENAMPILKAN ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Menangkap pesan sukses dari Controller
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: 'top-end' // Muncul di pojok kanan atas
            });
        @endif

        // (Opsional) Menangkap pesan error jika ada
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                showConfirmButton: true,
            });
        @endif
    </script>

</body>

</html>
