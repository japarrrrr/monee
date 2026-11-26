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
        .nb-text-C81E1E{color:#C81E1E}
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
        .nb-hover-bg-FFD23F:hover{background-color:#FFD23F}
        .nb-focus-visible-ring-FFD23F:focus-visible{--tw-ring-color:#FFD23F}
        .nb-input{transition:all .15s}
        .nb-input:focus{outline:none;background-color:#FFF3C4;translate:2px 2px;box-shadow:2px 2px 0 0 #000;border-color:#000}
        .nb-btn{transition:all .15s}
        .nb-btn:hover{translate:2px 2px;box-shadow:3px 3px 0 0 #000}
        .nb-btn:active{translate:5px 5px;box-shadow:none}
        .nb-btn:disabled{translate:0 0;box-shadow:5px 5px 0 0 #000;cursor:not-allowed;opacity:.7}
        .nb-btn-ghost{transition:all .15s}
        .nb-btn-ghost:hover{background-color:#FFD23F;translate:2px 2px;box-shadow:1px 1px 0 0 #000}
        .-top-5{top:-1.25rem}.rotate-3{rotate:3deg}
        @media (min-width:1280px){.xl\:-right-2{right:-.5rem}.xl\:-left-2{left:-.5rem}}
        @keyframes nb-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
        .animate-float{animation:nb-float 4s ease-in-out infinite}
        .animate-float-delayed{animation:nb-float 4s ease-in-out 1.5s infinite}
        @media (prefers-reduced-motion:reduce){.animate-float,.animate-float-delayed,.animate-pulse{animation:none}}
    </style>

    @section('title', 'Lupa Password')

    <div class="min-h-screen flex flex-col lg:flex-row nb-bg-FFF8E7 text-black">

        {{-- ============================================================== --}}
        {{-- BAGIAN KIRI: BRANDING NEO BRUTALISM (Desktop)                  --}}
        {{-- ============================================================== --}}
        <div class="relative hidden lg:flex lg:w-7/12 nb-bg-FF8FB1 text-black nb-border-r-3px border-black flex-col justify-between p-10 xl:p-14 overflow-hidden">

            {{-- Grid pattern --}}
            <div class="pointer-events-none absolute inset-0 nb-opacity-0p15"
                 style="background-image: linear-gradient(#000 1.5px, transparent 1.5px), linear-gradient(90deg, #000 1.5px, transparent 1.5px); background-size: 40px 40px;"></div>

            {{-- Header --}}
            <div class="relative z-10 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg nb-border-3px border-black nb-bg-2F6BFF nb-shadow-4px4px00000 transition-transform group-hover:-rotate-6">
                        <span class="text-2xl font-black text-white">M</span>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-tight">Monee</span>
                        <p class="nb-text-10px font-black uppercase nb-tracking-0p25em">Finance Tracker</p>
                    </div>
                </a>

                <div class="inline-flex items-center gap-2 rounded-full nb-border-3px border-black bg-white px-4 py-1.5 text-xs font-black uppercase tracking-wide nb-shadow-3px3px00000">
                    <span class="h-2.5 w-2.5 rounded-full border-2 border-black nb-bg-3DDC97 animate-pulse"></span>
                    <span>Pemulihan Akun</span>
                </div>
            </div>

            {{-- Hero --}}
            <div class="relative z-10 my-auto py-6">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 rounded-md nb-border-3px border-black nb-bg-FFD23F px-3 py-1 text-xs font-black uppercase tracking-wide mb-5 nb-shadow-3px3px00000 -rotate-1">
                        <i data-lucide="key-round" class="h-3.5 w-3.5"></i>
                        <span>Reset Password</span>
                    </div>

                    <h1 class="text-4xl xl:text-5xl 2xl:text-6xl font-black tracking-tight nb-leading-1p05">
                        Lupa Password?
                        <span class="mt-2 inline-block -rotate-1 rounded-lg nb-border-3px border-black nb-bg-2F6BFF px-3 py-1 text-white nb-shadow-5px5px00000">
                            Tenang Saja.
                        </span>
                    </h1>

                    <p class="mt-5 text-sm xl:text-base font-semibold leading-relaxed max-w-lg">
                        Kami akan mengirimkan link reset ke email Anda agar Anda bisa kembali mengelola keuangan dengan aman.
                    </p>
                </div>

                {{-- Ilustrasi --}}
                <div class="relative mt-12 max-w-xl">
                    <div class="relative z-10 w-full nb-max-w-480px mx-auto rounded-2xl nb-border-3px border-black nb-bg-FFF8E7 p-4 nb-shadow-8px8px00000">
                        <svg viewBox="0 0 520 320" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" role="img" aria-label="Ilustrasi amplop berisi kunci untuk reset password">
                            <g stroke="#000" stroke-width="3" stroke-linejoin="round" stroke-linecap="round">
                                <line x1="30" y1="290" x2="490" y2="290"/>

                                {{-- Amplop --}}
                                <rect x="130" y="110" width="260" height="170" rx="12" fill="#FFD23F"/>
                                {{-- Surat --}}
                                <rect x="160" y="60" width="200" height="150" rx="8" fill="#fff"/>
                                <rect x="180" y="80" width="90" height="12" rx="4" fill="#2F6BFF"/>
                                <rect x="180" y="104" width="150" height="8" rx="4" fill="#000"/>
                                <rect x="180" y="122" width="120" height="8" rx="4" fill="#000"/>
                                <rect x="180" y="148" width="100" height="26" rx="6" fill="#3DDC97"/>
                                {{-- Lipatan depan --}}
                                <path d="M 130 150 L 260 225 L 390 150 L 390 268 Q 390 280 378 280 L 142 280 Q 130 280 130 268 Z" fill="#FFD23F"/>
                                <path d="M 130 280 L 230 205 M 390 280 L 290 205" fill="none"/>

                                {{-- Kunci --}}
                                <g transform="rotate(-25 440 150)">
                                    <circle cx="440" cy="110" r="26" fill="#2F6BFF"/>
                                    <circle cx="440" cy="110" r="9" fill="#FFF8E7"/>
                                    <rect x="434" y="134" width="12" height="80" rx="3" fill="#2F6BFF"/>
                                    <rect x="446" y="180" width="18" height="10" rx="2" fill="#2F6BFF"/>
                                    <rect x="446" y="198" width="12" height="10" rx="2" fill="#2F6BFF"/>
                                </g>

                                {{-- Gembok --}}
                                <path d="M 66 200 L 66 180 Q 66 160 86 160 Q 106 160 106 180 L 106 200" fill="none"/>
                                <rect x="54" y="200" width="64" height="56" rx="8" fill="#FF5C5C"/>
                                <circle cx="86" cy="224" r="6" fill="#000"/>
                                <line x1="86" y1="228" x2="86" y2="240"/>
                            </g>

                            {{-- Sparkles --}}
                            <path d="M 470 240 L 474 252 L 486 256 L 474 260 L 470 272 L 466 260 L 454 256 L 466 252 Z" fill="#FFD23F" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                            <path d="M 100 70 L 103 78 L 111 81 L 103 84 L 100 92 L 97 84 L 89 81 L 97 78 Z" fill="#3DDC97" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    {{-- Kartu Email --}}
                    <div class="absolute -top-5 left-0 xl:-left-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px border-black bg-white p-3 nb-shadow-5px5px00000 -rotate-2 animate-float">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px border-black nb-bg-FFD23F">
                            <i data-lucide="mail-check" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase tracking-wider text-black/60">Link Terkirim</p>
                            <p class="text-sm font-black">Cek Inbox Anda</p>
                        </div>
                    </div>

                    {{-- Kartu Aman --}}
                    <div class="absolute -bottom-6 right-0 xl:-right-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px border-black nb-bg-3DDC97 p-3 nb-shadow-5px5px00000 rotate-3 animate-float-delayed">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px border-black bg-white">
                            <i data-lucide="shield-check" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase tracking-wider">Berlaku</p>
                            <p class="text-sm font-black">60 Menit</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4 pt-5 nb-border-t-3px border-black text-xs font-bold">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="shield-check" class="h-4 w-4"></i> Link Sekali Pakai</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="timer" class="h-4 w-4"></i> Kedaluwarsa Otomatis</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="lock" class="h-4 w-4"></i> Data Terlindungi</span>
                </div>
                <p>&copy; {{ date('Y') }} Monee. Hak cipta dilindungi.</p>
            </div>
        </div>

        {{-- ============================================================== --}}
        {{-- BAGIAN KANAN: FORM LUPA PASSWORD                               --}}
        {{-- ============================================================== --}}
        <div class="flex-1 flex flex-col justify-center px-5 py-10 sm:px-10 lg:px-12 xl:px-16">
            <div class="w-full max-w-md mx-auto">

                {{-- Brand Mobile --}}
                <div class="lg:hidden flex items-center gap-3 mb-6">
                    <div class="flex h-11 w-11 items-center justify-center rounded-lg nb-border-3px border-black nb-bg-2F6BFF nb-shadow-3px3px00000">
                        <span class="text-xl font-black text-white">M</span>
                    </div>
                    <div>
                        <span class="text-xl font-black tracking-tight">Monee</span>
                        <p class="nb-text-10px font-black uppercase nb-tracking-0p2em text-black/60">Finance Tracker</p>
                    </div>
                </div>

                <div class="rounded-2xl nb-border-3px border-black bg-white p-6 sm:p-8 nb-shadow-8px8px00000">

                    {{-- Heading --}}
                    <div class="mb-6">
                        <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-xl nb-border-3px border-black nb-bg-FF8FB1 nb-shadow-4px4px00000 -rotate-3">
                            <i data-lucide="key-round" class="h-7 w-7"></i>
                        </div>
                        <h2 class="text-3xl font-black tracking-tight">Lupa Password</h2>
                        <p class="mt-1.5 text-sm font-medium text-black/60">
                            Masukkan alamat email akun Monee Anda. Kami akan mengirimkan link untuk membuat password baru.
                        </p>
                    </div>

                    {{-- Status --}}
                    @if (session('status'))
                        <div role="status" class="mb-6 flex items-start gap-3 rounded-lg nb-border-3px border-black nb-bg-3DDC97 p-4 text-sm text-black nb-shadow-4px4px00000">
                            <i data-lucide="mail-check" class="h-5 w-5 shrink-0 mt-0.5"></i>
                            <div class="flex-1">
                                <p class="font-black">Link Terkirim</p>
                                <p class="mt-0.5 text-xs font-semibold">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('password.email') }}"
                          x-data="{ loading: false }"
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
                                       required autofocus autocomplete="email"
                                       placeholder="nama@email.com"
                                       @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                                       class="nb-input w-full rounded-lg nb-border-3px border-black py-3 pl-11 pr-4 text-sm font-semibold text-black placeholder:font-medium placeholder:text-black/40 focus:ring-0 @error('email') nb-bg-FFE4E4 nb-shadow-4px4px00E11D48 @else bg-white nb-shadow-4px4px00000 @enderror">
                            </div>
                            @error('email')
                                <p id="email-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit"
                                    :disabled="loading"
                                    class="nb-btn w-full inline-flex items-center justify-center gap-2 rounded-lg nb-border-3px border-black nb-bg-2F6BFF px-6 py-3.5 text-sm font-black uppercase tracking-wider text-white nb-shadow-5px5px00000 focus:outline-none focus-visible:ring-4 nb-focus-visible-ring-FFD23F">
                                <span x-show="!loading" class="flex items-center gap-2">
                                    <span>Kirim Link Reset</span>
                                    <i data-lucide="send" class="h-4 w-4"></i>
                                </span>
                                <span x-show="loading" class="flex items-center gap-2" style="display: none;">
                                    <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Mengirim...</span>
                                </span>
                            </button>
                        </div>
                    </form>

                    {{-- Kembali ke Login --}}
                    <div class="mt-6 pt-5 nb-border-t-3px border-dashed border-black">
                        <a href="{{ route('login') }}"
                           class="nb-btn-ghost w-full inline-flex items-center justify-center gap-2 rounded-lg nb-border-3px border-black bg-white px-6 py-3 text-sm font-black uppercase tracking-wider nb-shadow-3px3px00000 focus:outline-none focus-visible:ring-4 nb-focus-visible-ring-FFD23F">
                            <i data-lucide="arrow-left" class="h-4 w-4"></i>
                            <span>Kembali ke Login</span>
                        </a>
                        <p class="mt-4 text-center text-sm font-medium">
                            Belum memiliki akun?
                            <a href="{{ route('register') }}"
                               class="ml-1 font-black underline nb-decoration-3px nb-decoration-FFD23F underline-offset-4 nb-hover-bg-FFD23F hover:no-underline px-1 rounded transition">
                                Daftar Sekarang
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Info --}}
                <div class="mt-6 flex items-center justify-center gap-2 text-xs font-bold text-black/70">
                    <i data-lucide="info" class="h-4 w-4"></i>
                    <span>Tidak menerima email? Periksa folder spam Anda.</span>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>