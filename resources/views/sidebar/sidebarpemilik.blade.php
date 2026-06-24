<div class="sidebar">
    <div>
        <div class="sidebar-header">
            <h2>BosLaptop</h2>
            <span>PEMILIK CONTROL</span>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('produkpemilik') ? 'active' : '' }}">
                <a href="{{ url('/produkpemilik') }}"><i class="fas fa-box"></i> Produk</a>
            </li>
            
            <li class="{{ request()->is('pesananpemilik') ? 'active' : '' }}">
                <a href="{{ url('/pesananpemilik') }}"><i class="fas fa-shopping-cart"></i> Pesanan</a>
            </li>
            
            <li class="{{ request()->is('laporankeuanganpemilik') ? 'active' : '' }}">
                <a href="{{ url('/laporankeuanganpemilik') }}"><i class="fas fa-wallet"></i> Laporan Keuangan</a>
            </li>
            
            <li class="{{ request()->is('penggunapemilik') ? 'active' : '' }}">
                <a href="{{ url('/penggunapemilik') }}"><i class="fas fa-users"></i> Pengguna</a>
            </li>
            
            <li class="{{ request()->is('pengaturantokopemilik') ? 'active' : '' }}">
                <a href="{{ url('/pengaturantokopemilik') }}"><i class="fas fa-cog"></i> Pengaturan Toko</a>
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