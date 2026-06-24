<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>BosLaptop - High Performance Computing</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/Landingpages.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- TopNavBar -->
    <nav class="navbar navbar-expand-lg fixed-top glass-nav py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img alt="BosLaptop Logo"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvod8TcI9eFOx2BZc1dJi_P0DIIBZo-MSA_37gx78gQahfeqB4NjG-IB6zgo70HAtsZq6iUfIyjdc_aBS27BOXEF57mU3kkbqyvKIlDCunnC0xCOmsZmJ7uf9kH0UbevbzbKj1Zm_LuNspGJ4V0OMAc3OLZ8DWp2_38sWxdPyaq2lFK1jKu6fOPjvHNGszJamBNK_6W4yzlKAX5bqS357YfUgtVdMrh4MEp9rTHZ1obnsPPl-YRqyQ2huYp-SaHqzqf5DZ_se0YA" />
            </a>
            <button class="navbar-toggler border-0" data-bs-target="#mainNav" data-bs-toggle="collapse" type="button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 gap-2">
                    <li class="nav-item"><a class="nav-link active" href="#">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gaming</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Workstation</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <div class="search-container d-none d-lg-block">
                        <span class="material-symbols-outlined">search</span>
                        <input class="form-control search-input" placeholder="Cari laptop idaman..." type="text" />
                    </div>
                    <a href="/login">
                        <button class="btn-primary-bos">Masuk</button>
                    </a>
                    <a href="/daftar">
                        <button class="btn-primary-bos">Daftar</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6">
                        <span class="badge-standard">Industrial Laboratory Standard</span>
                        <h1 class="hero-title">Performa Tanpa Kompromi untuk <span>Masa Depan.</span></h1>
                        <p class="hero-desc">Temukan kurasi laptop high-performance terbaik untuk gaming, kreativitas,
                            dan profesionalitas. Presisi dalam setiap komponen.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn-primary-bos py-3 px-4 d-flex align-items-center gap-2">
                                Mulai Belanja
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                            <button class="btn-outline-bos py-3 px-4">Lihat Katalog 2024</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image-container">
                            <img alt="Laptop Hero" class="hero-img"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoUtj5V-PMnAsbVNj3xP0RK0WndI_oqzWiew2yiNLW2dGEpGzyOB8_kj8Kft_QhfBAB9KeBxNqgZBTUBhhZhnqCBQDg1RQMQt7KSWud20NT9AgpCytWcEzirsPl01JaApYpi0SUe8YsGC8thzMiir4NrUTERIUAvRSg9h1O_dg-0hmueNhTJ3AuaRvU0unasNI2tH1QSXnIaCkdvcxiGoJTroQbLvJAb0le_Z6rX33fi1N_lOAXp2tlUBq5fPGgNoFa3TocV76ag" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Kenapa BosLaptop Section -->
        <section class="section-padding bg-white">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="font-headline mb-2">Kenapa BosLaptop?</h2>
                    <p class="text-variant">Standar pelayanan premium untuk kenyamanan komputasi Anda.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="bento-card text-center">
                            <div class="feature-icon icon-primary mx-auto">
                                <span class="material-symbols-outlined fs-2">verified_user</span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Garansi Resmi</h3>
                            <p class="text-variant small">Setiap unit dijamin 100% original dengan garansi resmi
                                produsen.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="bento-card text-center">
                            <div class="feature-icon icon-secondary mx-auto">
                                <span class="material-symbols-outlined fs-2">speed</span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Teknisi Ahli</h3>
                            <p class="text-variant small">Tim ahli kami siap membantu setup dan optimalisasi laptop
                                Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="bento-card text-center">
                            <div class="feature-icon icon-tertiary mx-auto">
                                <span class="material-symbols-outlined fs-2">payments</span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Cicilan 0%</h3>
                            <p class="text-variant small">Opsi pembayaran fleksibel tanpa biaya tambahan untuk
                                produktivitas Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="bento-card text-center">
                            <div class="feature-icon icon-primary mx-auto">
                                <span class="material-symbols-outlined fs-2">local_shipping</span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Pengiriman Aman</h3>
                            <p class="text-variant small">Packing kayu standar industri dan asuransi penuh setiap
                                pengiriman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Laptop Unggulan Section -->
        <section class="section-padding">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-4">
                    <div>
                        <h2 class="font-headline mb-2">Laptop Unggulan</h2>
                        <p class="text-variant">Koleksi terbaik untuk standar performa tertinggi.</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm px-3 rounded-pill"
                            style="background: var(--surface-variant); color: var(--primary-color); background: #e2e7ff; font-weight: 600;">Semua</button>
                        <button class="btn btn-sm px-3 rounded-pill text-variant fw-semibold">Gaming</button>
                        <button class="btn btn-sm px-3 rounded-pill text-variant fw-semibold">Business</button>
                    </div>
                </div>
                <div class="row g-4">
                    <!-- Product 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img alt="ProStream X15"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqM2CP292iys_gAv_cwCYGEPupYhrnDcI3YSRvyNm0_lRTLPflVt2xz4ROrvk7Y4PckVPpd2TWMXwP5-x68YEQi8jvOonlAcqdMQZyFnwEOQ-T_-necUaUfiiNDleG3KfPygolltX1etGUXP0EBuPwKNff9HoDtaK-ZZTd-6QV-gDi5R47sD72j4NxGvaC2tp3WwX9PfYbG_eVhFDKwykr1jx2HtU3pAg-XFb7fgGqLBkkW5wpPH6HxBlykkZ3FlHfnbpHXecFtQ" />
                                <span class="product-badge badge-new">Baru</span>
                            </div>
                            <div class="product-content">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0">ProStream X15</h3>
                                    <span class="product-price">Rp 24.999.000</span>
                                </div>
                                <p class="text-variant small mb-4">RTX 4070 | Core i9 | 32GB RAM</p>
                                <button class="btn-cart">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img alt="Nitro Titan G1"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBBD9pywmMGMkVpZ9vENqQhroSvMfRa5OhKJbks0V8EJWkpEXwo3cc6YG9_4-7G4-jlDHWV8r3mIBOJNcX_3f0EA8r35irmMFSo-7zQ0MqeSDOsRgFHRFqlQLmK3LmRgQpIzt2jNw1AfDRwRF5l1hptnZaoXpgEbUu-Qne-qcxQrkavhhyLUE2QMhVbItnf4ska_Hw8Ydoqxn7Ga8S69twNudDUG8JTL-zatsjFpOI0nMMLdp1Y7kPuEIeZ2ux818w3YcwFKyG8g" />
                            </div>
                            <div class="product-content">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0">Nitro Titan G1</h3>
                                    <span class="product-price">Rp 19.500.000</span>
                                </div>
                                <p class="text-variant small mb-4">RTX 4060 | Ryzen 9 | 16GB RAM</p>
                                <button class="btn-cart">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Product 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img alt="ZenBook Air 13"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3r6yaQh2RxuXa5PTDsvzH7vXwFVnDPhaB4di12-_CndPbqW9z25v3RDtP3REDKZk3DWqpU7xkxM0ouKaMEIa5ioupLn_KcUT_uXztlpxWAmI78RWTRBlrp7t8yS3Lf7A9zS3L5y9rasIYn8BiiUu3b915wT-Mqvjww-l3r7o16XEdU4RybJzVvZ5Q8qwauvxTZO8yc_bw9-54NpTedZS8LXT1Jd7z33TCg6RRRWUnuEn_RiKqkeID-dMTHUdy8b1tD3j6FuGhOw" />
                                <span class="product-badge badge-hot">Terlaris</span>
                            </div>
                            <div class="product-content">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0">ZenBook Air 13</h3>
                                    <span class="product-price">Rp 15.299.000</span>
                                </div>
                                <p class="text-variant small mb-4">Intel Evo | 1TB SSD | OLED Display</p>
                                <button class="btn-cart">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <section class="section-padding" style="background-color: #f2f3ff;">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="font-headline mb-2">Kata Pelanggan Kami</h2>
                    <p class="text-variant">Kepuasan Anda adalah prioritas utama dalam ekosistem layanan kami.</p>
                </div>
                <div class="row g-4">
                    <!-- Testimonial 1 -->
                    <div class="col-lg-4">
                        <div class="bento-card testimonial-card">
                            <span class="material-symbols-outlined quote-icon">format_quote</span>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-placeholder">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-0">Andi Pratama</h4>
                                    <span class="small text-variant">Video Editor</span>
                                </div>
                            </div>
                            <p class="mb-0 fst-italic">"Pelayanan luar biasa. Laptop datang dalam kondisi sempurna dan
                                performanya melebihi ekspektasi untuk editing 4K."</p>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="col-lg-4">
                        <div class="bento-card testimonial-card">
                            <span class="material-symbols-outlined quote-icon">format_quote</span>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-placeholder">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-0">Siska Wijaya</h4>
                                    <span class="small text-variant">Software Developer</span>
                                </div>
                            </div>
                            <p class="mb-0 fst-italic">"Tim teknis BosLaptop sangat membantu saat saya konsultasi
                                spesifikasi untuk kebutuhan development. Sangat profesional!"</p>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="col-lg-4">
                        <div class="bento-card testimonial-card">
                            <span class="material-symbols-outlined quote-icon">format_quote</span>
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-placeholder">
                                    <span class="material-symbols-outlined">person</span>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-0">Budi Santoso</h4>
                                    <span class="small text-variant">Casual Gamer</span>
                                </div>
                            </div>
                            <p class="mb-0 fst-italic">"Harga bersaing dan packing kayu-nya aman banget. Gak perlu
                                khawatir belanja barang mahal di sini."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter CTA -->
        <section class="section-padding bg-white">
            <div class="container">
                <div class="newsletter-box">
                    <h2 class="display-6 fw-bold mb-3">Dapatkan Penawaran Eksklusif</h2>
                    <p class="mb-5 mx-auto opacity-75" style="max-width: 600px;">Jadilah yang pertama mengetahui rilis
                        produk terbaru dan dapatkan promo khusus member BosLaptop.</p>
                    <form class="row g-3 justify-content-center" onsubmit="event.preventDefault()">
                        <div class="col-md-5">
                            <input class="form-control newsletter-input" placeholder="Alamat Email Anda"
                                type="email" />
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-primary-bos py-3 px-5">Langganan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <img alt="BosLaptop Logo" class="mb-4"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvod8TcI9eFOx2BZc1dJi_P0DIIBZo-MSA_37gx78gQahfeqB4NjG-IB6zgo70HAtsZq6iUfIyjdc_aBS27BOXEF57mU3kkbqyvKIlDCunnC0xCOmsZmJ7uf9kH0UbevbzbKj1Zm_LuNspGJ4V0OMAc3OLZ8DWp2_38sWxdPyaq2lFK1jKu6fOPjvHNGszJamBNK_6W4yzlKAX5bqS357YfUgtVdMrh4MEp9rTHZ1obnsPPl-YRqyQ2huYp-SaHqzqf5DZ_se0YA"
                        style="height: 40px;" />
                    <p class="text-variant pe-lg-5">Pusat laptop high-performance dengan standar industri. Menghadirkan
                        teknologi terdepan untuk setiap kebutuhan Anda.</p>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h5 class="fw-bold mb-4">Navigasi</h5>
                    <a class="footer-link" href="#">Tentang Kami</a>
                    <a class="footer-link" href="#">Lokasi Toko</a>
                    <a class="footer-link" href="#">Katalog</a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h5 class="fw-bold mb-4">Support</h5>
                    <a class="footer-link" href="#">Support Center</a>
                    <a class="footer-link" href="#">Kebijakan Privasi</a>
                    <a class="footer-link" href="#">Syarat &amp; Ketentuan</a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="fw-bold mb-4">Hubungi Kami</h5>
                    <div class="d-flex align-items-center gap-3 mb-3 text-variant">
                        <span class="material-symbols-outlined text-primary">mail</span>
                        info@boslaptop.id
                    </div>
                    <div class="d-flex align-items-center gap-3 text-variant">
                        <span class="material-symbols-outlined text-primary">call</span>
                        +62 21 500 123
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">© 2026 BosLaptop High-Performance Computer. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bundle.min.js"></script>
    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Simple Fade-in animation on scroll
        const observerOptions = {
            threshold: 0.1
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.bento-card, .product-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    </script>
</body>

</html>
