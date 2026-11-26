<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Monee') }} - Personal Finance Tracker</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        paper: '#F5F5F0',
                        ink: '#171717',
                        brand: '#2563EB',
                        brandLight: '#DBEAFE',
                        yellow: '#FACC15',
                        'yellow-light': '#FEF08A',
                        amber: '#D97706',
                        green: '#16A34A',
                        greenLight: '#DCFCE7',
                        purple: '#A855F7',
                        purpleLight: '#F3E8FF',
                        purpleDark: '#7E22CE',
                        red: '#EF4444',
                        redLight: '#FEE2E2',
                    },
                    boxShadow: {
                        'brutal-xs': '2px 2px 0px 0px #000000',
                        'brutal-sm': '3px 3px 0px 0px #000000',
                        'brutal': '4px 4px 0px 0px #000000',
                        'brutal-md': '5px 5px 0px 0px #000000',
                        'brutal-lg': '6px 6px 0px 0px #000000',
                        'brutal-xl': '8px 8px 0px 0px #000000',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #F5F5F0;
            color: #171717;
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        ::selection {
            background-color: #FACC15;
            color: #171717;
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #F5F5F0;
            border-left: 2px solid #171717;
        }

        ::-webkit-scrollbar-thumb {
            background: #2563EB;
            border: 2px solid #171717;
        }
    </style>
</head>

<body class="min-h-screen bg-paper text-ink">

    <!-- NAVBAR SECTION -->
    <header class="sticky top-0 z-50 border-b-2 border-black bg-paper">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="group flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center border-2 border-black bg-brand text-xl font-black text-white shadow-brutal-sm transition group-hover:translate-x-[2px] group-hover:translate-y-[2px] group-hover:shadow-none">
                    M
                </div>

                <div>
                    <span class="text-2xl font-black tracking-tight">Monee.</span>
                    <p class="text-[9px] font-black uppercase tracking-[0.2em] text-neutral-500">
                        Finance Tracker
                    </p>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden items-center gap-8 text-sm font-bold md:flex">
                <a href="#fitur" class="transition hover:text-brand">Fitur Utama</a>
                <a href="#keunggulan" class="transition hover:text-brand">Keunggulan</a>
                <a href="#keamanan" class="transition hover:text-brand">Keamanan</a>
            </nav>

            <!-- Desktop Actions -->
            <div class="hidden items-center gap-3 sm:flex">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-2 border-2 border-black bg-brand px-5 py-2.5 text-sm font-black text-white shadow-brutal-sm transition hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none">
                        Dashboard
                        <i data-lucide="layout-dashboard" class="h-4 w-4"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="border-2 border-transparent px-3 py-2.5 text-sm font-black transition hover:border-black hover:bg-white">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 border-2 border-black bg-brand px-5 py-2.5 text-sm font-black text-white shadow-brutal-sm transition hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none">
                        Daftar Gratis
                        <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button id="menu-toggle"
                    type="button"
                    class="border-2 border-black bg-yellow p-2 shadow-brutal-sm md:hidden"
                    aria-label="Toggle menu"
                    aria-expanded="false">
                <i data-lucide="menu" id="menu-icon-open" class="h-5 w-5"></i>
                <i data-lucide="x" id="menu-icon-close" class="hidden h-5 w-5"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden border-t-2 border-black bg-paper px-4 pb-4 pt-2 md:hidden">
            <nav class="flex flex-col gap-1">
                <a href="#fitur" class="mobile-nav-link border-2 border-transparent px-3 py-2.5 font-bold hover:border-black hover:bg-white">
                    Fitur Utama
                </a>

                <a href="#keunggulan" class="mobile-nav-link border-2 border-transparent px-3 py-2.5 font-bold hover:border-black hover:bg-white">
                    Keunggulan
                </a>

                <a href="#keamanan" class="mobile-nav-link border-2 border-transparent px-3 py-2.5 font-bold hover:border-black hover:bg-white">
                    Keamanan
                </a>

                <div class="mt-2 flex flex-col gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="mobile-nav-link border-2 border-black bg-brand px-5 py-2.5 text-center text-sm font-black text-white shadow-brutal-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="mobile-nav-link border-2 border-black bg-white px-5 py-2.5 text-center text-sm font-black shadow-brutal-sm">
                            Masuk
                        </a>

                        <a href="{{ route('register') }}"
                           class="mobile-nav-link inline-flex items-center justify-center gap-2 border-2 border-black bg-brand px-5 py-2.5 text-center text-sm font-black text-white shadow-brutal-sm">
                            Daftar Gratis
                            <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <main>

        <!-- HERO SECTION -->
        <section class="relative overflow-hidden border-b-2 border-black px-4 py-16 sm:py-24">

            <!-- Decorative shapes -->
            <div class="pointer-events-none absolute -right-20 top-20 h-56 w-56 rotate-12 border-2 border-black bg-yellow opacity-50"></div>
            <div class="pointer-events-none absolute -left-16 bottom-10 h-36 w-36 rounded-full border-2 border-black bg-purple opacity-50"></div>

            <div class="relative mx-auto max-w-7xl">

                <!-- Hero text -->
                <div class="mx-auto max-w-4xl text-center">

                    <div class="mb-7 inline-flex items-center gap-2 border-2 border-black bg-yellow px-4 py-2 text-xs font-black uppercase tracking-wide shadow-brutal-sm">
                        <span class="h-2.5 w-2.5 rounded-full border border-black bg-green"></span>
                        Aplikasi Pengelola Keuangan Pribadi
                    </div>

                    <h1 class="text-4xl font-black leading-[1.12] tracking-tight sm:text-5xl lg:text-7xl">
                        Atur Keuangan Pribadi Lebih
                        <span class="mt-2 inline-block border-b-[6px] border-yellow text-brand">
                            Mudah, Rapi, &amp; Terarah.
                        </span>
                    </h1>

                    <p class="mx-auto mt-7 max-w-2xl text-base font-medium leading-relaxed text-neutral-600 sm:text-lg">
                        Catat pemasukan dan pengeluaran harian, kelola saldo multi-dompet,
                        atur kategori transaksi, serta pantau kondisi finansialmu melalui
                        grafik dan laporan interaktif.
                    </p>

                    <div class="mt-9 flex flex-col items-center justify-center gap-4 sm:flex-row">
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="inline-flex w-full items-center justify-center gap-2 border-2 border-black bg-brand px-8 py-4 text-base font-black text-white shadow-brutal-md transition hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-brutal-sm active:translate-x-[5px] active:translate-y-[5px] active:shadow-none sm:w-auto">
                                Buka Dashboard Saya
                                <i data-lucide="arrow-up-right" class="h-5 w-5"></i>
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="inline-flex w-full items-center justify-center gap-2 border-2 border-black bg-brand px-8 py-4 text-base font-black text-white shadow-brutal-md transition hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-brutal-sm active:translate-x-[5px] active:translate-y-[5px] active:shadow-none sm:w-auto">
                                Mulai Sekarang — Gratis
                                <i data-lucide="arrow-up-right" class="h-5 w-5"></i>
                            </a>

                            <a href="{{ route('login') }}"
                               class="inline-flex w-full items-center justify-center gap-2 border-2 border-black bg-white px-8 py-4 text-base font-black shadow-brutal-md transition hover:translate-x-[3px] hover:translate-y-[3px] hover:shadow-brutal-sm active:translate-x-[5px] active:translate-y-[5px] active:shadow-none sm:w-auto">
                                Sudah Punya Akun
                            </a>
                        @endauth
                    </div>

                    <div class="mt-10 flex flex-wrap items-center justify-center gap-x-7 gap-y-3 text-xs font-bold text-neutral-600">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="h-4 w-4 text-green"></i>
                            Bebas Iklan
                        </span>

                        <span class="flex items-center gap-2">
                            <i data-lucide="wallet" class="h-4 w-4 text-brand"></i>
                            Multi-Dompet
                        </span>

                        <span class="flex items-center gap-2">
                            <i data-lucide="shield-check" class="h-4 w-4 text-green"></i>
                            Data Pribadi
                        </span>
                    </div>
                </div>

                <!-- Dashboard preview -->
                <div class="mx-auto mt-16 max-w-5xl">
                    <div class="overflow-hidden border-2 border-black bg-white shadow-brutal-xl">

                        <!-- Browser header -->
                        <div class="flex items-center justify-between border-b-2 border-black bg-yellow px-4 py-3 sm:px-6">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full border-2 border-black bg-red"></span>
                                <span class="h-3 w-3 rounded-full border-2 border-black bg-white"></span>
                                <span class="h-3 w-3 rounded-full border-2 border-black bg-green"></span>
                            </div>

                            <div class="border-2 border-black bg-white px-4 py-1 text-[10px] font-black sm:text-xs">
                                MONEE.APP / DASHBOARD
                            </div>

                            <i data-lucide="more-horizontal" class="h-5 w-5"></i>
                        </div>

                        <!-- Dashboard body -->
                        <div class="bg-paper p-4 sm:p-7">

                            <!-- Balance card -->
                            <div class="relative overflow-hidden border-2 border-black bg-brand p-6 text-white shadow-brutal-md sm:p-8">
                                <div class="absolute -right-5 -top-5 h-32 w-32 rotate-12 border-2 border-white/30"></div>
                                <div class="absolute -bottom-10 right-24 h-28 w-28 rounded-full border-2 border-white/30"></div>

                                <div class="relative flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                                    <div>
                                        <p class="text-xs font-black uppercase tracking-wider text-blue-100">
                                            Total Saldo Keuangan
                                        </p>

                                        <h3 class="mt-3 text-3xl font-black tracking-tight sm:text-4xl">
                                            Rp 48.750.000
                                        </h3>

                                        <p class="mt-2 text-xs font-semibold text-blue-100">
                                            Gabungan saldo seluruh dompet aktif
                                        </p>
                                    </div>

                                    <div class="inline-flex items-center gap-2 self-start border-2 border-black bg-yellow px-3 py-2 text-xs font-black text-black">
                                        <i data-lucide="trending-up" class="h-4 w-4"></i>
                                        Arus Kas Positif
                                    </div>
                                </div>
                            </div>

                            <!-- Summary cards -->
                            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

                                <!-- Income -->
                                <div class="border-2 border-black bg-white p-4 shadow-brutal">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-black text-neutral-500">PEMASUKAN</span>
                                        <span class="flex h-9 w-9 items-center justify-center border-2 border-black bg-greenLight text-[#166534]">
                                            <i data-lucide="trending-up" class="h-5 w-5"></i>
                                        </span>
                                    </div>

                                    <p class="mt-3 text-xl font-black">Rp 12.500.000</p>
                                    <p class="mt-1 text-xs font-bold text-green">Bulan ini</p>
                                </div>

                                <!-- Expense -->
                                <div class="border-2 border-black bg-white p-4 shadow-brutal">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-black text-neutral-500">PENGELUARAN</span>
                                        <span class="flex h-9 w-9 items-center justify-center border-2 border-black bg-redLight text-[#B91C1C]">
                                            <i data-lucide="trending-down" class="h-5 w-5"></i>
                                        </span>
                                    </div>

                                    <p class="mt-3 text-xl font-black">Rp 4.250.000</p>
                                    <p class="mt-1 text-xs font-bold text-neutral-500">Bulan ini</p>
                                </div>

                                <!-- Net -->
                                <div class="border-2 border-black bg-yellow p-4 shadow-brutal">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-black">SELISIH BERSIH</span>
                                        <span class="flex h-9 w-9 items-center justify-center border-2 border-black bg-white">
                                            <i data-lucide="wallet" class="h-5 w-5"></i>
                                        </span>
                                    </div>

                                    <p class="mt-3 text-xl font-black">+Rp 8.250.000</p>
                                    <p class="mt-1 text-xs font-bold">Arus kas positif</p>
                                </div>
                            </div>

                            <!-- Wallets -->
                            <div class="mt-6 border-2 border-black bg-white p-4 shadow-brutal sm:p-5">
                                <div class="mb-4 flex items-center justify-between gap-2">
                                    <h4 class="text-sm font-black uppercase tracking-wide">Dompet Terhubung</h4>
                                    <span class="border-2 border-black bg-yellow px-2 py-1 text-[10px] font-black">
                                        3 DOMPET
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

                                    <!-- BCA -->
                                    <div class="flex items-center gap-3 border-2 border-black bg-brandLight p-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center border-2 border-black bg-white text-brand">
                                            <i data-lucide="building-2" class="h-5 w-5"></i>
                                        </div>

                                        <div>
                                            <p class="text-xs font-black">Rekening BCA</p>
                                            <p class="text-xs font-bold text-neutral-600">Rp 25.000.000</p>
                                        </div>
                                    </div>

                                    <!-- GoPay -->
                                    <div class="flex items-center gap-3 border-2 border-black bg-greenLight p-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center border-2 border-black bg-white text-green">
                                            <i data-lucide="smartphone" class="h-5 w-5"></i>
                                        </div>

                                        <div>
                                            <p class="text-xs font-black">GoPay</p>
                                            <p class="text-xs font-bold text-neutral-600">Rp 3.750.000</p>
                                        </div>
                                    </div>

                                    <!-- Cash -->
                                    <div class="flex items-center gap-3 border-2 border-black bg-yellow-light p-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center border-2 border-black bg-white text-amber">
                                            <i data-lucide="banknote" class="h-5 w-5"></i>
                                        </div>

                                        <div>
                                            <p class="text-xs font-black">Uang Tunai</p>
                                            <p class="text-xs font-bold text-neutral-600">Rp 20.000.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-center text-[10px] font-bold uppercase tracking-widest text-neutral-400">
                                Preview ilustrasi dashboard Monee
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- FEATURES SECTION -->
        <section id="fitur" class="border-b-2 border-black bg-white px-4 py-20 sm:py-24">
            <div class="mx-auto max-w-7xl">

                <div class="mx-auto mb-14 max-w-2xl text-center">
                    <span class="inline-block border-2 border-black bg-yellow px-3 py-1 text-xs font-black uppercase tracking-widest shadow-brutal-sm">
                        Fitur Unggulan
                    </span>

                    <h2 class="mt-6 text-3xl font-black tracking-tight sm:text-4xl">
                        Semua Kebutuhan Keuangan dalam Satu Tempat.
                    </h2>

                    <p class="mt-4 text-sm font-medium leading-relaxed text-neutral-600 sm:text-base">
                        Dirancang agar kamu dapat mengelola keuangan dengan lebih mudah,
                        teratur, dan menyenangkan.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    <!-- Feature 1 -->
                    <div class="group bg-brandLight border-2 border-black p-6 shadow-brutal-md transition hover:-translate-y-1 hover:translate-x-1 hover:shadow-brutal-sm">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center border-2 border-black bg-white">
                            <i data-lucide="wallet-cards" class="h-7 w-7 text-brand"></i>
                        </div>

                        <h3 class="text-lg font-black">Multi-Dompet Cerdas</h3>

                        <p class="mt-3 text-sm font-medium leading-relaxed text-neutral-700">
                            Pisahkan saldo tunai, rekening bank, hingga e-wallet secara terorganisasi.
                        </p>

                        <span class="mt-6 inline-block text-xs font-black uppercase tracking-wider">
                            01 / DOMPET
                        </span>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group bg-greenLight border-2 border-black p-6 shadow-brutal-md transition hover:-translate-y-1 hover:translate-x-1 hover:shadow-brutal-sm">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center border-2 border-black bg-white">
                            <i data-lucide="arrow-left-right" class="h-7 w-7 text-green"></i>
                        </div>

                        <h3 class="text-lg font-black">Pencatatan Cepat</h3>

                        <p class="mt-3 text-sm font-medium leading-relaxed text-neutral-700">
                            Catat pemasukan dan pengeluaran dengan proses yang sederhana.
                        </p>

                        <span class="mt-6 inline-block text-xs font-black uppercase tracking-wider">
                            02 / TRANSAKSI
                        </span>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group bg-purpleLight border-2 border-black p-6 shadow-brutal-md transition hover:-translate-y-1 hover:translate-x-1 hover:shadow-brutal-sm">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center border-2 border-black bg-white">
                            <i data-lucide="tags" class="h-7 w-7 text-purpleDark"></i>
                        </div>

                        <h3 class="text-lg font-black">Kategori Fleksibel</h3>

                        <p class="mt-3 text-sm font-medium leading-relaxed text-neutral-700">
                            Kelompokkan transaksi berdasarkan kebutuhan pemasukan dan pengeluaran.
                        </p>

                        <span class="mt-6 inline-block text-xs font-black uppercase tracking-wider">
                            03 / KATEGORI
                        </span>
                    </div>

                    <!-- Feature 4 -->
                    <div class="group bg-yellow-light border-2 border-black p-6 shadow-brutal-md transition hover:-translate-y-1 hover:translate-x-1 hover:shadow-brutal-sm">
                        <div class="mb-6 flex h-14 w-14 items-center justify-center border-2 border-black bg-white">
                            <i data-lucide="chart-no-axes-combined" class="h-7 w-7 text-amber"></i>
                        </div>

                        <h3 class="text-lg font-black">Laporan Visual</h3>

                        <p class="mt-3 text-sm font-medium leading-relaxed text-neutral-700">
                            Pantau tren keuangan dan distribusi transaksi melalui grafik.
                        </p>

                        <span class="mt-6 inline-block text-xs font-black uppercase tracking-wider">
                            04 / ANALISIS
                        </span>
                    </div>
                </div>
            </div>
        </section>


        <!-- ADVANTAGES SECTION -->
        <section id="keunggulan" class="border-b-2 border-black bg-paper px-4 py-20">
            <div class="mx-auto grid max-w-7xl items-center gap-12 md:grid-cols-2">

                <!-- Left Column -->
                <div>
                    <span class="inline-block border-2 border-black bg-purple px-3 py-1 text-xs font-black uppercase tracking-widest shadow-brutal-sm">
                        Kenapa Monee?
                    </span>

                    <h2 class="mt-6 text-3xl font-black leading-tight sm:text-4xl">
                        Keuangan Lebih Teratur, Pikiran Lebih Tenang.
                    </h2>

                    <p class="mt-5 text-sm font-medium leading-relaxed text-neutral-600 sm:text-base">
                        Monee membantu kamu memahami kondisi keuangan melalui pencatatan
                        yang terstruktur dan laporan yang mudah dipahami.
                    </p>

                    <div class="mt-8 space-y-4">

                        <div class="flex items-start gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center border-2 border-black bg-greenLight">
                                <i data-lucide="check" class="h-4 w-4"></i>
                            </div>

                            <div>
                                <h3 class="font-black">Pengelolaan lebih terstruktur</h3>
                                <p class="mt-1 text-sm text-neutral-600">Semua catatan keuangan tersusun dalam satu aplikasi.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center border-2 border-black bg-brandLight">
                                <i data-lucide="check" class="h-4 w-4"></i>
                            </div>

                            <div>
                                <h3 class="font-black">Informasi mudah dipahami</h3>
                                <p class="mt-1 text-sm text-neutral-600">Ringkasan saldo dan laporan ditampilkan secara visual.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center border-2 border-black bg-yellow-light">
                                <i data-lucide="check" class="h-4 w-4"></i>
                            </div>

                            <div>
                                <h3 class="font-black">Mudah digunakan</h3>
                                <p class="mt-1 text-sm text-neutral-600">Antarmuka dirancang agar pencatatan tidak terasa rumit.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="border-2 border-black bg-yellow p-6 shadow-brutal-xl sm:p-9">
                    <div class="border-2 border-black bg-white p-6">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-black uppercase tracking-widest">Financial Habit</span>
                            <i data-lucide="target" class="h-6 w-6"></i>
                        </div>

                        <h3 class="mt-8 text-3xl font-black leading-tight">
                            Kenali Uangmu.
                            <br />
                            Atur Masa Depanmu.
                        </h3>

                        <div class="mt-8 flex items-end gap-2">
                            <div class="h-12 flex-1 border-2 border-black bg-brand"></div>
                            <div class="h-20 flex-1 border-2 border-black bg-green"></div>
                            <div class="h-16 flex-1 border-2 border-black bg-purple"></div>
                            <div class="h-28 flex-1 border-2 border-black bg-yellow"></div>
                            <div class="h-36 flex-1 border-2 border-black bg-brand"></div>
                        </div>

                        <p class="mt-5 text-xs font-bold text-neutral-500">
                            Ilustrasi kebiasaan pengelolaan keuangan yang lebih teratur.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- SECURITY SECTION -->
        <section id="keamanan" class="border-b-2 border-black bg-white px-4 py-16">
            <div class="mx-auto max-w-4xl border-2 border-black bg-brandLight p-7 shadow-brutal-lg sm:p-10">

                <div class="flex flex-col items-center gap-5 text-center sm:flex-row sm:text-left">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center border-2 border-black bg-white">
                        <i data-lucide="shield-check" class="h-9 w-9 text-brand"></i>
                    </div>

                    <div>
                        <h2 class="text-2xl font-black">Privasi dan Keamanan Data</h2>

                        <p class="mt-2 text-sm font-medium leading-relaxed text-neutral-600">
                            Monee menggunakan sistem autentikasi untuk membatasi akses
                            ke akun dan data keuangan masing-masing pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- CTA SECTION -->
        <section class="border-b-2 border-black bg-paper px-4 py-20">
            <div class="mx-auto max-w-7xl">

                <div class="relative overflow-hidden border-2 border-black bg-brand px-6 py-14 text-center text-white shadow-brutal-xl sm:px-12">

                    <!-- Decorative shapes -->
                    <div class="pointer-events-none absolute -right-8 -top-8 h-40 w-40 rotate-12 border-2 border-white/30"></div>
                    <div class="pointer-events-none absolute -bottom-12 -left-8 h-40 w-40 rounded-full border-2 border-white/30"></div>

                    <div class="relative mx-auto max-w-2xl">
                        <span class="inline-block border-2 border-black bg-yellow px-3 py-1 text-xs font-black uppercase tracking-widest text-black">
                            Start Today
                        </span>

                        <h2 class="mt-6 text-3xl font-black leading-tight sm:text-4xl">
                            Siap Mengendalikan Masa Depan Finansialmu?
                        </h2>

                        <p class="mt-4 text-sm font-medium leading-relaxed text-blue-100 sm:text-base">
                            Mulai catat dan kelola keuangan pribadi dengan lebih teratur bersama Monee.
                        </p>

                        <div class="mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                            @auth
                                <a href="{{ route('dashboard') }}"
                                   class="inline-flex w-full items-center justify-center gap-2 border-2 border-black bg-yellow px-8 py-4 text-sm font-black text-black shadow-brutal transition hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-brutal-xs active:translate-x-1 active:translate-y-1 active:shadow-none sm:w-auto">
                                    Buka Dashboard
                                    <i data-lucide="layout-dashboard" class="h-4 w-4"></i>
                                </a>
                            @else
                                <a href="{{ route('register') }}"
                                   class="inline-flex w-full items-center justify-center gap-2 border-2 border-black bg-yellow px-8 py-4 text-sm font-black text-black shadow-brutal transition hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-brutal-xs active:translate-x-1 active:translate-y-1 active:shadow-none sm:w-auto">
                                    Daftar Sekarang
                                    <i data-lucide="arrow-up-right" class="h-4 w-4"></i>
                                </a>

                                <a href="{{ route('login') }}"
                                   class="inline-flex w-full items-center justify-center border-2 border-white bg-transparent px-8 py-4 text-sm font-black text-white transition hover:bg-white hover:text-brand sm:w-auto">
                                    Masuk ke Akun
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <!-- FOOTER SECTION -->
    <footer class="bg-paper px-4 py-10">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-5 sm:flex-row">

            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center border-2 border-black bg-brand text-sm font-black text-white shadow-brutal-xs">
                    M
                </div>

                <div>
                    <span class="text-lg font-black">Monee.</span>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-500">
                        Personal Finance Tracker
                    </p>
                </div>
            </a>

            <p class="text-center text-xs font-bold text-neutral-500">
                &copy; {{ date('Y') }} Monee. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </footer>


    <!-- Interactive Script -->
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Mobile Menu Toggle Functionality
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('menu-icon-open');
        const iconClose = document.getElementById('menu-icon-close');

        menuToggle.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');

            if (isOpen) {
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
            } else {
                mobileMenu.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
                menuToggle.setAttribute('aria-expanded', 'true');
            }
        });

        // Close menu when navigation link is clicked
        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    </script>

</body>
</html>
