<div class="sidebar">
    {{-- Wrapper atas agar footer bisa terdorong ke bawah (jika pakai flexbox) --}}
    <div>
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

    {{-- Bagian Footer / Logout Toggle --}}
    <div class="sidebar-bottom">
        <div class="sidebar-profile" id="profileToggle">
            @php
                // Mengambil nama, role, dan foto dari session LoginController
                $namaUser = session('user_name', 'Pelanggan');
                $roleUser = ucfirst(session('user_role', 'Pelanggan'));
                $fotoProfil = session('foto_profil');
            @endphp

            {{-- Ganti pemanggilan $pelanggan dengan variabel session --}}
            <img src="{{ $fotoProfil ? asset('storage/' . $fotoProfil) : 'https://ui-avatars.com/api/?name=' . urlencode($namaUser) . '&background=random' }}"
                alt="Profile">

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

    {{-- Script untuk Toggle Logout --}}
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
