<div class="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('img/logo.png') }}" alt="BosLaptop Logo" class="sidebar-logo">
    </div>
    <ul class="sidebar-menu">
        <li class="{{ request()->is('produkpelanggan') ? 'active' : '' }}">
            <a href="{{ url('/produkpelanggan') }}">
                <i class="fas fa-desktop"></i> Produk
            </a>
        </li>

        <li class="{{ request()->is('keranjangpelanggan') ? 'active' : '' }}">
            <a href="{{ url('/keranjangpelanggan') }}">
                <i class="fas fa-shopping-cart"></i> Keranjang
            </a>
        </li>

        <li class="{{ request()->is('profilpengguna') ? 'active' : '' }}">
            <a href="{{ url('/profilpengguna') }}">
                <i class="far fa-user-circle"></i> Profil Pengguna
            </a>
        </li>

        <li class="{{ request()->is('riwayattransaksi') ? 'active' : '' }}">
            <a href="{{ url('/riwayattransaksi') }}">
                <i class="fas fa-history"></i> Riwayat Transaksi
            </a>
        </li>
    </ul>
</div>
