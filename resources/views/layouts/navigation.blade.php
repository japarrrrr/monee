
<div x-data="{ open: false }">

    {{-- SIDEBAR DESKTOP --}}
    <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col border-r border-slate-200/70 bg-white lg:flex">

        {{-- LOGO --}}
        <div class="flex h-20 items-center gap-3 px-7">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-blue-600 text-xl font-extrabold text-white shadow-lg shadow-blue-200">
                M
            </div>
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-800">Monee</h1>
                <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">
                    Finance tracker
                </p>
            </div>
        </div>

        {{-- MENU DESKTOP --}}
        <div class="flex-1 px-5 py-7">
            <p class="mb-4 px-3 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                Menu utama
            </p>

            <div class="space-y-2">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                   {{ request()->routeIs('dashboard') ? 'bg-blue-50 font-semibold text-blue-600' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                    <i data-lucide="layout-dashboard" class="h-5 w-5"></i>
                    Dashboard
                </a>

                <a href="{{ route('wallets.index') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                   {{ request()->routeIs('wallets.*') ? 'bg-blue-50 font-semibold text-blue-600' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                    <i data-lucide="wallet" class="h-5 w-5"></i>
                    Dompet
                </a>

                <a href="{{ route('categories.index') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm transition
                   {{ request()->routeIs('categories.*') ? 'bg-blue-50 font-semibold text-blue-600' : 'font-medium text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                    <i data-lucide="tags" class="h-5 w-5"></i>
                    Kategori
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-500 transition hover:bg-slate-50 hover:text-slate-800">
                    <i data-lucide="chart-no-axes-combined" class="h-5 w-5"></i>
                    Laporan
                </a>

            </div>
        </div>

        {{-- USER PROFILE --}}
        <div class="border-t border-slate-100 p-5">

            <div class="mb-4 flex items-center gap-3 rounded-xl bg-slate-50 p-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 font-bold text-blue-600">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="truncate text-sm font-semibold text-slate-800">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="truncate text-xs text-slate-400">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-500 hover:bg-slate-50 hover:text-slate-800">
                <i data-lucide="settings" class="h-4 w-4"></i>
                Pengaturan
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-red-500 hover:bg-red-50">
                    <i data-lucide="log-out" class="h-4 w-4"></i>
                    Keluar
                </button>
            </form>

        </div>
    </aside>


    {{-- HEADER MOBILE --}}
    <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200/70 bg-white/95 px-5 backdrop-blur lg:hidden">

        <div class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-600 font-bold text-white">
                M
            </div>
            <span class="text-xl font-extrabold tracking-tight text-slate-800">
                Monee
            </span>
        </div>

        <button @click="open = !open"
                class="rounded-xl p-2 text-slate-600 hover:bg-slate-100"
                aria-label="Buka menu">
            <i x-show="!open" data-lucide="menu" class="h-5 w-5"></i>
            <i x-show="open" data-lucide="x" class="h-5 w-5"></i>
        </button>

    </header>


    {{-- MENU MOBILE --}}
    <div x-show="open"
         x-transition
         @click.outside="open = false"
         class="fixed inset-x-0 top-16 z-50 border-b border-slate-200 bg-white p-5 shadow-xl lg:hidden">

        <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-400">
            {{ Auth::user()->name }}
        </p>

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
            <i data-lucide="settings" class="h-5 w-5"></i>
            Pengaturan profil
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm text-red-500 hover:bg-red-50">
                <i data-lucide="log-out" class="h-5 w-5"></i>
                Keluar
            </button>
        </form>

    </div>


    {{-- BOTTOM NAVIGATION MOBILE --}}
    <nav class="fixed inset-x-0 bottom-0 z-30 border-t border-slate-200/70 bg-white lg:hidden">
        <div class="grid h-[68px] grid-cols-5">

            <a href="{{ route('dashboard') }}"
               class="flex flex-col items-center justify-center gap-1 text-xs
               {{ request()->routeIs('dashboard') ? 'font-semibold text-blue-600' : 'text-slate-400' }}">
                <i data-lucide="house" class="h-5 w-5"></i>
                Home
            </a>

            <a href="{{ route('wallets.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-xs
               {{ request()->routeIs('wallets.*') ? 'font-semibold text-blue-600' : 'text-slate-400' }}">
                <i data-lucide="wallet" class="h-5 w-5"></i>
                Dompet
            </a>

            {{-- TOMBOL TAMBAH --}}
            <div class="flex items-center justify-center">
                <a href="#"
                   class="-mt-7 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/30 transition hover:bg-blue-700"
                   aria-label="Tambah transaksi">
                    <i data-lucide="plus" class="h-7 w-7"></i>
                </a>
            </div>

            <a href="{{ route('categories.index') }}"
               class="flex flex-col items-center justify-center gap-1 text-xs
               {{ request()->routeIs('categories.*') ? 'font-semibold text-blue-600' : 'text-slate-400' }}">
                <i data-lucide="tags" class="h-5 w-5"></i>
                Kategori
            </a>

            <a href="{{ route('profile.edit') }}"
               class="flex flex-col items-center justify-center gap-1 text-xs
               {{ request()->routeIs('profile.*') ? 'font-semibold text-blue-600' : 'text-slate-400' }}">
                <i data-lucide="user-round" class="h-5 w-5"></i>
                Profil
            </a>

        </div>
    </nav>

</div>
