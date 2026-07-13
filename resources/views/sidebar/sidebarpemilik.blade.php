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

    {{-- Bagian Footer / Logout Toggle Pemilik --}}
    <div class="sidebar-bottom">
        <div class="sidebar-profile" id="profileToggle">
            @php
                $namaUser = session('user_name', 'Pemilik User');
                $roleUser = ucfirst(session('user_role', 'Pemilik'));
            @endphp

            <img src="https://ui-avatars.com/api/?name={{ urlencode($namaUser) }}&background=random" alt="Profile">

            <div class="user-info">
                <h4>{{ $namaUser }}</h4>
                <p>{{ $roleUser }}</p>
            </div>
        </div>

        <div class="profile-dropdown" id="logoutMenu" style="display: none;">
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Keluar / Logout
                </button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profileToggle = document.getElementById('profileToggle');
            const logoutMenu = document.getElementById('logoutMenu');

            // Buka/Tutup menu saat profil diklik
            profileToggle.addEventListener('click', function(e) {
                // Mencegah error jika yang diklik adalah tombol submit form itu sendiri
                if (e.target.closest('button')) return;

                if (logoutMenu.style.display === 'none' || logoutMenu.style.display === '') {
                    logoutMenu.style.display = 'block';
                } else {
                    logoutMenu.style.display = 'none';
                }
            });

            // Tutup menu otomatis jika user klik di sembarang tempat di luar sidebar-footer
            document.addEventListener('click', function(e) {
                if (!profileToggle.contains(e.target)) {
                    logoutMenu.style.display = 'none';
                }
            });
        });
    </script>
</div>
