<x-guest-layout>
    {{-- Gaya neo brutalism mandiri: tetap tampil walau Tailwind belum di-rebuild --}}
    <style>
        .nb-border-3px{border-width:3px;border-style:solid}
        .nb-bg-FFE4E4{background-color:#FFE4E4}
        .nb-shadow-4px4px00E11D48{box-shadow:4px 4px 0 0 #E11D48}
        .nb-shadow-4px4px00000{box-shadow:4px 4px 0 0 #000}
        .nb-bg-FFF8E7{background-color:#FFF8E7}
        .nb-bg-FFD23F{background-color:#FFD23F}
        .nb-border-r-3px{border-right-width:3px;border-style:solid}
        .nb-opacity-0p12{opacity:0.12}
        .nb-bg-2F6BFF{background-color:#2F6BFF}
        .nb-text-10px{font-size:10px}
        .nb-tracking-0p25em{letter-spacing:0.25em}
        .nb-shadow-3px3px00000{box-shadow:3px 3px 0 0 #000}
        .nb-bg-3DDC97{background-color:#3DDC97}
        .nb-leading-1p05{line-height:1.05}
        .nb-shadow-5px5px00000{box-shadow:5px 5px 0 0 #000}
        .nb-max-w-480px{max-width:480px}
        .nb-shadow-8px8px00000{box-shadow:8px 8px 0 0 #000}
        .nb-bg-FF8FB1{background-color:#FF8FB1}
        .nb-border-t-3px{border-top-width:3px;border-style:solid}
        .nb-shadow-2px2px00000{box-shadow:2px 2px 0 0 #000}
        .nb-tracking-0p2em{letter-spacing:0.2em}
        .nb-bg-FF5C5C{background-color:#FF5C5C}
        .nb-text-C81E1E{color:#C81E1E}
        .nb-text-9A6B00{color:#9A6B00}
        .nb-text-2F6BFF{color:#2F6BFF}
        .nb-text-0E8A55{color:#0E8A55}
        .nb-text-11px{font-size:11px}
        .nb-decoration-3px{text-decoration-thickness:3px}
        .nb-decoration-FFD23F{text-decoration-color:#FFD23F}
        .nb-focus-bg-FFF3C4:focus{background-color:#FFF3C4}
        .nb-focus-translate-x-2px:focus{--nb-tx:2px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-focus-translate-y-2px:focus{--nb-ty:2px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-focus-shadow-2px2px00000:focus{box-shadow:2px 2px 0 0 #000}
        .nb-hover-bg-FFD23F:hover{background-color:#FFD23F}
        .nb-focus-visible-bg-FFD23F:focus-visible{background-color:#FFD23F}
        .nb-hover-translate-x-2px:hover{--nb-tx:2px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-hover-translate-y-2px:hover{--nb-ty:2px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-hover-shadow-3px3px00000:hover{box-shadow:3px 3px 0 0 #000}
        .nb-active-translate-x-5px:active{--nb-tx:5px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-active-translate-y-5px:active{--nb-ty:5px;translate:var(--nb-tx,0) var(--nb-ty,0)}
        .nb-focus-visible-ring-FFD23F:focus-visible{--tw-ring-color:#FFD23F}
.right-2{right:.5rem}.pr-12{padding-right:3rem}.-top-5{top:-1.25rem}.rotate-3{rotate:3deg}
@media (min-width:1280px){.xl\:-right-2{right:-.5rem}}
.nb-input:focus{outline:none;box-shadow:2px 2px 0 0 #000}
button:disabled{translate:0 0 !important}
@keyframes nb-float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
.animate-float{animation:nb-float 4s ease-in-out infinite}
@media (prefers-reduced-motion:reduce){.animate-float,.animate-pulse{animation:none}}
    </style>

    @section('title', 'Daftar Akun Baru')

    @php
        $inputBase = 'w-full rounded-lg nb-border-3px border-black py-3 pl-11 text-sm font-semibold text-black placeholder:font-medium placeholder:text-black/40 transition-all duration-150 focus:outline-none focus:ring-0 focus:border-black nb-focus-bg-FFF3C4 nb-focus-translate-x-2px nb-focus-translate-y-2px nb-focus-shadow-2px2px00000';
        $inputState = fn ($field) => $errors->has($field)
            ? 'nb-bg-FFE4E4 nb-shadow-4px4px00E11D48'
            : 'bg-white nb-shadow-4px4px00000';
    @endphp

    <div class="min-h-screen flex flex-col lg:flex-row nb-bg-FFF8E7 text-black">

        {{-- ============================================================== --}}
        {{-- BAGIAN KIRI: BRANDING NEO BRUTALISM (Desktop)                  --}}
        {{-- ============================================================== --}}
        <div class="relative hidden lg:flex lg:w-7/12 nb-bg-FFD23F nb-border-r-3px border-black flex-col justify-between p-10 xl:p-14 overflow-hidden">

            {{-- Grid pattern --}}
            <div class="pointer-events-none absolute inset-0 nb-opacity-0p12"
                 style="background-image: linear-gradient(#000 1.5px, transparent 1.5px), linear-gradient(90deg, #000 1.5px, transparent 1.5px); background-size: 40px 40px;"></div>

            {{-- Top Branding Header --}}
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
                    <span>Awal Baru Finansial</span>
                </div>
            </div>

            {{-- Center Hero Content --}}
            <div class="relative z-10 my-auto py-6">

                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 rounded-md nb-border-3px border-black nb-bg-3DDC97 px-3 py-1 text-xs font-black uppercase tracking-wide mb-5 nb-shadow-3px3px00000 -rotate-1">
                        <i data-lucide="sparkles" class="h-3.5 w-3.5"></i>
                        <span>Langkah Awal Cerdas Finansial</span>
                    </div>

                    <h1 class="text-4xl xl:text-5xl 2xl:text-6xl font-black tracking-tight nb-leading-1p05">
                        Mulai Perjalanan
                        <span class="mt-2 inline-block rotate-1 rounded-lg nb-border-3px border-black nb-bg-2F6BFF px-3 py-1 text-white nb-shadow-5px5px00000">
                            Finansialmu.
                        </span>
                    </h1>

                    <p class="mt-5 text-sm xl:text-base font-medium leading-relaxed max-w-lg">
                        Buat akun Monee dan mulai kelola keuangan pribadi dengan lebih teratur, praktis, dan terencana.
                    </p>
                </div>

                {{-- Illustration --}}
                <div class="relative mt-8 max-w-xl">
                    <div class="relative z-10 w-full nb-max-w-480px mx-auto rounded-2xl nb-border-3px border-black nb-bg-FFF8E7 p-4 nb-shadow-8px8px00000">
                        <svg viewBox="0 0 520 340" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" role="img" aria-label="Ilustrasi pengguna memulai target keuangan dengan aplikasi Monee">
                            <g stroke="#000" stroke-width="3" stroke-linejoin="round" stroke-linecap="round">
                                {{-- Ground --}}
                                <line x1="30" y1="300" x2="490" y2="300"/>

                                {{-- Stepping blocks --}}
                                <rect x="60" y="250" width="50" height="50" rx="6" fill="#FF8FB1"/>
                                <rect x="120" y="205" width="50" height="95" rx="6" fill="#3DDC97"/>
                                <rect x="180" y="160" width="50" height="140" rx="6" fill="#FFD23F"/>

                                {{-- Trajectory --}}
                                <path d="M 80 230 Q 140 160 205 125" fill="none" stroke-dasharray="8 8"/>
                                <path d="M 192 118 L 207 124 L 199 138" fill="none"/>

                                {{-- Smartphone --}}
                                <rect x="245" y="60" width="130" height="235" rx="20" fill="#111"/>
                                <rect x="255" y="74" width="110" height="208" rx="12" fill="#FFF8E7"/>
                                <rect x="292" y="66" width="36" height="4" rx="2" fill="#FFF8E7" stroke="none"/>

                                {{-- Phone UI --}}
                                <rect x="265" y="88" width="90" height="38" rx="6" fill="#2F6BFF"/>
                                <circle cx="281" cy="107" r="8" fill="#FFD23F"/>
                                <line x1="296" y1="101" x2="342" y2="101" stroke="#fff"/>
                                <line x1="296" y1="113" x2="326" y2="113" stroke="#fff"/>

                                <circle cx="310" cy="170" r="24" fill="#fff"/>
                                <path d="M 310 146 A 24 24 0 1 1 286 170" fill="none" stroke="#3DDC97" stroke-width="8" stroke-linecap="butt"/>
                                <circle cx="310" cy="170" r="24" fill="none"/>
                                <circle cx="310" cy="170" r="6" fill="#000"/>

                                <rect x="265" y="212" width="90" height="14" rx="4" fill="#fff"/>
                                <rect x="265" y="234" width="90" height="14" rx="4" fill="#FF8FB1"/>
                                <rect x="265" y="256" width="90" height="14" rx="4" fill="#fff"/>

                                {{-- Character --}}
                                <path d="M 410 255 L 405 298 M 430 255 L 440 298" stroke-width="10"/>
                                <path d="M 395 190 C 395 176, 445 176, 445 190 L 440 262 L 400 262 Z" fill="#2F6BFF"/>
                                <path d="M 400 205 Q 378 214 372 196" stroke-width="10" fill="none"/>
                                <path d="M 438 205 Q 455 178 462 152" stroke-width="10" fill="none"/>
                                <circle cx="420" cy="152" r="19" fill="#FFD9A8"/>
                                <path d="M 401 152 C 401 132, 439 132, 439 150 C 432 142, 412 142, 401 152 Z" fill="#000"/>

                                {{-- Target --}}
                                <circle cx="470" cy="122" r="24" fill="#FF5C5C"/>
                                <circle cx="470" cy="122" r="15" fill="#fff"/>
                                <circle cx="470" cy="122" r="6" fill="#FF5C5C"/>

                                {{-- Coins --}}
                                <ellipse cx="135" cy="190" rx="18" ry="7" fill="#FFD23F"/>
                                <ellipse cx="135" cy="182" rx="18" ry="7" fill="#FFD23F"/>
                            </g>

                            {{-- Sparkles --}}
                            <path d="M 440 60 L 444 72 L 456 76 L 444 80 L 440 92 L 436 80 L 424 76 L 436 72 Z" fill="#FFD23F" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                            <path d="M 215 50 L 218 58 L 226 61 L 218 64 L 215 72 L 212 64 L 204 61 L 212 58 Z" fill="#3DDC97" stroke="#000" stroke-width="2.5" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    {{-- Floating Card: Target Tabungan --}}
                    <div class="absolute -top-5 right-0 xl:-right-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px border-black bg-white p-3 nb-shadow-5px5px00000 rotate-3 animate-float">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px border-black nb-bg-FFD23F">
                            <i data-lucide="target" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase tracking-wider text-black/60">Target Tabungan</p>
                            <p class="text-sm font-black">Rp 20.000.000</p>
                        </div>
                    </div>

                    {{-- Floating Card: Multi-Dompet --}}
                    <div class="absolute -bottom-6 left-0 xl:-left-2 z-20 flex items-center gap-3 rounded-xl nb-border-3px border-black nb-bg-FF8FB1 p-3 nb-shadow-5px5px00000 -rotate-2 animate-float-delayed">
                        <div class="flex h-9 w-9 items-center justify-center rounded-md nb-border-3px border-black bg-white">
                            <i data-lucide="wallet-cards" class="h-4 w-4"></i>
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5">
                                <span class="nb-text-10px font-black uppercase tracking-wider">Multi-Dompet</span>
                                <span class="rounded border-2 border-black nb-bg-3DDC97 px-1.5 nb-text-10px font-black">Aktif</span>
                            </div>
                            <p class="text-xs font-bold">Bank · Tunai · E-Wallet</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom Features & Copyright --}}
            <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4 pt-5 nb-border-t-3px border-black text-xs font-bold">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="shield-check" class="h-4 w-4"></i> Bebas Biaya</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="chart-no-axes-combined" class="h-4 w-4"></i> Laporan Otomatis</span>
                    <span class="inline-flex items-center gap-1.5 rounded-md border-2 border-black bg-white px-2.5 py-1 nb-shadow-2px2px00000"><i data-lucide="zap" class="h-4 w-4"></i> Siap dalam 1 Menit</span>
                </div>
                <p>&copy; {{ date('Y') }} Monee. Hak cipta dilindungi.</p>
            </div>
        </div>

        {{-- ============================================================== --}}
        {{-- BAGIAN KANAN: FORM REGISTER                                    --}}
        {{-- ============================================================== --}}
        <div class="flex-1 flex flex-col justify-center px-5 py-10 sm:px-10 lg:px-12 xl:px-16">

            <div class="w-full max-w-md mx-auto">

                {{-- Mobile Brand Header --}}
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

                    {{-- Form Heading --}}
                    <div class="mb-6">
                        <span class="inline-block rounded-md border-2 border-black nb-bg-FFD23F px-2 py-0.5 nb-text-10px font-black uppercase tracking-widest mb-3">Daftar Gratis</span>
                        <h2 class="text-3xl font-black tracking-tight">Buat Akun Baru</h2>
                        <p class="mt-1.5 text-sm font-medium text-black/60">
                            Daftar sekarang untuk mulai mencatat dan mengelola keuangan Anda.
                        </p>
                    </div>

                    {{-- Global Validation Alert --}}
                    @if ($errors->any())
                        <div role="alert" class="mb-6 flex items-start gap-3 rounded-lg nb-border-3px border-black nb-bg-FF5C5C p-4 text-sm text-black nb-shadow-4px4px00000">
                            <i data-lucide="alert-triangle" class="h-5 w-5 shrink-0 mt-0.5"></i>
                            <div class="flex-1">
                                <p class="font-black">Pendaftaran Belum Lengkap</p>
                                <p class="mt-0.5 text-xs font-semibold">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('register') }}"
                          x-data="{
                              password: '',
                              passwordConfirmation: '',
                              showPassword: false,
                              showConfirmPassword: false,
                              loading: false,

                              get strengthScore() {
                                  if (!this.password) return 0;
                                  let score = 0;
                                  if (this.password.length >= 8) score++;
                                  if (/[A-Z]/.test(this.password)) score++;
                                  if (/[0-9]/.test(this.password)) score++;
                                  if (/[^A-Za-z0-9]/.test(this.password)) score++;
                                  return score;
                              },

                              get strengthLabel() {
                                  if (!this.password) return '';
                                  if (this.strengthScore <= 1) return 'Lemah (min. 8 karakter)';
                                  if (this.strengthScore === 2) return 'Cukup Baik';
                                  if (this.strengthScore === 3) return 'Kuat';
                                  return 'Sangat Kuat & Aman';
                              },

                              get strengthColor() {
                                  if (this.strengthScore <= 1) return 'nb-bg-FF5C5C nb-text-C81E1E';
                                  if (this.strengthScore === 2) return 'nb-bg-FFD23F nb-text-9A6B00';
                                  if (this.strengthScore === 3) return 'nb-bg-2F6BFF nb-text-2F6BFF';
                                  return 'nb-bg-3DDC97 nb-text-0E8A55';
                              }
                          }"
                          @submit="loading = true"
                          class="space-y-5">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="name" class="mb-2 block text-xs font-black uppercase tracking-wider">Nama Lengkap</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="user" class="h-5 w-5"></i>
                                </div>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                       required autofocus autocomplete="name"
                                       placeholder="Contoh: Budi Santoso"
                                       @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                                       class="{{ $inputBase }} pr-4 {{ $inputState('name') }}">
                            </div>
                            @error('name')
                                <p id="name-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-xs font-black uppercase tracking-wider">Alamat Email</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="mail" class="h-5 w-5"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="username"
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
                            <label for="password" class="mb-2 block text-xs font-black uppercase tracking-wider">Password</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="lock" class="h-5 w-5"></i>
                                </div>
                                <input id="password" :type="showPassword ? 'text' : 'password'" type="password"
                                       name="password" x-model="password"
                                       required autocomplete="new-password"
                                       placeholder="Minimal 8 karakter"
                                       @error('password') aria-invalid="true" aria-describedby="password-error" @enderror
                                       class="{{ $inputBase }} pr-12 {{ $inputState('password') }}">
                                <button type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-2 my-auto flex h-8 w-8 items-center justify-center rounded-md border-2 border-transparent hover:border-black nb-hover-bg-FFD23F focus-visible:border-black nb-focus-visible-bg-FFD23F focus:outline-none transition"
                                        :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'">
                                    <i x-show="!showPassword" data-lucide="eye" class="h-4 w-4"></i>
                                    <i x-show="showPassword" data-lucide="eye-off" class="h-4 w-4" style="display: none;"></i>
                                </button>
                            </div>

                            {{-- Strength Indicator --}}
                            <div x-show="password.length > 0" x-transition class="mt-3" style="display: none;">
                                <div class="mb-1.5 flex items-center justify-between nb-text-11px font-black uppercase tracking-wide">
                                    <span class="text-black/60">Kekuatan Password</span>
                                    <span :class="strengthColor.split(' ')[1]" x-text="strengthLabel" aria-live="polite"></span>
                                </div>
                                <div class="grid grid-cols-4 gap-1.5">
                                    <template x-for="i in 4" :key="i">
                                        <div class="h-2.5 rounded-sm border-2 border-black transition-all duration-200"
                                             :class="strengthScore >= i ? strengthColor.split(' ')[0] : 'bg-white'"></div>
                                    </template>
                                </div>
                            </div>

                            @error('password')
                                <p id="password-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div>
                            <label for="password_confirmation" class="mb-2 block text-xs font-black uppercase tracking-wider">Konfirmasi Password</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 z-10 flex items-center pl-4">
                                    <i data-lucide="lock-keyhole" class="h-5 w-5"></i>
                                </div>
                                <input id="password_confirmation" :type="showConfirmPassword ? 'text' : 'password'" type="password"
                                       name="password_confirmation" x-model="passwordConfirmation"
                                       required autocomplete="new-password"
                                       placeholder="Ulangi password di atas"
                                       @error('password_confirmation') aria-invalid="true" aria-describedby="password-confirmation-error" @enderror
                                       class="{{ $inputBase }} pr-12 {{ $inputState('password_confirmation') }}">
                                <button type="button"
                                        @click="showConfirmPassword = !showConfirmPassword"
                                        class="absolute inset-y-0 right-2 my-auto flex h-8 w-8 items-center justify-center rounded-md border-2 border-transparent hover:border-black nb-hover-bg-FFD23F focus-visible:border-black nb-focus-visible-bg-FFD23F focus:outline-none transition"
                                        :aria-label="showConfirmPassword ? 'Sembunyikan password' : 'Tampilkan password'">
                                    <i x-show="!showConfirmPassword" data-lucide="eye" class="h-4 w-4"></i>
                                    <i x-show="showConfirmPassword" data-lucide="eye-off" class="h-4 w-4" style="display: none;"></i>
                                </button>
                            </div>

                            {{-- Match Feedback --}}
                            <div x-show="passwordConfirmation.length > 0" x-transition class="mt-2" style="display: none;" aria-live="polite">
                                <span x-show="password === passwordConfirmation"
                                      class="inline-flex items-center gap-1 rounded-md border-2 border-black nb-bg-3DDC97 px-2 py-0.5 text-xs font-black">
                                    <i data-lucide="check-circle" class="h-3.5 w-3.5"></i> Password cocok
                                </span>
                                <span x-show="password !== passwordConfirmation"
                                      class="inline-flex items-center gap-1 rounded-md border-2 border-black nb-bg-FFE4E4 px-2 py-0.5 text-xs font-black nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i> Password belum sesuai
                                </span>
                            </div>

                            @error('password_confirmation')
                                <p id="password-confirmation-error" class="mt-2 flex items-center gap-1 text-xs font-bold nb-text-C81E1E">
                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit"
                                    :disabled="loading"
                                    class="w-full inline-flex items-center justify-center gap-2 rounded-lg nb-border-3px border-black nb-bg-2F6BFF px-6 py-3.5 text-sm font-black uppercase tracking-wider text-white nb-shadow-5px5px00000 transition-all duration-150 nb-hover-translate-x-2px nb-hover-translate-y-2px nb-hover-shadow-3px3px00000 nb-active-translate-x-5px nb-active-translate-y-5px active:shadow-none focus:outline-none focus-visible:ring-4 nb-focus-visible-ring-FFD23F disabled:cursor-not-allowed disabled:opacity-70 disabled:translate-x-0 disabled:translate-y-0">
                                <span x-show="!loading" class="flex items-center gap-2">
                                    <span>Buat Akun Saya</span>
                                    <i data-lucide="arrow-right" class="h-4 w-4"></i>
                                </span>
                                <span x-show="loading" class="flex items-center gap-2" style="display: none;">
                                    <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-90" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Mendaftarkan akun...</span>
                                </span>
                            </button>
                        </div>
                    </form>

                    {{-- Link ke Login --}}
                    <div class="mt-6 pt-5 nb-border-t-3px border-dashed border-black text-center">
                        <p class="text-sm font-medium">
                            Sudah memiliki akun Monee?
                            <a href="{{ route('login') }}"
                               class="ml-1 font-black underline nb-decoration-3px nb-decoration-FFD23F underline-offset-4 nb-hover-bg-FFD23F hover:no-underline px-1 rounded transition">
                                Masuk di Sini
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Security footnote --}}
                <div class="mt-6 flex items-center justify-center gap-2 text-xs font-bold text-black/70">
                    <i data-lucide="shield-check" class="h-4 w-4"></i>
                    <span>Pendaftaran aman dan privasi data terjamin</span>
                </div>

            </div>
        </div>

    </div>
</x-guest-layout>