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
                <div class="profile-info">
                    <span>Pelanggan</span>
                    <img src="https://ui-avatars.com/api/?name=Pelanggan&background=random" alt="Profile">
                </div>
            </div>
        </div>

        <div class="filter-section">
            <strong>Filter Kategori:</strong>
            <select class="filter-select">
                <option>Semua Kategori</option>
                <option>Laptop</option>
                <option>Aksesoris</option>
            </select>
        </div>

        <div class="product-grid">
            @php
                $products = [
                    ['title' => 'BosPro 16 Titanium', 'desc' => 'M2 Ultra, 64GB RAM, 1TB SSD', 'price' => 'Rp 42.500.000', 'badge' => 'Baru', 'badge_class' => 'badge-baru', 'icon' => 'fa-laptop'],
                    ['title' => 'BosGaming X-100', 'desc' => 'RTX 4080, i9-13th Gen', 'price' => 'Rp 28.900.000', 'badge' => 'Terlaris', 'badge_class' => 'badge-terlaris', 'icon' => 'fa-gamepad'],
                    ['title' => 'BosAir Ultrathin', 'desc' => 'Featherweight 1.1kg, 18h Battery', 'price' => 'Rp 19.200.000', 'badge' => '', 'badge_class' => '', 'icon' => 'fa-sun'],
                    ['title' => 'BosPro Mouse V2', 'desc' => 'Wireless Ergonomic, 26k DPI', 'price' => 'Rp 850.000', 'badge' => '', 'badge_class' => '', 'icon' => 'fa-mouse'],
                ];
            @endphp

            @for($i = 0; $i < 2; $i++)
                @foreach($products as $item)
                <div class="product-card">
                    <div class="product-img-wrapper">
                        @if($item['badge'] != '')
                            <span class="badge-status {{ $item['badge_class'] }}">{{ $item['badge'] }}</span>
                        @endif
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <div class="product-title">{{ $item['title'] }}</div>
                    <div class="product-desc">{{ $item['desc'] }}</div>
                    <div class="product-price">{{ $item['price'] }}</div>
                    <button class="btn-add-cart">
                        <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                    </button>
                </div>
                @endforeach
            @endfor
            
        </div>
    </div>

</body>
</html>