<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Masuk | BOSLAPTOP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Icons -->
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/Login.css') }}" rel="stylesheet" />
</head>

<body>
    <main class="container d-flex flex-column align-items-center">
        <!-- Login Card -->
        <div class="glass-panel" id="loginCard">
            <!-- Logo Section -->
            <div class="logo-container">
                <img alt="BOSLAPTOP Logo" class="logo-img"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBJCD-XhiY9-pG8GlNrkYxcRAG4QU-NoJx-Iezbyfvd3vW403ajS1vFb4iIIYgeWUeZgNqn0NcPh9M6M7_XZUnWUZB6k2gpN7bSB_zOZU9ZGvZUtZzuL6OLjqm-ZnlKU1wm9-EfMfgDiyMArCi6mHijIq_saBkRtliWDc_UlSrWVkoJNnSOotTPEGu41Lb_JUJAAOGMM8J1s6FATSn83COukSbh_fIcQESJK7p-oIuVLfw8Xuu7UJLvkfouLXqq7OgB66lO4IWjQ">
            </div>
            <!-- Header -->
            <div class="text-center">
                <h1 class="">Selamat Datang</h1>
                <p class="sub-header">Silakan masuk ke akun BOSLAPTOP Anda</p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger" style="width: 100%; border-radius: 8px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf <div class="mb-4">
                    <label class="form-label" for="email">
                        <span class="material-symbols-outlined" style="font-size: 18px;">alternate_email</span>
                        Email Address
                    </label>
                    <input class="form-control" id="email" name="email" placeholder="nama@email.com" required
                        type="email" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0" for="password">
                            <span class="material-symbols-outlined" style="font-size: 18px;">lock</span>
                            Password
                        </label>
                        <a class="forgot-link" href="#">Lupa Password?</a>
                    </div>
                    <div class="position-relative">
                        <input class="form-control pe-5" id="password" name="password" placeholder="••••••••" required
                            type="password">
                        <button class="input-group-text-btn" type="button">
                            <span class="material-symbols-outlined" style="font-size: 20px;">visibility_off</span>
                        </button>
                    </div>
                </div>

                <button class="btn btn-primary-custom w-100" type="submit">
                    Masuk
                </button>
            </form>
            <!-- Social Login / Divider -->
            <div class="divider-container">
                <div class="divider-line"></div>
                <span class="divider-text">ATAU</span>
                <div class="divider-line"></div>
            </div>
            <!-- Footer Links -->
            <p class="footer-cta mb-0">
                Belum punya akun?
                <a href="#" class="">Daftar</a>
            </p>
        </div>
        <!-- System Status Bar -->

    </main>
    <!-- Footer Credit -->
    <footer class="site-credit">
        <p class="">© 2024 BosLaptop Jogja. Premium High-Performance Computing.</p>
    </footer>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>





</body>

</html>
