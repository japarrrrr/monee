<x-app-layout>
    <style>
        .nb-border-3px{border:3px solid #000}
        .nb-border-2px{border:2px solid #000}
        .nb-border-b-3px{border-bottom:3px solid #000}
        .nb-border-dashed{border:3px dashed #000}
        .nb-row+.nb-row{border-top:2px solid #000}

        .nb-bg-page{background-color:#FFF8E7;background-image:linear-gradient(rgba(0,0,0,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(0,0,0,.05) 1px,transparent 1px);background-size:32px 32px}
        .nb-bg-white{background:#fff}
        .nb-bg-cream{background:#FFF8E7}
        .nb-bg-yellow{background:#FFD23F}
        .nb-bg-yellow-soft{background:#FFF3C4}
        .nb-bg-blue{background:#2F6BFF}
        .nb-bg-green{background:#3DDC97}
        .nb-bg-pink{background:#FF8FB1}
        .nb-bg-red{background:#FF5C5C}
        .nb-bg-violet{background:#B69CFF}
        .nb-bg-red-soft{background:#FFE4E4}

        .nb-c-black{color:#000}
        .nb-c-black-60{color:rgba(0,0,0,.6)}
        .nb-c-white{color:#fff}
        .nb-c-green{color:#0E8F5A}
        .nb-c-red{color:#C81E1E}
        .nb-c-blue{color:#2F6BFF}

        .nb-shadow-2{box-shadow:2px 2px 0 #000}
        .nb-shadow-4{box-shadow:4px 4px 0 #000}
        .nb-shadow-6{box-shadow:6px 6px 0 #000}

        .nb-text-10px{font-size:10px}
        .nb-tracking-wide{letter-spacing:.15em}
        .nb-rotate-n2{rotate:-2deg}

        .nb-card,.nb-btn,.nb-input{transition:all .15s}
        .nb-card:hover{translate:-2px -2px;box-shadow:8px 8px 0 #000}
        .nb-input{color:#000;background:#fff;box-shadow:4px 4px 0 #000}
        .nb-input:focus{outline:none;background:#FFF3C4;translate:2px 2px;box-shadow:2px 2px 0 #000;border-color:#000;--tw-ring-shadow:0 0 #0000}
        .nb-btn{box-shadow:4px 4px 0 #000}
        .nb-btn:hover{translate:2px 2px;box-shadow:2px 2px 0 #000}
        .nb-btn:active{translate:4px 4px;box-shadow:none}
        .nb-btn:focus-visible{outline:3px solid #FFD23F;outline-offset:2px}
        .nb-tr:hover{background:#FFF3C4}

        .nb-badge{display:inline-flex;align-items:center;gap:.375rem;padding:.25rem .625rem;font-size:.75rem;font-weight:800;border:2px solid #000;border-radius:8px;box-shadow:2px 2px 0 #000}

        @media(prefers-reduced-motion:reduce){
            .nb-card,.nb-btn,.nb-input{transition:none}
        }
    </style>

    <div class="min-h-screen nb-bg-page">
        <div class="mx-auto max-w-7xl space-y-10 px-5 py-8 sm:px-8 lg:px-10 xl:px-12">

            {{-- HEADER --}}
            <header class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-3 py-1 nb-text-10px font-black uppercase nb-tracking-wide nb-c-black nb-shadow-2">
                        <i data-lucide="wallet" class="h-3.5 w-3.5"></i>
                        Manajemen Finansial
                    </span>
                    <h1 class="mt-2 text-3xl font-black tracking-tight nb-c-black sm:text-4xl lg:text-5xl">
                        Dompet Keuangan
                        <span class="ml-2 inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 nb-c-white nb-shadow-4">Kelola</span>
                    </h1>
                    <p class="mt-2 text-sm font-medium nb-c-black-60">Kelola seluruh kantong kas, rekening bank, dan saldo dompet digital Anda.</p>
                </div>
                <a href="{{ route('wallets.create') }}"
                   class="nb-btn flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-3 text-sm font-black uppercase nb-tracking-wide nb-c-white">
                    <i data-lucide="plus" class="h-4 w-4"></i>
                    Tambah Dompet
                </a>
            </header>

            {{-- SUMMARY STATS --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-10">

                {{-- Total Dompet --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 sm:p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black">Total Dompet Terdaftar</p>
                            <h2 class="mt-1.5 text-3xl font-black nb-c-black sm:text-4xl">
                                {{ $wallets->count() }} <span class="text-sm font-bold nb-c-black-60">Dompet</span>
                            </h2>
                            <p class="mt-1 text-xs font-bold nb-c-black-60">Status aktif digunakan</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl nb-border-2px nb-bg-yellow nb-shadow-2 nb-c-black">
                            <i data-lucide="wallet" class="h-7 w-7"></i>
                        </div>
                    </div>
                </div>

                {{-- Total Saldo --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 sm:p-8">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black">Total Saldo Gabungan</p>
                            <h2 class="mt-1.5 text-3xl font-black nb-c-blue sm:text-4xl">
                                Rp {{ number_format($wallets->sum('current_balance'), 0, ',', '.') }}
                            </h2>
                            <p class="mt-1 text-xs font-bold nb-c-black-60">Akumulasi seluruh sumber dana</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl nb-border-2px nb-bg-blue nb-shadow-2 nb-c-white">
                            <i data-lucide="wallet-cards" class="h-7 w-7"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION HEADER --}}
            <div class="flex items-center justify-between pb-3 nb-border-b-3px mt-10">
                <div>
                    <h2 class="text-xl font-black nb-c-black">Daftar Dompet</h2>
                    <p class="text-xs font-bold nb-c-black-60">Daftar akun keuangan Anda saat ini.</p>
                </div>
                <span class="nb-badge nb-bg-white nb-c-black nb-text-10px">
                    {{ $wallets->count() }} Akun
                </span>
            </div>

            @if ($wallets->isEmpty())
                {{-- EMPTY STATE --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-white p-10 nb-shadow-6 text-center mt-10">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl nb-border-3px nb-bg-yellow nb-shadow-4 nb-c-black">
                        <i data-lucide="wallet" class="h-8 w-8"></i>
                    </div>
                    <h3 class="text-lg font-black nb-c-black">Belum Ada Dompet</h3>
                    <p class="mx-auto mt-1 max-w-sm text-xs font-bold nb-c-black-60">
                        Tambahkan dompet pertama Anda untuk mulai mencatat dan mengelola keuangan pribadi.
                    </p>
                    <a href="{{ route('wallets.create') }}"
                       class="nb-btn mt-5 px-5 py-2.5 text-xs inline-flex items-center gap-1.5 rounded-lg nb-border-3px nb-bg-blue nb-c-white">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Buat Dompet Pertama
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3 mt-10">
                    @foreach ($wallets as $wallet)
                        @php
                            $wConfig = match($wallet->type) {
                                'cash'    => ['icon' => 'banknote',   'bg' => 'nb-bg-yellow',  'text' => 'nb-c-black', 'label' => 'Tunai'],
                                'bank'    => ['icon' => 'building-2', 'bg' => 'nb-bg-violet',  'text' => 'nb-c-black', 'label' => 'Bank'],
                                default   => ['icon' => 'smartphone', 'bg' => 'nb-bg-blue',    'text' => 'nb-c-white', 'label' => 'E-Wallet'],
                            };
                        @endphp

                        <div class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 flex flex-col justify-between">

                            <div>
                                {{-- Card Header --}}
                                <div class="flex items-start justify-between">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl nb-border-2px {{ $wConfig['bg'] }} {{ $wConfig['text'] }} nb-shadow-2">
                                        <i data-lucide="{{ $wConfig['icon'] }}" class="h-6 w-6"></i>
                                    </div>
                                    <span class="nb-badge {{ $wConfig['bg'] }} {{ $wConfig['text'] }}">
                                        {{ $wConfig['label'] }}
                                    </span>
                                </div>

                                {{-- Name & Description --}}
                                <h3 class="mt-4 text-xl font-black nb-c-black tracking-tight">{{ $wallet->name }}</h3>
                                @if ($wallet->description)
                                    <p class="mt-1 text-xs font-bold nb-c-black-60 line-clamp-2">
                                        {{ $wallet->description }}
                                    </p>
                                @endif

                                {{-- Saldo Saat Ini --}}
                                <div class="mt-5 p-4 rounded-xl nb-border-2px nb-bg-cream nb-shadow-2">
                                    <span class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black-60">Saldo Saat Ini</span>
                                    <p class="text-2xl font-black {{ $wallet->current_balance < 0 ? 'nb-c-red' : 'nb-c-black' }} mt-1">
                                        Rp {{ number_format($wallet->current_balance, 0, ',', '.') }}
                                    </p>
                                    <div class="mt-1.5 pt-1.5 nb-border-b-3px flex items-center justify-between text-[11px] font-bold nb-c-black-60">
                                        <span>Saldo Awal:</span>
                                        <span>Rp {{ number_format($wallet->opening_balance, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="mt-6 flex items-center gap-2 pt-4 nb-border-t-2px nb-border-dashed">
                                <a href="{{ route('wallets.edit', $wallet->id) }}"
                                   class="nb-btn flex-1 py-2 text-xs flex items-center justify-center gap-1.5 rounded-lg nb-border-3px nb-bg-white nb-c-black">
                                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                    Edit
                                </a>

                                <button type="button"
                                        onclick="confirmDelete('delete-wallet-{{ $wallet->id }}', 'Apakah Anda yakin ingin menghapus dompet {{ $wallet->name }}?')"
                                        class="nb-btn py-2 px-3 text-xs flex items-center justify-center gap-1.5 rounded-lg nb-border-3px nb-bg-red nb-c-white">
                                    <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                    Hapus
                                </button>

                                <form id="delete-wallet-{{ $wallet->id }}"
                                      action="{{ route('wallets.destroy', $wallet->id) }}"
                                      method="POST"
                                      class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>