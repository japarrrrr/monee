<x-guest-layout>
    {{-- Gaya neo brutalism mandiri: tetap tampil walau Tailwind belum di-rebuild --}}
    <style>
        .nb-border-3px{border-width:3px;border-style:solid}
        .nb-border-r-3px{border-right-width:3px;border-style:solid}
        .nb-border-t-3px{border-top-width:3px;border-style:solid}
        .nb-bg-FFE4E4{background-color:#FFE4E4}
        .nb-bg-FFF8E7{background-color:#FFF8E7}
        .nb-bg-FFD23F{background-color:#FFD23F}
        .nb-bg-2F6BFF{background-color:#2F6BFF}
        .nb-bg-3DDC97{background-color:#3DDC97}
        .nb-bg-FF8FB1{background-color:#FF8FB1}
        .nb-bg-FF5C5C{background-color:#FF5C5C}
        .nb-text-FFD23F{color:#FFD23F}
        .nb-text-C81E1E{color:#C81E1E}
        .nb-text-2F6BFF{color:#2F6BFF}
        .nb-text-10px{font-size:10px}
        .nb-tracking-0p25em{letter-spacing:0.25em}
        .nb-tracking-0p2em{letter-spacing:0.2em}
        .nb-leading-1p05{line-height:1.05}
        .nb-opacity-0p15{opacity:0.15}
        .nb-max-w-480px{max-width:480px}
        .nb-shadow-2px2px00000{box-shadow:2px 2px 0 0 #000}
        .nb-shadow-3px3px00000{box-shadow:3px 3px 0 0 #000}
        .nb-shadow-4px4px00000{box-shadow:4px 4px 0 0 #000}
        .nb-shadow-5px5px00000{box-shadow:5px 5px 0 0 #000}
        .nb-shadow-8px8px00000{box-shadow:8px 8px 0 0 #000}
        .nb-shadow-4px4px00E11D48{box-shadow:4px 4px 0 0 #E11D48}
        .nb-decoration-3px{text-decoration-thickness:3px}
        .nb-decoration-FFD23F{text-decoration-color:#FFD23F}
        .nb-decoration-2F6BFF{text-decoration-color:#2F6BFF}
        .nb-hover-bg-FFD23F:hover{background-color:#FFD23F}
        .nb-focus-visible-bg-FFD23F:focus-visible{background-color:#FFD23F}
        .nb-focus-visible-ring-FFD23F:focus-visible{--tw-ring-color:#FFD23F}
        .nb-input{transition:all .15s}
        .nb-input:focus{outline:none;background-color:#FFF3C4;translate:2px 2px;box-shadow:2px 2px 0 0 #000;border-color:#000}
        .nb-btn{transition:all .15s}
        .nb-btn:hover{translate:2px 2px;box-shadow:3px 3px 0 0 #000}
        .nb-btn:active{translate:5px 5px;box-shadow:none}
        .nb-btn:disabled{translate:0 0;box-shadow:5px 5px 0 0 #000;cursor:not-allowed;opacity:.7}
        .nb-checkbox{appearance:none;-webkit-appearance:none;width:1.25rem;height:1.25rem;border:3px solid #000;border-radius:.3rem;background:#fff;display:grid;place-content:center;cursor:pointer;box-shadow:2px 2px 0 0 #000;flex-shrink:0}
        .nb-checkbox:checked{background-color:#2F6BFF;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12l5 5L20 7'/%3E%3C/svg%3E");background-size:80%;background-position:center;background-repeat:no-repeat}
        .nb-checkbox:focus{outline:none;box-shadow:0 0 0 3px #FFD23F}
        .right-2{right:.5rem}.pr-12{padding-right:3rem}.-top-5{top:-1.25rem}.rotate-3{rotate:3deg}
        @media (min-width:1280px){.xl\:-right-2{right:-.5rem}.xl\:-left-2{left:-.5rem}}
        @keyframes nb-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
        .animate-float{animation:nb-float 4s ease-in-out infinite}
        .animate-float-delayed{animation:nb-float 4s ease-in-out 1.5s infinite}
        @media (prefers-reduced-motion:reduce){.animate-float,.animate-float-delayed,.animate-pulse{animation:none}}
    
        .nb-c-black{color:#000}
        .nb-c-black-60{color:rgba(0,0,0,.6)}
        .nb-c-black-70{color:rgba(0,0,0,.7)}
        .nb-c-white{color:#fff}
        .nb-bc-black{border-color:#000}
        .nb-bg-white{background-color:#fff}
        .nb-h-bc-black:hover{border-color:#000}
        .nb-f-bc-black:focus{border-color:#000}
        .nb-fv-bc-black:focus-visible{border-color:#000}
        .nb-ph-black-40::placeholder{color:rgba(0,0,0,.4)}
    </style>

    @section('title', 'Masuk ke Akun')

    @php
        $inputBase = 'nb-input w-full rounded-lg nb-border-3px nb-bc-black py-3 pl-11 text-sm font-semibold nb-c-black placeholder:font-medium nb-ph-black-40 focus:ring-0';
        $inputState = fn ($field) => $errors->has($field)
            ? 'nb-bg-FFE4E4 nb-shadow-4px4px00E11D48'
            : 'nb-bg-white nb-shadow-4px4px00000';
    @endphp

    <div class="min-h-screen flex flex-col lg:flex-row nb-bg-FFF8E7 nb-c-black">

        {{-- ============================================================== --}}
        {{-- BAGIAN KIRI: BRANDING NEO BRUTALISM (Desktop)                  --}}
        {{-- ============================================================== --}}
        <div class="relative hidden lg:flex lg:w-7/12 nb-bg-2F6BFF nb-c-white nb-border-r-3px nb-bc-black flex-col justify-between p-10 xl:p-14 overflow-hidden">

            {{-- Grid pattern --}}
            <div class="pointer-events-none absolute inset-0 nb-opacity-0p15"
                 style="background-image: linear-gradient(#000 1.5px, transparent 1.5px), linear-gradient(90deg, #000 1.5px, transparent 1.5px); background-size: 40px 40px;"></div>

            {{-- Header --}}
            <div class="relative z-10 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg nb-border-3px nb-bc-black nb-bg-FFD23F nb-shadow-4px4px00000 transition-transform group-hover:-rotate-6">
                        <span class="text-2xl font-black nb-c-black">M</span>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-tight">Monee</span>
                        <p class="nb-text-10px font-black uppercase nb-tracking-0p25em">Finance Tracker</p>
                    </div>
                </a>

                <div class="inline-flex items-center gap-2 rounded-full nb-border-3px nb-bc-black nb-bg-white px-4 py-1.5 text-xs font-black uppercase tracking-wide nb-c-black nb-shadow-3px3px00000">
                    <span class="h-2.5 w-2.5 rounded-full border-2 nb-bc-black nb-bg-3DDC97 animate-pulse"></span>
                    <span>Finansial Cerdas &amp; Terukur</span>
                </div>
            </div>

            {{-- Hero --}}
            <div class="relative z-10 my-auto py-6">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 rounded-md nb-border-3px nb-bc-black nb-bg-FFD23F px-3 py-1 text-xs font-black uppercase tracking-wide nb-c-black mb-5 nb-shadow-3px3px00000 -rotate-1">
                        <i data-lucide="shield-check" class="h-3.5 w-3.5"></i>
                        <span>Platform Keuangan Personal</span>
                    </div>

                    <h1 class="text-4xl xl:text-5xl 2xl:text-6xl font-black tracking-tight nb-leading-1p05">
                        Kelola Keuangan,
                        <span class="mt-2 inline-block -rotate-1 rounded-lg nb-border-3px nb-bc-black nb-bg-FFD23F px-3 py-1 nb-c-black nb-shadow-5px5px00000">
                            Raih Tujuan.
                        </span>
                    </h1>

                    <p class="mt-5 text-sm xl:text-base font-medium leading-relaxed max-w-lg">
                        Pantau pemasukan, atur pengeluaran, dan bangun kebiasaan finansial yang lebih baik bersama Monee.
                    </p>
                </div>

                {{-- Ilustrasi --}}
                <div class="relative mt-12 max-w-xl">
                    <div class="relative z-10 w-full nb-max-w-480px mx-auto rounded-2xl nb-border-3px nb-bc-black nb-bg-FFF8E7 p-4 nb-shadow-8px8px00000">
                        <svg viewBox="0 0 520 340" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" role="img" aria-label="Ilustrasi dashboard keuangan Monee dengan grafik pertumbuhan">
                            <g stroke="#000" stroke-width="3" stroke-linejoin="round" stroke-linecap="round">
                                {{-- Ground --}}
                                <line x1="30" y1="300" x2="490" y2="300"/>

                                {{-- Bars --}}
                                <rect x="45" y="230" width="34" height="70" rx="5" fill="#FF8FB1"/>
                                <rect x="88" y="190" width="34" height="110" rx="5" fill="#3DDC97"/>

                                {{-- Laptop screen --}}
                                <rect x="140" y="70" width="250" height="170" rx="12" fill="#111"/>
                                <rect x="152" y="82" width="226" height="146" rx="6" fill="#FFF8E7"/>

                                {{-- Screen UI --}}
                                <rect x="164" y="94" width="70" height="14" rx="4" fill="#2F6BFF"/>
                                <circle cx="350" cy="101" r="6" fill="#3DDC97"/>
                                <circle cx="365" cy="101" r="6" fill="#FFD23F"/>
                                <rect x="164" y="120" width="202" height="94" rx="6" fill="#fff"/>
                                <path d="M 176 196 L 210 170 L 240 180 L 278 146 L 314 156 L 352 130" fill="none" stroke="#2F6BFF" stroke-width="5"/>
                                <circle cx="352" cy="130" r="7" fill="#3DDC97"/>

                                {{-- Laptop base --}}
                                <path d="M 118 240 L 412 240 L 398 260 L 132 260 Z" fill="#FFD23F"/>
                                <line x1="240" y1="250" x2="290" y2="250"/>

                                {{-- Card --}}
                                <g transform="rotate(-10 110 275)">
                                    <rect x="50" y="248" width="120" height="70" rx="8" fill="#2F6BFF"/>
                                    <rect x="64" y="262" width="24" height="18" rx="3" fill="#FFD23F"/>
                                    <circle cx="140" cy="270" r="9" fill="#FF5C5C"/>
                                    <circle cx="152" cy="270" r="9" fill="#FFD23F"/>
                                    <line x1="64" y1="300" x2="130" y2="300" stroke="#fff"/>
                                </g>

                                {{-- Coin stack --}}
                                <ellipse cx="450" cy="292" rx="28" ry="9" fill="#FFD23F"/>
                                <ellipse cx="450" cy="280" rx="28" ry="9" fill="#FFD23F"/>
                                <ellipse cx="450" cy="268" rx="28" ry="9" fill="#FFD23F"/>
                                <ellipse cx="450" cy="256" rx="28" ry="9" fill="#FFD23F"/>
                                <ellipse cx="450" cy="244" rx="28" ry="9" fill="#FFF3C4"/>

                                {{-- Plant --}}
                                <rect x="420" y="160" width="40" height="40" rx="5" fill="#FF8FB1"/>
                                <path d="M 440 160 C 440 130 420 125 412 120 M 440 160 C 440 130 462 128 470 118" fill="none"/>
                                <ellipse cx="413" cy="124" rx="12" ry="7" fill="#3DDC97"/>
                                <ellipse cx="468" cy="122" rx="12" ry="7" fill="#3DDC97"/>
                            </g>

                            {{-- Sparkles --}}
                            <path d="M 470 50 L 474 62 L 486 66 L 474 70 L 470 82 L 466 70 L 454 66 L 466 62 Z" fill="#FFD23F" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                            <path d="M 100 120 L 103 128 L 111 131 L 103 134 L 100 142 L 97 134 L 89 131 L 97 128 Z" fill="#3DDC97" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    {{-- Kartu Saldo --}}
                    <div class="absolute -top-5 left-0 xl:-left-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px nb-bc-black nb-bg-white p-3 nb-c-black nb-shadow-5px5px00000 -rotate-2 animate-float">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px nb-bc-black nb-bg-FFD23F">
                            <i data-lucide="wallet" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase tracking-wider nb-c-black-60">Saldo Terkelola</p>
                            <p class="text-sm font-black">Rp 32.450.000</p>
                        </div>
                    </div>

                    {{-- Kartu Pemasukan --}}
                    <div class="absolute -bottom-6 right-0 xl:-right-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px nb-bc-black nb-bg-3DDC97 p-3 nb-c-black nb-shadow-5px5px00000 rotate-3 animate-float-delayed">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px nb-bc-black nb-bg-white">
                            <i data-lucide="trending-up" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase tracking-wider">Pemasukan</p>
                            <p class="text-sm font-black">+Rp 8.500.000</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4 pt-5 nb-border-t-3px nb-bc-black text-xs font-bold">
                <div class="flex flex-wrap items-center gap-2 nb-c-black">
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 nb-bc-black nb-bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="shield-check" class="h-4 w-4"></i> Enkripsi 256-bit</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 nb-bc-black nb-bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="chart-no-axes-combined" class="h-4 w-4"></i> Visual Real-time</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 nb-bc-black nb-bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="wallet-cards" class="h-4 w-4"></i> Multi-Dompet</span>
                </div>
                <p>&copy; {{ date('Y') }} Monee. Hak cipta dilindungi.</p>
            </div>
        </div>

        {{-- ============================================================== --}}
        {{-- BAGIAN KANAN: FORM LOGIN                                       --}}
        {{-- ============================================================== --}}
        <div class="flex-1 flex flex-col justify-center px-5 py-10 sm:px-10 lg:px-12 xl:px-16">
            <div class="w-full max-w-md mx-auto">

                {{-- Brand Mobile --}}
                <div class="lg:hidden flex items-center gap-3 mb-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg nb-border-3px nb-bc-black nb-bg-2F6BFF nb-shadow-3px3px00000">
                        <span class="text-xl font-black nb-c-white">M</span>
                    </div>
                    <div>
                        <span class="text-xl font-black tracking-tight">Monee</span>
                        <p class="nb-text-10px font-black uppercase nb-tracking-0p2em nb-c-black-60">Finance Tracker</p>
                    </div>
                </div>

                <div class="rounded-2xl nb-border-3px nb-bc-black nb-bg-white p-6 sm:p-8 nb-shadow-8px8px00000">

                    {{-- Heading --}}
                    <div class="mb-6">
                        <span class="inline-block rounded-md border-2 nb-bc-black nb-bg-FFD23F px-2 py-0.5 nb-text-10px font-black uppercase tracking-widest mb-3">Selamat Datang</span>
                        <h2 class="text-3xl font-black tracking-tight">Masuk ke Akun</h2>
                        <p class="mt-1.5 text-sm font-medium nb-c-black-60">
                            Masukkan email dan password akun Monee Anda untuk melanjutkan.
                        </p>
                    </div>

                    {{-- Status --}}
                    @if (session('status'))
                        <div role="status" class="mb-6 flex items-center gap-3 rounded-lg nb-border-3px nb-bc-black nb-bg-3DDC97 p-4 text-sm font-bold nb-c-black nb-shadow-4px4px00000">
                            <i data-lucide="check-circle" class="h-5 w-5 shrink-0"></i>
                            <span>{{ session('status') }}</span>
                        </div>
                    @endif

                    {{-- Validasi --}}
                    @if ($errors->any())
                        <div role="alert" class="mb-6 flex items-start gap-3 rounded-lg nb-border-3px nb-bc-black nb-bg-FF5C5C p-4 text-sm nb-c-black nb-shadow-4px4px00000">
                            <i data-lucide="alert-triangle" class="h-5 w-5 shrink-0 mt-0.5"></i>
                            <div class="flex-1">
                                <p class="font-black">Gagal Masuk</p>
                                <p class="mt-0.5 text-xs font-semibold">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('login') }}"
                          x-data="{ showPassword: false, loading: false }"
                          @submit="loading = true"
                          class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-xs font-black uppercase tracking-wider">Alamat Email</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="mail" class="h-5 w-5"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                       required autofocus autocomplete="username"
                                       placeholder="nama@email.com"
                                       @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                                       class="{{ $inputBase }} pr-4 {{ $inputState('email') }}">
                            </div>
                            @error('email')
                                <p id="email-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password" class="block text-xs font-black uppercase tracking-wider">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-xs font-black underline nb-decoration-2F6BFF underline-offset-4 nb-hover-bg-FFD23F hover:no-underline px-1 rounded transition">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="lock" class="h-5 w-5"></i>
                                </div>
                                <input id="password" :type="showPassword ? 'text' : 'password'" type="password"
                                       name="password"
                                       required autocomplete="current-password"
                                       placeholder="Masukkan password"
                                       @error('password') aria-invalid="true" aria-describedby="password-error" @enderror
                                       class="{{ $inputBase }} pr-12 {{ $inputState('password') }}">
                                <button type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-2 z-10 my-auto flex h-8 w-8 items-center justify-center rounded-md border-2 border-transparent nb-h-bc-black nb-hover-bg-FFD23F nb-fv-bc-black nb-focus-visible-bg-FFD23F focus:outline-none transition"
                                        :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'">
                                    <i x-show="!showPassword" data-lucide="eye" class="h-4 w-4"></i>
                                    <i x-show="showPassword" data-lucide="eye-off" class="h-4 w-4" style="display: none;"></i>
                                </button>
                            </div>
                            @error('password')
                                <p id="password-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <label for="remember_me" class="flex cursor-pointer items-center gap-3 pt-1">
                            <input id="remember_me" type="checkbox" name="remember" class="nb-checkbox">
                            <span class="select-none text-sm font-bold">Ingat saya di perangkat ini</span>
                        </label>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit"
                                    :disabled="loading"
                                    class="nb-btn w-full inline-flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bc-black nb-bg-2F6BFF px-6 py-3.5 text-sm font-black uppercase tracking-wider nb-c-white nb-shadow-5px5px00000 focus:outline-none focus-visible:ring-4 nb-focus-visible-ring-FFD23F">
                                <span x-show="!loading" class="flex items-center gap-2">
                                    <span>Masuk ke Akun</span>
                                    <i data-lucide="arrow-right" class="h-4 w-4"></i>
                                </span>
                                <span x-show="loading" class="flex items-center gap-2" style="display: none;">
                                    <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Memproses...</span>
                                </span>
                            </button>
                        </div>
                    </form>

                    {{-- Link ke Register --}}
                    <div class="mt-6 pt-5 nb-border-t-3px border-dashed nb-bc-black text-center">
                        <p class="text-sm font-medium">
                            Belum memiliki akun Monee?
                            <a href="{{ route('register') }}"
                               class="ml-1 font-black underline nb-decoration-3px nb-decoration-FFD23F underline-offset-4 nb-hover-bg-FFD23F hover:no-underline px-1 rounded transition">
                                Daftar Sekarang
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Keamanan --}}
                <div class="mt-6 flex items-center justify-center gap-2 text-xs font-bold nb-c-black-70">
                    <i data-lucide="lock" class="h-4 w-4"></i>
                    <span>Koneksi aman dengan enkripsi 256-bit SSL</span>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>