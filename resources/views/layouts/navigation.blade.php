@php
    $sidebarUser = Auth::user();
    $sidebarTotalBalance = 0;
    if ($sidebarUser) {
        $sidebarWallets = $sidebarUser->wallets()
            ->withSum(['transactions as total_income' => function ($query) {
                $query->where('type', 'income');
            }], 'amount')
            ->withSum(['transactions as total_expense' => function ($query) {
                $query->where('type', 'expense');
            }], 'amount')
            ->get();

        $sidebarTotalBalance = $sidebarWallets->sum(function ($w) {
            return (float) $w->opening_balance + (float) ($w->total_income ?? 0) - (float) ($w->total_expense ?? 0);
        });
    }
@endphp

<div x-data="{ mobileMenuOpen: false }">

    {{-- ================================================================ --}}
    {{-- SIDEBAR DESKTOP (NEO-BRUTALISM)                                   --}}
    {{-- ================================================================ --}}
    <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col bg-white border-r-2 border-[#171717] lg:flex">

        {{-- A. BAGIAN ATAS: LOGO & IDENTITY --}}
        <div class="flex h-[72px] items-center gap-3 px-5 border-b-2 border-[#171717] bg-white">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#2563EB] border-2 border-[#171717] shadow-[2px_2px_0px_#171717]">
                <span class="text-xl font-black text-white">M</span>
            </div>
            <div class="min-w-0">
                <div class="flex items-center gap-1.5">
                    <span class="text-xl font-black tracking-tight text-[#171717]">Monee</span>
                    <span class="inline-block px-1.5 py-0.5 rounded text-[8px] font-black uppercase tracking-wider bg-[#FACC15] border border-[#171717] text-[#171717]">Finance</span>
                </div>
                <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#525252]">Personal Finance</p>
            </div>
        </div>

        {{-- B. BAGIAN NAVIGASI: 4 MENU UTAMA + RUANG KOSONG RUNGSIONAL --}}
        <div class="flex-1 overflow-y-auto px-4 py-5 flex flex-col gap-5">

            {{-- 4 MENU UTAMA --}}
            <div>
                <p class="mb-2.5 px-2 text-[10px] font-black uppercase tracking-[0.2em] text-[#525252]">Menu Utama</p>
                <nav class="space-y-1.5">

                    {{-- 1. Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition-all duration-150
                       {{ request()->routeIs('dashboard')
                           ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                           : 'text-[#525252] border-2 border-transparent hover:border-[#171717] hover:bg-[#F5F5F0] hover:text-[#171717] hover:shadow-[3px_3px_0px_#171717]' }}">
                        <i data-lucide="layout-dashboard" class="h-5 w-5 shrink-0 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-[#171717]' }}"></i>
                        <span>Dashboard</span>
                    </a>

                    {{-- 2. Dompet --}}
                    <a href="{{ route('wallets.index') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition-all duration-150
                       {{ request()->routeIs('wallets.*')
                           ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                           : 'text-[#525252] border-2 border-transparent hover:border-[#171717] hover:bg-[#F5F5F0] hover:text-[#171717] hover:shadow-[3px_3px_0px_#171717]' }}">
                        <i data-lucide="wallet" class="h-5 w-5 shrink-0 {{ request()->routeIs('wallets.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                        <span>Dompet</span>
                    </a>

                    {{-- 3. Transaksi --}}
                    <a href="{{ route('transactions.index') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition-all duration-150
                       {{ request()->routeIs('transactions.*')
                           ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                           : 'text-[#525252] border-2 border-transparent hover:border-[#171717] hover:bg-[#F5F5F0] hover:text-[#171717] hover:shadow-[3px_3px_0px_#171717]' }}">
                        <i data-lucide="arrow-left-right" class="h-5 w-5 shrink-0 {{ request()->routeIs('transactions.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                        <span>Transaksi</span>
                    </a>

                    {{-- 4. Laporan --}}
                    <a href="{{ route('reports.index') }}"
                       class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition-all duration-150
                       {{ request()->routeIs('reports.*')
                           ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                           : 'text-[#525252] border-2 border-transparent hover:border-[#171717] hover:bg-[#F5F5F0] hover:text-[#171717] hover:shadow-[3px_3px_0px_#171717]' }}">
                        <i data-lucide="chart-no-axes-combined" class="h-5 w-5 shrink-0 {{ request()->routeIs('reports.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                        <span>Laporan</span>
                    </a>

                </nav>
            </div>

            {{-- C. RUANG KOSONG RUNGSIONAL --}}
            <div class="space-y-4 pt-1">

                {{-- 1. QUICK FINANCIAL SUMMARY (DINAMIS DARI DATABASE) --}}
                <div class="neo-card-sm p-3.5 bg-white">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[10px] font-black uppercase tracking-wider text-[#525252]">Total Saldo</span>
                        <div class="h-7 w-7 rounded-lg bg-[#F5F5F0] border-2 border-[#171717] flex items-center justify-center text-[#171717]">
                            <i data-lucide="wallet" class="h-3.5 w-3.5"></i>
                        </div>
                    </div>
                    <p class="text-base font-black text-[#171717] tracking-tight">
                        Rp {{ number_format($sidebarTotalBalance, 0, ',', '.') }}
                    </p>
                    <div class="mt-2.5 pt-2 border-t border-[#171717]/10 flex items-center justify-between">
                        <a href="{{ route('wallets.index') }}" class="text-[11px] font-extrabold text-[#2563EB] hover:underline flex items-center gap-1">
                            Kelola Dompet
                            <i data-lucide="arrow-right" class="h-3 w-3"></i>
                        </a>
                    </div>
                </div>

                {{-- 2. FINANCIAL TIP (CARD AKSEN KUNING) --}}
                <div class="neo-card-yellow p-3 text-xs font-bold leading-relaxed">
                    <div class="flex items-center gap-1.5 mb-1.5 text-[10px] font-black uppercase tracking-wider text-[#171717]">
                        <i data-lucide="sparkles" class="h-3.5 w-3.5"></i>
                        Tips Keuangan
                    </div>
                    <p class="text-[11px] text-[#171717] font-bold">
                        Sisihkan minimal 20% pemasukan di awal bulan ke tabungan sebelum belanja kebutuhan lainnya!
                    </p>
                </div>

            </div>

        </div>

        {{-- C.3 USER PROFILE (PALING BAWAH / MT-AUTO) --}}
        <div class="p-4 border-t-2 border-[#171717] bg-white space-y-2.5">
            {{-- User Info Box --}}
            <div class="flex items-center gap-2.5 rounded-xl border-2 border-[#171717] bg-[#F5F5F0] p-2.5 shadow-[2px_2px_0px_#171717]">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#A78BFA] border-2 border-[#171717] text-sm font-black text-[#171717]">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="truncate text-xs font-black text-[#171717]">{{ Auth::user()->name }}</p>
                    <p class="truncate text-[10px] font-bold text-[#525252]">{{ Auth::user()->email }}</p>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('profile.edit') }}"
                   class="neo-btn neo-btn-white py-1.5 px-2 text-xs flex items-center justify-center gap-1 {{ request()->routeIs('profile.*') ? 'bg-[#FACC15]' : '' }}">
                    <i data-lucide="settings" class="h-3.5 w-3.5"></i>
                    Profil
                </a>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                            class="neo-btn neo-btn-danger w-full py-1.5 px-2 text-xs flex items-center justify-center gap-1">
                        <i data-lucide="log-out" class="h-3.5 w-3.5"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- ================================================================ --}}
    {{-- HEADER MOBILE (NEO-BRUTALISM)                                     --}}
    {{-- ================================================================ --}}
    <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b-2 border-[#171717] bg-white px-4 lg:hidden">

        <div class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#2563EB] border-2 border-[#171717] shadow-[2px_2px_0px_#171717]">
                <span class="text-base font-black text-white">M</span>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="text-lg font-black tracking-tight text-[#171717]">Monee</span>
                <span class="inline-block px-1.5 py-0.5 rounded text-[8px] font-black uppercase tracking-wider bg-[#FACC15] border border-[#171717] text-[#171717]">App</span>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('transactions.create') }}"
               class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#2563EB] text-white border-2 border-[#171717] shadow-[2px_2px_0px_#171717] active:translate-x-0.5 active:translate-y-0.5"
               aria-label="Tambah transaksi">
                <i data-lucide="plus" class="h-4 w-4"></i>
            </a>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#171717] border-2 border-[#171717] shadow-[2px_2px_0px_#171717] active:translate-x-0.5 active:translate-y-0.5"
                    aria-label="Menu">
                <i x-show="!mobileMenuOpen" data-lucide="menu" class="h-5 w-5"></i>
                <i x-show="mobileMenuOpen" data-lucide="x" class="h-5 w-5"></i>
            </button>
        </div>
    </header>

    {{-- ================================================================ --}}
    {{-- DRAWER MENU MOBILE (NEO-BRUTALISM)                                --}}
    {{-- ================================================================ --}}
    {{-- Backdrop --}}
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition-opacity duration-150"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileMenuOpen = false"
         class="fixed inset-0 z-40 bg-[#171717]/60 lg:hidden"></div>

    {{-- Drawer Panel --}}
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition transform duration-200"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-150"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed left-0 top-0 z-50 flex h-full w-72 flex-col bg-[#F5F5F0] border-r-2 border-[#171717] shadow-[6px_0px_0px_#171717] lg:hidden">

        {{-- Drawer Header --}}
        <div class="flex h-16 items-center justify-between px-5 border-b-2 border-[#171717] bg-white">
            <div class="flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-[#2563EB] border-2 border-[#171717] shadow-[2px_2px_0px_#171717]">
                    <span class="text-sm font-black text-white">M</span>
                </div>
                <span class="text-lg font-black tracking-tight text-[#171717]">Monee</span>
            </div>
            <button @click="mobileMenuOpen = false"
                    class="neo-btn neo-btn-white h-8 w-8 rounded-lg">
                <i data-lucide="x" class="h-4 w-4"></i>
            </button>
        </div>

        {{-- Drawer User Info --}}
        <div class="border-b-2 border-[#171717] bg-white px-5 py-3.5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#A78BFA] border-2 border-[#171717] font-black text-[#171717] shadow-[2px_2px_0px_#171717]">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="truncate text-sm font-black text-[#171717]">{{ Auth::user()->name }}</p>
                    <p class="truncate text-xs font-bold text-[#525252]">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        {{-- Quick Saldo Mobile --}}
        <div class="p-4 border-b-2 border-[#171717] bg-white">
            <div class="neo-card-sm p-3 bg-[#F5F5F0]">
                <span class="text-[9px] font-black uppercase tracking-wider text-[#525252]">Total Saldo</span>
                <p class="text-sm font-black text-[#171717] mt-0.5">
                    Rp {{ number_format($sidebarTotalBalance, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- Drawer Nav --}}
        <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-1.5">
            <p class="mb-2 px-2 text-[10px] font-black uppercase tracking-[0.2em] text-[#525252]">Navigasi</p>

            <a href="{{ route('dashboard') }}"
               @click="mobileMenuOpen = false"
               class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition
               {{ request()->routeIs('dashboard')
                   ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                   : 'text-[#171717] border-2 border-transparent hover:border-[#171717] hover:bg-white hover:shadow-[3px_3px_0px_#171717]' }}">
                <i data-lucide="layout-dashboard" class="h-5 w-5 shrink-0 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-[#171717]' }}"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('wallets.index') }}"
               @click="mobileMenuOpen = false"
               class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition
               {{ request()->routeIs('wallets.*')
                   ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                   : 'text-[#171717] border-2 border-transparent hover:border-[#171717] hover:bg-white hover:shadow-[3px_3px_0px_#171717]' }}">
                <i data-lucide="wallet" class="h-5 w-5 shrink-0 {{ request()->routeIs('wallets.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                <span>Dompet</span>
            </a>

            <a href="{{ route('transactions.index') }}"
               @click="mobileMenuOpen = false"
               class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition
               {{ request()->routeIs('transactions.*')
                   ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                   : 'text-[#171717] border-2 border-transparent hover:border-[#171717] hover:bg-white hover:shadow-[3px_3px_0px_#171717]' }}">
                <i data-lucide="arrow-left-right" class="h-5 w-5 shrink-0 {{ request()->routeIs('transactions.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                <span>Transaksi</span>
            </a>

            <a href="{{ route('categories.index') }}"
               @click="mobileMenuOpen = false"
               class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition
               {{ request()->routeIs('categories.*')
                   ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                   : 'text-[#171717] border-2 border-transparent hover:border-[#171717] hover:bg-white hover:shadow-[3px_3px_0px_#171717]' }}">
                <i data-lucide="tags" class="h-5 w-5 shrink-0 {{ request()->routeIs('categories.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                <span>Kategori</span>
            </a>

            <a href="{{ route('reports.index') }}"
               @click="mobileMenuOpen = false"
               class="flex items-center gap-3 rounded-xl px-3.5 py-2.5 text-sm font-black transition
               {{ request()->routeIs('reports.*')
                   ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                   : 'text-[#171717] border-2 border-transparent hover:border-[#171717] hover:bg-white hover:shadow-[3px_3px_0px_#171717]' }}">
                <i data-lucide="chart-no-axes-combined" class="h-5 w-5 shrink-0 {{ request()->routeIs('reports.*') ? 'text-white' : 'text-[#171717]' }}"></i>
                <span>Laporan</span>
            </a>

        </nav>

        {{-- Drawer Footer --}}
        <div class="border-t-2 border-[#171717] bg-white p-4 space-y-2">
            <a href="{{ route('profile.edit') }}"
               @click="mobileMenuOpen = false"
               class="neo-btn neo-btn-white w-full py-2 px-3 text-xs flex items-center justify-center gap-1.5">
                <i data-lucide="settings" class="h-4 w-4"></i>
                Pengaturan Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="neo-btn neo-btn-danger w-full py-2 px-3 text-xs flex items-center justify-center gap-1.5">
                    <i data-lucide="log-out" class="h-4 w-4"></i>
                    Keluar
                </button>
            </form>
        </div>
    </div>

    {{-- ================================================================ --}}
    {{-- BOTTOM NAVIGATION MOBILE (NEO-BRUTALISM)                           --}}
    {{-- ================================================================ --}}
    <nav class="fixed inset-x-0 bottom-0 z-30 border-t-2 border-[#171717] bg-white lg:hidden"
         style="padding-bottom: env(safe-area-inset-bottom);">
        <div class="grid h-16 grid-cols-5">

            {{-- 1. Home --}}
            <a href="{{ route('dashboard') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-black transition
               {{ request()->routeIs('dashboard') ? 'text-[#2563EB]' : 'text-[#525252] hover:text-[#171717]' }}">
                <i data-lucide="house" class="h-5 w-5 {{ request()->routeIs('dashboard') ? 'stroke-[2.5]' : '' }}"></i>
                <span>Home</span>
            </a>

            {{-- 2. Dompet --}}
            <a href="{{ route('wallets.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-black transition
               {{ request()->routeIs('wallets.*') ? 'text-[#2563EB]' : 'text-[#525252] hover:text-[#171717]' }}">
                <i data-lucide="wallet" class="h-5 w-5 {{ request()->routeIs('wallets.*') ? 'stroke-[2.5]' : '' }}"></i>
                <span>Dompet</span>
            </a>

            {{-- 3. Center FAB (+) Tambah Transaksi --}}
            <div class="flex items-center justify-center">
                <a href="{{ route('transactions.create') }}"
                   class="flex h-12 w-12 -mt-5 items-center justify-center rounded-2xl bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717] active:translate-y-1 active:shadow-none transition-all"
                   aria-label="Tambah transaksi">
                    <i data-lucide="plus" class="h-6 w-6 stroke-[3]"></i>
                </a>
            </div>

            {{-- 4. Laporan --}}
            <a href="{{ route('reports.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-black transition
               {{ request()->routeIs('reports.*') ? 'text-[#2563EB]' : 'text-[#525252] hover:text-[#171717]' }}">
                <i data-lucide="chart-no-axes-combined" class="h-5 w-5 {{ request()->routeIs('reports.*') ? 'stroke-[2.5]' : '' }}"></i>
                <span>Laporan</span>
            </a>

            {{-- 5. Profil --}}
            <a href="{{ route('profile.edit') }}"
               class="flex flex-col items-center justify-center gap-1 text-[10px] font-black transition
               {{ request()->routeIs('profile.*') ? 'text-[#2563EB]' : 'text-[#525252] hover:text-[#171717]' }}">
                <i data-lucide="user-round" class="h-5 w-5 {{ request()->routeIs('profile.*') ? 'stroke-[2.5]' : '' }}"></i>
                <span>Profil</span>
            </a>

        </div>
    </nav>

</div>