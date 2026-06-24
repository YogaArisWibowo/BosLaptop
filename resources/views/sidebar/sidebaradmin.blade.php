<div class="sidebar">
    <div>
        <div class="sidebar-header">
            <h2>BosLaptop</h2>
            <span>ADMIN CONTROL</span>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('produkadmin') ? 'active' : '' }}">
                <a href="{{ url('/produkadmin') }}"><i class="fas fa-box"></i> Produk</a>
            </li>
            
            <li class="{{ request()->is('pesananadmin') ? 'active' : '' }}">
                <a href="{{ url('/pesananadmin') }}"><i class="fas fa-shopping-cart"></i> Pesanan</a>
            </li>
            
            <li class="{{ request()->is('laporankeuanganadmin') ? 'active' : '' }}">
                <a href="{{ url('/laporankeuanganadmin') }}"><i class="fas fa-wallet"></i> Laporan Keuangan</a>
            </li>
        
        </ul>
    </div>
    
    <div class="sidebar-footer">
        <img src="https://ui-avatars.com/api/?name=Pemilik+User&background=random" alt="Profile">
        <div class="user-info">
            <h4>Pemilik User</h4>
            <p>Super Admin</p>
        </div>
    </div>
</div>