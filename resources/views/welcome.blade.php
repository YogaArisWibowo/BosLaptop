<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&amp;display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "error-container": "#ffdad6",
                        "surface-variant": "#dae2fd",
                        "surface-bright": "#faf8ff",
                        "on-secondary": "#ffffff",
                        "outline": "#936e6d",
                        "tertiary-fixed-dim": "#75d1ff",
                        "tertiary": "#006384",
                        "secondary-fixed-dim": "#d4bbff",
                        "secondary-fixed": "#ebdcff",
                        "on-primary": "#ffffff",
                        "inverse-on-surface": "#eef0ff",
                        "surface-dim": "#d2d9f4",
                        "inverse-surface": "#283044",
                        "inverse-primary": "#ffb3b2",
                        "on-surface": "#131b2e",
                        "on-secondary-fixed": "#270058",
                        "error": "#ba1a1a",
                        "secondary-container": "#731be5",
                        "primary-container": "#e90038",
                        "surface-container-high": "#e2e7ff",
                        "background": "#faf8ff",
                        "surface-container-low": "#f2f3ff",
                        "surface": "#faf8ff",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#fffbff",
                        "on-primary-fixed-variant": "#92001f",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed-variant": "#004d67",
                        "surface-container": "#eaedff",
                        "on-secondary-container": "#fdf6ff",
                        "surface-tint": "#bf002c",
                        "outline-variant": "#e8bcbb",
                        "tertiary-fixed": "#c2e8ff",
                        "tertiary-container": "#007ea6",
                        "on-surface-variant": "#5e3f3e",
                        "on-secondary-fixed-variant": "#5d00c2",
                        "surface-container-highest": "#dae2fd",
                        "secondary": "#731be5",
                        "on-primary-fixed": "#410008",
                        "on-tertiary-fixed": "#001e2b",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#ffdad9",
                        "primary": "#ba002b",
                        "on-error": "#ffffff",
                        "on-tertiary-container": "#fbfcff",
                        "primary-fixed-dim": "#ffb3b2",
                        "on-background": "#131b2e"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "unit": "4px",
                        "margin-desktop": "40px",
                        "gutter": "24px",
                        "container-max": "1280px",
                        "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "body-md": ["Sora"],
                        "display": ["Sora"],
                        "label-md": ["Sora"],
                        "body-lg": ["Sora"],
                        "label-sm": ["Sora"],
                        "headline-lg": ["Sora"],
                        "headline-lg-mobile": ["Sora"],
                        "headline-md": ["Sora"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "display": ["48px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1.4",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1.4",
                            "letterSpacing": "0.02em",
                            "fontWeight": "500"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["28px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #F8FAFC;
            color: #131B2E;
            font-family: 'Sora', sans-serif;
            overflow-x: hidden;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.3);
        }

        .cyber-glow-hover:hover {
            box-shadow: 0px 10px 30px rgba(186, 0, 43, 0.1);
        }

        .bento-card {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bento-card:hover {
            border-color: #731be5;
            transform: translateY(-4px);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 glass-nav shadow-sm">
        <div class="flex justify-between items-center max-w-container-max mx-auto px-margin-desktop h-20">
            <div class="flex items-center gap-8">
                <img alt="BosLaptop Logo" class="h-10 w-auto"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-UsgaF1mVsrZc3Lx8OtwuiQmKPYgX9hd2P9DNfZ8xzdIQaWNXP78gpenCMKSnnXaSKVOAXNip5WlLFnlU0UNACTct9wMe5U6wonLjQikAsCnSP7j9xqfvuzjJ79MtxUZ6r58o-eSaihQ6cmJsqijEWUy54usxol8b8rcLfDDfQtMXJet-TimwyRtVkiB0dMZrGzpcTyof8JYUoGGsrnWVAvEumPVnqj1aT2GdY4yK3l6UiqjkLvGzPMdBTIiaShe_r-sl9QM3IQ" />
                <div class="hidden md:flex gap-6">
                    <a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1"
                        href="#">Katalog</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
                        href="#">Promo</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
                        href="#">Gaming</a>
                    <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-200"
                        href="#">Workstation</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative hidden lg:block">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input
                        class="pl-10 pr-4 py-2 bg-surface-container-lowest border border-outline-variant/30 rounded-lg text-label-md focus:ring-2 focus:ring-secondary/10 focus:border-secondary outline-none w-64 transition-all"
                        placeholder="Cari laptop idaman..." type="text" />
                </div>
                <button
                    class="font-label-md text-label-md text-on-surface-variant px-4 py-2 hover:text-primary transition-all active:scale-95">Masuk</button>
                <button
                    class="font-label-md text-label-md bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary/90 transition-all shadow-md active:scale-95">Daftar</button>
            </div>
        </div>
    </nav>
    <main class="pt-20">
        <!-- Hero Section -->
        <section class="relative min-h-[80vh] flex items-center overflow-hidden bg-white">
            <div
                class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-16">
                <div class="z-10">
                    <span
                        class="inline-block px-4 py-1 bg-secondary/10 text-secondary font-label-sm text-label-sm rounded-full mb-6">Industrial
                        Laboratory Standard</span>
                    <h1 class="font-display text-display text-on-background mb-6">Performa Tanpa Kompromi untuk <span
                            class="text-primary">Masa Depan.</span></h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-lg">Temukan kurasi laptop
                        high-performance terbaik untuk gaming, kreativitas, dan profesionalitas. Presisi dalam setiap
                        komponen.</p>
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="bg-primary text-white px-8 py-4 rounded-xl font-label-md text-label-md flex items-center gap-2 hover:bg-primary-container transition-all shadow-lg shadow-primary/20 group">
                            Mulai Belanja
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                        <button
                            class="border-2 border-secondary text-secondary px-8 py-4 rounded-xl font-label-md text-label-md hover:bg-secondary/5 transition-all">
                            Lihat Katalog 2024
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -top-20 -right-20 w-96 h-96 bg-primary/5 rounded-full blur-[100px]"></div>
                    <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-secondary/5 rounded-full blur-[100px]"></div>
                    <img class="relative z-10 w-full h-auto object-contain rounded-2xl drop-shadow-2xl"
                        data-alt="A premium, sleek high-performance laptop displayed on a minimalist white glass desk in a bright, modern studio. The laptop's screen shows a vibrant, professional creative application. Soft architectural lighting creates subtle shadows and a clean, laboratory aesthetic. The background is a blurred high-end office space with minimalist decor and soft daylight."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoUtj5V-PMnAsbVNj3xP0RK0WndI_oqzWiew2yiNLW2dGEpGzyOB8_kj8Kft_QhfBAB9KeBxNqgZBTUBhhZhnqCBQDg1RQMQt7KSWud20NT9AgpCytWcEzirsPl01JaApYpi0SUe8YsGC8thzMiir4NrUTERIUAvRSg9h1O_dg-0hmueNhTJ3AuaRvU0unasNI2tH1QSXnIaCkdvcxiGoJTroQbLvJAb0le_Z6rX33fi1N_lOAXp2tlUBq5fPGgNoFa3TocV76ag" />
                </div>
            </div>
        </section>
        <!-- Kenapa BosLaptop Section -->
        <section class="py-24 bg-surface-container-lowest">
            <div class="max-w-container-max mx-auto px-margin-desktop">
                <div class="text-center mb-16">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Kenapa BosLaptop?</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Standar pelayanan premium untuk
                        kenyamanan komputasi Anda.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                    <!-- Feature 1 -->
                    <div class="bento-card p-8 rounded-2xl flex flex-col items-center text-center">
                        <div
                            class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-[32px]">verified_user</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-3">Garansi Resmi</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Setiap unit dijamin 100% original
                            dengan garansi resmi produsen.</p>
                    </div>
                    <!-- Feature 2 -->
                    <div class="bento-card p-8 rounded-2xl flex flex-col items-center text-center">
                        <div
                            class="w-16 h-16 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-[32px]">speed</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-3">Teknisi Ahli</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Tim ahli kami siap membantu setup
                            dan optimalisasi laptop Anda.</p>
                    </div>
                    <!-- Feature 3 -->
                    <div class="bento-card p-8 rounded-2xl flex flex-col items-center text-center">
                        <div
                            class="w-16 h-16 bg-tertiary/10 text-tertiary rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-[32px]">payments</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-3">Cicilan 0%</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Opsi pembayaran fleksibel tanpa
                            biaya tambahan untuk produktivitas Anda.</p>
                    </div>
                    <!-- Feature 4 -->
                    <div class="bento-card p-8 rounded-2xl flex flex-col items-center text-center">
                        <div
                            class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-[32px]">local_shipping</span>
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-3">Pengiriman Aman</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant">Packing kayu standar industri dan
                            asuransi penuh setiap pengiriman.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Laptop Unggulan Section -->
        <section class="py-24 bg-white">
            <div class="max-w-container-max mx-auto px-margin-desktop">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Laptop Unggulan</h2>
                        <p class="font-body-md text-body-md text-on-surface-variant">Koleksi terbaik untuk standar
                            performa tertinggi.</p>
                    </div>
                    <div class="flex gap-4">
                        <button
                            class="px-4 py-2 rounded-lg bg-surface-container-high text-primary font-label-md text-label-md">Semua</button>
                        <button
                            class="px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors font-label-md text-label-md">Gaming</button>
                        <button
                            class="px-4 py-2 rounded-lg text-on-surface-variant hover:bg-surface-container-high transition-colors font-label-md text-label-md">Business</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                    <!-- Product Card 1 -->
                    <div class="bento-card rounded-2xl overflow-hidden group">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A modern professional workstation laptop with a minimalist dark gray finish, placed on a crisp white surface. The image is captured with a shallow depth of field, highlighting the precision-engineered keyboard and ultra-thin bezels. The lighting is bright and clean, emphasizing a high-tech industrial aesthetic with subtle purple highlights in the reflections."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqM2CP292iys_gAv_cwCYGEPupYhrnDcI3YSRvyNm0_lRTLPflVt2xz4ROrvk7Y4PckVPpd2TWMXwP5-x68YEQi8jvOonlAcqdMQZyFnwEOQ-T_-necUaUfiiNDleG3KfPygolltX1etGUXP0EBuPwKNff9HoDtaK-ZZTd-6QV-gDi5R47sD72j4NxGvaC2tp3WwX9PfYbG_eVhFDKwykr1jx2HtU3pAg-XFb7fgGqLBkkW5wpPH6HxBlykkZ3FlHfnbpHXecFtQ" />
                            <span
                                class="absolute top-4 left-4 bg-primary text-white text-label-sm font-label-sm px-3 py-1 rounded-full">Baru</span>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-headline-md text-headline-md text-on-surface">ProStream X15</h3>
                                <span class="font-label-md text-label-md text-secondary">Rp 24.999.000</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-6">RTX 4070 | Core i9 | 32GB
                                RAM</p>
                            <button
                                class="w-full py-3 rounded-xl border-2 border-primary text-primary font-label-md text-label-md hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">shopping_cart</span>
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="bento-card rounded-2xl overflow-hidden group">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="A powerful gaming laptop featuring customizable RGB lighting underneath the keys, set against a pristine, clinical white background. The image is shot from a low angle to showcase the aggressive cooling vents and premium build quality. The aesthetic is clean and futuristic, blending high-end technology with a minimalist light-mode environment."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBBD9pywmMGMkVpZ9vENqQhroSvMfRa5OhKJbks0V8EJWkpEXwo3cc6YG9_4-7G4-jlDHWV8r3mIBOJNcX_3f0EA8r35irmMFSo-7zQ0MqeSDOsRgFHRFqlQLmK3LmRgQpIzt2jNw1AfDRwRF5l1hptnZaoXpgEbUu-Qne-qcxQrkavhhyLUE2QMhVbItnf4ska_Hw8Ydoqxn7Ga8S69twNudDUG8JTL-zatsjFpOI0nMMLdp1Y7kPuEIeZ2ux818w3YcwFKyG8g" />
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-headline-md text-headline-md text-on-surface">Nitro Titan G1</h3>
                                <span class="font-label-md text-label-md text-secondary">Rp 19.500.000</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-6">RTX 4060 | Ryzen 9 | 16GB
                                RAM</p>
                            <button
                                class="w-full py-3 rounded-xl border-2 border-primary text-primary font-label-md text-label-md hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">shopping_cart</span>
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                    <!-- Product Card 3 -->
                    <div class="bento-card rounded-2xl overflow-hidden group">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                data-alt="An ultra-slim ultrabook laptop with a silver aluminum chassis, shown partially open on a white marble surface. The lighting is soft and diffused, creating a serene, high-end lifestyle mood. The image focuses on the sleek profile and premium materials, aligning with a sophisticated and innovative brand identity for elite professionals."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3r6yaQh2RxuXa5PTDsvzH7vXwFVnDPhaB4di12-_CndPbqW9z25v3RDtP3REDKZk3DWqpU7xkxM0ouKaMEIa5ioupLn_KcUT_uXztlpxWAmI78RWTRBlrp7t8yS3Lf7A9zS3L5y9rasIYn8BiiUu3b915wT-Mqvjww-l3r7o16XEdU4RybJzVvZ5Q8qwauvxTZO8yc_bw9-54NpTedZS8LXT1Jd7z33TCg6RRRWUnuEn_RiKqkeID-dMTHUdy8b1tD3j6FuGhOw" />
                            <span
                                class="absolute top-4 left-4 bg-secondary text-white text-label-sm font-label-sm px-3 py-1 rounded-full">Terlaris</span>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-headline-md text-headline-md text-on-surface">ZenBook Air 13</h3>
                                <span class="font-label-md text-label-md text-secondary">Rp 15.299.000</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-6">Intel Evo | 1TB SSD |
                                OLED Display</p>
                            <button
                                class="w-full py-3 rounded-xl border-2 border-primary text-primary font-label-md text-label-md hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined">shopping_cart</span>
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Kata Pelanggan Kami Section -->
        <section class="py-24 bg-surface-container-low overflow-hidden">
            <div class="max-w-container-max mx-auto px-margin-desktop">
                <div class="text-center mb-16">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-4">Kata Pelanggan Kami</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Kepuasan Anda adalah prioritas utama
                        dalam ekosistem layanan kami.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                    <!-- Testimonial 1 -->
                    <div class="bento-card p-8 rounded-2xl relative">
                        <span
                            class="material-symbols-outlined text-primary/20 text-6xl absolute top-4 right-4">format_quote</span>
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-12 h-12 rounded-full bg-surface-container-highest border border-outline-variant/30 flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-surface-variant">person</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Andi Pratama</h4>
                                <p class="text-label-sm font-label-sm text-on-surface-variant">Video Editor</p>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface italic">"Pelayanan luar biasa. Laptop
                            datang dalam kondisi sempurna dan performanya melebihi ekspektasi untuk editing 4K."</p>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="bento-card p-8 rounded-2xl relative border-secondary/30">
                        <span
                            class="material-symbols-outlined text-primary/20 text-6xl absolute top-4 right-4">format_quote</span>
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-12 h-12 rounded-full bg-surface-container-highest border border-outline-variant/30 flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-surface-variant">person</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Siska Wijaya</h4>
                                <p class="text-label-sm font-label-sm text-on-surface-variant">Software Developer</p>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface italic">"Tim teknis BosLaptop sangat
                            membantu saat saya konsultasi spesifikasi untuk kebutuhan development. Sangat profesional!"
                        </p>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="bento-card p-8 rounded-2xl relative">
                        <span
                            class="material-symbols-outlined text-primary/20 text-6xl absolute top-4 right-4">format_quote</span>
                        <div class="flex items-center gap-4 mb-6">
                            <div
                                class="w-12 h-12 rounded-full bg-surface-container-highest border border-outline-variant/30 flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-surface-variant">person</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-on-surface">Budi Santoso</h4>
                                <p class="text-label-sm font-label-sm text-on-surface-variant">Casual Gamer</p>
                            </div>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface italic">"Harga bersaing dan packing
                            kayu-nya aman banget. Gak perlu khawatir belanja barang mahal di sini."</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter CTA -->
        <section class="py-24">
            <div class="max-w-container-max mx-auto px-margin-desktop">
                <div class="bg-inverse-surface rounded-[32px] p-12 lg:p-20 text-center relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2">
                    </div>
                    <div class="relative z-10">
                        <h2 class="font-display text-headline-lg text-white mb-6">Dapatkan Penawaran Eksklusif</h2>
                        <p class="font-body-lg text-body-lg text-inverse-on-surface/80 mb-10 max-w-2xl mx-auto">Jadilah
                            yang pertama mengetahui rilis produk terbaru dan dapatkan promo khusus member BosLaptop.</p>
                        <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto"
                            onsubmit="event.preventDefault()">
                            <input
                                class="flex-1 px-6 py-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder:text-white/50 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="Alamat Email Anda" type="email" />
                            <button
                                class="bg-primary text-white px-8 py-4 rounded-xl font-label-md text-label-md hover:bg-primary-container transition-all">Langganan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-surface-container-lowest py-12 border-t border-outline-variant/30">
        <div
            class="max-w-container-max mx-auto px-margin-desktop flex flex-col md:flex-row justify-between items-start gap-8">
            <div class="max-w-xs">
                <img alt="BosLaptop Logo" class="h-10 w-auto mb-6"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-UsgaF1mVsrZc3Lx8OtwuiQmKPYgX9hd2P9DNfZ8xzdIQaWNXP78gpenCMKSnnXaSKVOAXNip5WlLFnlU0UNACTct9wMe5U6wonLjQikAsCnSP7j9xqfvuzjJ79MtxUZ6r58o-eSaihQ6cmJsqijEWUy54usxol8b8rcLfDDfQtMXJet-TimwyRtVkiB0dMZrGzpcTyof8JYUoGGsrnWVAvEumPVnqj1aT2GdY4yK3l6UiqjkLvGzPMdBTIiaShe_r-sl9QM3IQ" />
                <p class="font-body-md text-body-md text-on-surface-variant">Pusat laptop high-performance dengan
                    standar industri. Menghadirkan teknologi terdepan untuk setiap kebutuhan Anda.</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-12">
                <div>
                    <h5 class="font-label-md text-label-md text-on-surface mb-6">Navigasi</h5>
                    <ul class="space-y-4">
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Tentang Kami</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Lokasi Toko</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Katalog</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-label-md text-label-md text-on-surface mb-6">Support</h5>
                    <ul class="space-y-4">
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Support Center</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Kebijakan Privasi</a></li>
                        <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-primary transition-colors"
                                href="#">Syarat &amp; Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-label-md text-label-md text-on-surface mb-6">Hubungi Kami</h5>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-2 text-on-surface-variant font-body-md text-body-md">
                            <span class="material-symbols-outlined text-primary">mail</span>
                            info@boslaptop.id
                        </li>
                        <li class="flex items-center gap-2 text-on-surface-variant font-body-md text-body-md">
                            <span class="material-symbols-outlined text-primary">call</span>
                            +62 21 500 123
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div
            class="max-w-container-max mx-auto px-margin-desktop mt-16 pt-8 border-t border-outline-variant/30 text-center">
            <p class="font-label-sm text-label-sm text-on-surface-variant">© 2024 BosLaptop High-Performance Computing.
                All rights reserved.</p>
        </div>
    </footer>
    <script>
        // Smooth scroll implementation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Simple animation on scroll
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100');
                    entry.target.classList.remove('translate-y-8');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.bento-card').forEach(card => {
            card.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
            observer.observe(card);
        });
    </script>
</body>

</html>
