<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Daftar | BOSLAPTOP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700;800&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/Daftar.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Background Atmospheric Effect -->
    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>
    <main class="container py-5 d-flex justify-content-center">
        <div class="glass-panel glow-border animate-fade-in">
            <!-- Logo -->
            <div class="logo-container">
                <img alt="BOSLAPTOP Logo" class="logo-img"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHg2qJlQSasB8SXFpa2NMcyFiGA9TGl0dlQmV29eU2iCpT_KFIJItsmMwnBOnjMqWCa-8pXA-6qpLEHHRladOD5bwx9gDDT4iEe23SDJRmYovODYVN28Uk-uTQ-vkQ3TJxaDNTKwzF3w0OJN45NCTM4TLevZpJKzxXTWzQ8TPVZm5_cLrZ1vMCynWhl1RrgsHNoNrXlgTTm89SUebW-RIyltRFtJ-DLK17NLObhnaWkOT6PlsWyH1OdX3NbUO_DFuwmrLwHlw9dQ" />
            </div>
            <!-- Header -->
            <div class="text-center">
                <h1>Buat Akun Baru</h1>
                <p class="subtitle">Mulai perjalanan teknologi Anda sekarang.</p>
            </div>
            <!-- Form -->
            <form action="#" onsubmit="event.preventDefault();">
                <div class="mb-3">
                    <label class="form-label-custom" for="full_name">
                        <span class="material-symbols-outlined">person</span> Full Name
                    </label>
                    <input class="form-control form-control-custom" id="full_name" placeholder="Nama Lengkap Anda"
                        required="" type="text" />
                </div>
                <div class="mb-3">
                    <label class="form-label-custom" for="email">
                        <span class="material-symbols-outlined">alternate_email</span> Email Address
                    </label>
                    <input class="form-control form-control-custom" id="email" placeholder="nama@email.com"
                        required="" type="email" />
                </div>
                <div class="mb-3">
                    <label class="form-label-custom" for="phone">
                        <span class="material-symbols-outlined">smartphone</span> Phone Number
                    </label>
                    <input class="form-control form-control-custom" id="phone" placeholder="0812xxxxxxx"
                        required="" type="tel" />
                </div>
                <div class="mb-3">
                    <label class="form-label-custom" for="password">
                        <span class="material-symbols-outlined">lock</span> Password
                    </label>
                    <input class="form-control form-control-custom" id="password" placeholder="••••••••" required=""
                        type="password" />
                </div>
                <div class="mb-4">
                    <label class="form-label-custom" for="confirm_password">
                        <span class="material-symbols-outlined">verified_user</span> Confirm Password
                    </label>
                    <input class="form-control form-control-custom" id="confirm_password" placeholder="••••••••"
                        required="" type="password" />
                </div>

                <!-- Address Fields -->
                <div class="mb-3">
                    <label class="form-label-custom" for="address">
                        <span class="material-symbols-outlined">home</span> Alamat Lengkap
                    </label>
                    <textarea class="form-control form-control-custom form-control-textarea" id="address" placeholder="Jalan, RT/RW, Kelurahan" required></textarea>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom" for="city">Kota / Kabupaten</label>
                        <input class="form-control form-control-custom" id="city" placeholder="Yogyakarta" required type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-custom" for="province">Provinsi</label>
                        <input class="form-control form-control-custom" id="province" placeholder="DI Yogyakarta" required type="text" />
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label class="form-label-custom" for="postal_code">Kode Pos</label>
                        <input class="form-control form-control-custom" id="postal_code" placeholder="55281" required type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label-custom" for="country">Negara</label>
                        <input class="form-control form-control-custom" id="country" placeholder="Indonesia" required type="text" />
                    </div>
                </div>
                <a href="#"></a><button class="btn btn-register" type="submit">Daftar</button></a>
            </form>
            <!-- Divider -->
            <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">ATAU</span>
                <div class="divider-line"></div>
            </div>
            <!-- Footer Link -->
            <div class="footer-link">
                Sudah punya akun? <a href="#">Masuk</a>
            </div>
        </div>
    </main>
    <footer class="copyright-footer">
        <p class="copyright-text">© 2024 BosLaptop Jogja. Premium High-Performance Computing.</p>
    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
