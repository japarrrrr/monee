<x-app-layout>
    @php
        $hour = now()->setTimezone(config('app.timezone', 'Asia/Jakarta'))->hour;
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Selamat Pagi';
            $greetingEmoji = '☀️';
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = 'Selamat Siang';
            $greetingEmoji = '🌤️';
        } elseif ($hour >= 15 && $hour < 19) {
            $greeting = 'Selamat Sore';
            $greetingEmoji = '🌅';
        } else {
            $greeting = 'Selamat Malam';
            $greetingEmoji = '🌙';
        }
    @endphp

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

            {{-- ============================================================ --}}
            {{-- A. WELCOME HEADER (NEO-BRUTALISM)                           --}}
            {{-- ============================================================ --}}
            <header class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-3 py-1 nb-text-10px font-black uppercase nb-tracking-wide nb-c-black nb-shadow-2">
                        <i data-lucide="calendar" class="h-3.5 w-3.5"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </span>
                    <h1 class="mt-2 text-3xl font-black tracking-tight nb-c-black sm:text-4xl lg:text-5xl">
                        {{ $greetingEmoji }} {{ $greeting }}, {{ Auth::user()->name }}!
                        <span class="ml-2 inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 nb-c-white nb-shadow-4">Dashboard</span>
                    </h1>
                    <p class="mt-2 text-sm font-medium nb-c-black-60">Ringkasan kondisi finansial dan arus kas pribadimu hari ini.</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('transactions.create') }}"
                       class="nb-btn flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-3 text-sm font-black uppercase nb-tracking-wide nb-c-white">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Tambah Transaksi
                    </a>
                </div>
            </header>

            {{-- ============================================================ --}}
            {{-- B. MAIN TOTAL SALDO HERO CARD (SOLID BLUE, ZERO GRADIENT)    --}}
            {{-- ============================================================ --}}
            <section class="rounded-2xl nb-border-3px nb-bg-blue p-5 nb-shadow-6 sm:p-8 mt-10" aria-labelledby="total-saldo-heading">
                <div class="relative z-10 flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-lg bg-white/20 nb-border-2px px-3 py-1 text-xs font-black nb-c-white nb-shadow-2">
                            <i data-lucide="wallet" class="h-4 w-4"></i>
                            Total Saldo Semua Dompet
                        </div>
                        <h2 id="total-saldo-heading" class="mt-4 text-3xl font-black tracking-tight sm:text-5xl lg:text-6xl nb-c-white">
                            Rp {{ number_format($totalBalance, 0, ',', '.') }}
                        </h2>
                        <p class="mt-2 text-xs font-bold nb-c-white/80 flex items-center gap-1.5">
                            <i data-lucide="clock" class="h-3.5 w-3.5"></i>
                            Diperbarui per {{ now()->translatedFormat('d F Y, H:i') }} WIB
                        </p>
                    </div>

                    <div class="flex items-center gap-3 rounded-xl nb-border-2px nb-bg-yellow px-4 py-3 nb-shadow-3 nb-c-black">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="chart-no-axes-combined" class="h-5 w-5 nb-c-black"></i>
                        </div>
                        <div>
                            <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black-60">Periode Laporan</p>
                            <p class="text-sm font-black nb-c-black">{{ now()->translatedFormat('F Y') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ============================================================ --}}
            {{-- C. SUMMARY CARDS (PEMASUKAN, PENGELUARAN, ARUS BERSIH)       --}}
            {{-- ============================================================ --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 mt-10">

                {{-- Card 1: Pemasukan Bulan Ini --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-green p-5 nb-shadow-6 sm:p-6">
                    <div class="flex items-center justify-between">
                        <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black">Total Pemasukan</p>
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="trending-up" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black sm:text-3xl">
                        Rp {{ number_format($monthlyIncome, 0, ',', '.') }}
                    </p>
                    <p class="mt-1.5 text-xs font-semibold nb-c-black-60">Bulan {{ now()->translatedFormat('F Y') }}</p>
                </div>

                {{-- Card 2: Pengeluaran Bulan Ini --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-pink p-5 nb-shadow-6 sm:p-6">
                    <div class="flex items-center justify-between">
                        <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black">Total Pengeluaran</p>
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="trending-down" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black sm:text-3xl">
                        Rp {{ number_format($monthlyExpense, 0, ',', '.') }}
                    </p>
                    <p class="mt-1.5 text-xs font-semibold nb-c-black-60">Bulan {{ now()->translatedFormat('F Y') }}</p>
                </div>

                {{-- Card 3: Arus Kas Bersih --}}
                <div class="nb-card rounded-2xl nb-border-3px {{ $netFlow >= 0 ? 'nb-bg-yellow' : 'nb-bg-red' }} p-5 nb-shadow-6 sm:p-6">
                    <div class="flex items-center justify-between">
                        <p class="nb-text-10px font-black uppercase nb-tracking-wide {{ $netFlow >= 0 ? 'nb-c-black' : 'nb-c-white' }}">Arus Kas Bersih</p>
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="arrow-left-right" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black {{ $netFlow >= 0 ? 'nb-c-black' : 'nb-c-white' }} sm:text-3xl">
                        {{ $netFlow < 0 ? '-' : '' }}Rp {{ number_format(abs($netFlow), 0, ',', '.') }}
                    </p>
                    <p class="mt-2 inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-white px-2.5 py-0.5 text-xs font-black nb-c-black">
                        <i data-lucide="{{ $netFlow >= 0 ? 'circle-check' : 'triangle-alert' }}" class="h-3.5 w-3.5"></i>
                        {{ $netFlow >= 0 ? 'Keuangan positif' : 'Defisit anggaran' }}
                    </p>
                </div>

                {{-- Card 4: Jumlah Transaksi Bulan Ini --}}
                <div class="nb-card rounded-2xl nb-border-3px nb-bg-violet p-5 nb-shadow-6 sm:p-6">
                    <div class="flex items-center justify-between">
                        <p class="nb-text-10px font-black uppercase nb-tracking-wide nb-c-black">Jumlah Transaksi</p>
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="receipt-text" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black sm:text-3xl">
                        {{ $monthlyTransactionCount }}
                    </p>
                    <p class="mt-1.5 text-xs font-semibold nb-c-black-60">Transaksi bulan ini</p>
                </div>

            </div>

            {{-- ============================================================ --}}
            {{-- D. CHART & DOMPET OVERVIEW                                   --}}
            {{-- ============================================================ --}}
            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3 mt-10">

                {{-- CHART.JS (SOLID COLORS, NEO-BRUTALISM) --}}
                <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 xl:col-span-2" aria-labelledby="chart-heading">
                    <div class="mb-4 flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-blue nb-shadow-2">
                            <i data-lucide="chart-column" class="h-5 w-5 nb-c-white"></i>
                        </div>
                        <div>
                            <h2 id="chart-heading" class="text-lg font-black nb-c-black">Arus Keuangan 7 Hari Terakhir</h2>
                            <p class="mt-0.5 text-sm font-medium nb-c-black-60">Perbandingan riil pemasukan vs pengeluaran harian</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 text-xs font-black mb-4">
                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md nb-border-2px nb-bg-white nb-shadow-2">
                            <span class="h-3 w-3 rounded-sm nb-bg-green nb-border-2px"></span>
                            Pemasukan
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md nb-border-2px nb-bg-white nb-shadow-2">
                            <span class="h-3 w-3 rounded-sm nb-bg-pink nb-border-2px"></span>
                            Pengeluaran
                        </span>
                    </div>

                    <div class="relative h-64 w-full rounded-xl nb-border-2px nb-bg-cream p-4">
                        <canvas id="dashboardChart" aria-label="Grafik pemasukan dan pengeluaran 7 hari terakhir" role="img"></canvas>
                    </div>
                </section>

                {{-- WALLETS OVERVIEW --}}
                <section class="nb-card rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 flex flex-col justify-between" aria-labelledby="wallets-heading">
                    <div>
                        <div class="mb-4 flex items-start gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-yellow nb-shadow-2">
                                <i data-lucide="wallet" class="h-5 w-5 nb-c-black"></i>
                            </div>
                            <div>
                                <h2 id="wallets-heading" class="text-lg font-black nb-c-black">Dompet Saya</h2>
                                <p class="mt-0.5 text-sm font-medium nb-c-black-60">Status saldo per dompet</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @forelse($wallets as $wallet)
                                @php
                                    $walletConfig = match($wallet->type) {
                                        'cash'    => ['icon' => 'banknote',   'bg' => 'nb-bg-yellow',  'text' => 'nb-c-black', 'label' => 'Tunai'],
                                        'bank'    => ['icon' => 'building-2', 'bg' => 'nb-bg-violet',  'text' => 'nb-c-black', 'label' => 'Bank'],
                                        default   => ['icon' => 'smartphone', 'bg' => 'nb-bg-blue',    'text' => 'nb-c-white', 'label' => 'E-Wallet'],
                                    };
                                @endphp
                                <div class="nb-card rounded-xl nb-border-2px nb-bg-cream p-3 nb-shadow-2">
                                    <div class="flex items-center justify-between gap-3 min-w-0">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg nb-border-2px {{ $walletConfig['bg'] }} {{ $walletConfig['text'] }} nb-shadow-2">
                                                <i data-lucide="{{ $walletConfig['icon'] }}" class="h-4 w-4"></i>
                                            </div>
                                            <div class="min-w-0">
                                                <p class="truncate text-xs font-black nb-c-black">{{ $wallet->name }}</p>
                                                <span class="inline-block nb-text-10px font-bold nb-c-black-60">{{ $walletConfig['label'] }}</span>
                                            </div>
                                        </div>
                                        <p class="whitespace-nowrap text-xs font-black {{ $wallet->current_balance < 0 ? 'nb-c-red' : 'nb-c-black' }}">
                                            Rp {{ number_format($wallet->current_balance, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="py-8 text-center rounded-xl nb-border-dashed nb-bg-cream p-4">
                                    <p class="nb-text-10px font-black nb-c-black">Belum ada dompet aktif</p>
                                    <p class="text-[11px] font-bold nb-c-black-60 mt-1">Tambahkan dompet untuk mulai mencatat.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <a href="{{ route('wallets.index') }}"
                       class="nb-btn w-full py-2.5 mt-5 text-xs flex items-center justify-center gap-1.5 rounded-lg nb-border-3px nb-bg-white nb-c-black">
                        <i data-lucide="wallet" class="h-4 w-4"></i>
                        Kelola Semua Dompet
                    </a>
                </section>
            </div>

            {{-- ============================================================ --}}
            {{-- E. RECENT TRANSACTIONS (LIST TABLE NEO-BRUTALISM)            --}}
            {{-- ============================================================ --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 mt-10" aria-labelledby="transactions-heading">
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 nb-border-b-3px">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 id="transactions-heading" class="text-lg font-black nb-c-black">Transaksi Terbaru</h2>
                            <span class="nb-badge nb-bg-blue nb-c-white nb-text-10px">Aktual</span>
                        </div>
                        <p class="mt-1 text-xs font-bold nb-c-black-60">Catatan aktivitas finansial terakhir Anda</p>
                    </div>
                    <a href="{{ route('transactions.index') }}"
                       class="nb-btn text-xs px-3.5 py-2 inline-flex items-center gap-1 rounded-lg nb-border-3px nb-bg-white nb-c-black">
                        Lihat Seluruh Transaksi
                        <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                    </a>
                </div>

                <div class="space-y-2.5">
                    @forelse($recentTransactions as $transaction)
                        <div class="nb-tr rounded-xl nb-border-2px nb-bg-white p-3.5 nb-shadow-2 flex items-center justify-between gap-3">
                            <div class="flex min-w-0 items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl nb-border-2px nb-shadow-2
                                    {{ $transaction->type === 'income' ? 'nb-bg-green' : 'nb-bg-pink' }}">
                                    <i data-lucide="{{ $transaction->type === 'income' ? 'trending-up' : 'trending-down' }}"
                                       class="h-5 w-5 stroke-[2.5] nb-c-white"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <p class="truncate text-sm font-black nb-c-black">
                                            {{ $transaction->category->name }}
                                        </p>
                                        <span class="inline-block px-1.5 py-0.5 rounded nb-border-2px text-[9px] font-black uppercase nb-tracking-wide
                                            {{ $transaction->type === 'income' ? 'nb-bg-green/20 nb-c-green' : 'nb-bg-pink/20 nb-c-red' }}">
                                            {{ $transaction->type === 'income' ? 'Masuk' : 'Keluar' }}
                                        </span>
                                    </div>
                                    <p class="mt-0.5 truncate text-xs font-bold nb-c-black-60">
                                        {{ $transaction->transaction_date->translatedFormat('d F Y') }}
                                        · <span class="nb-c-black">{{ $transaction->wallet->name }}</span>
                                        @if($transaction->description)
                                            · {{ Str::limit($transaction->description, 35) }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <p class="whitespace-nowrap text-sm font-black {{ $transaction->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </p>
                        </div>
                    @empty
                        <div class="py-12 text-center rounded-xl nb-border-dashed nb-bg-cream px-4">
                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl nb-border-3px nb-bg-yellow nb-shadow-4">
                                <i data-lucide="receipt" class="h-7 w-7 nb-c-black"></i>
                            </div>
                            <p class="text-sm font-black nb-c-black">Belum ada riwayat transaksi</p>
                            <p class="mt-1 text-xs font-bold nb-c-black-60">
                                Catat transaksi pemasukan atau pengeluaran pertama Anda sekarang.
                            </p>
                            <a href="{{ route('transactions.create') }}"
                               class="nb-btn mt-4 px-4 py-2.5 text-xs inline-flex items-center gap-1.5 rounded-lg nb-border-3px nb-bg-blue nb-c-white">
                                <i data-lucide="plus" class="h-4 w-4"></i>
                                Tambah Transaksi
                            </a>
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- CHART.JS SCRIPT (NEO-BRUTALISM SOLID BARS - MATCH REPORTS)   --}}
    {{-- ============================================================ --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const canvas = document.getElementById('dashboardChart');
            if (!canvas || typeof window.Chart === 'undefined') return;

            const chartData = @json($chartData);
            const labels  = chartData.map(d => d.label);
            const income  = chartData.map(d => d.income);
            const expense = chartData.map(d => d.expense);

            new window.Chart(canvas, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: income,
                            backgroundColor: '#3DDC97',
                            borderColor: '#000',
                            borderWidth: 2,
                            borderRadius: 4,
                            borderSkipped: false,
                            maxBarThickness: 32,
                        },
                        {
                            label: 'Pengeluaran',
                            data: expense,
                            backgroundColor: '#FF8FB1',
                            borderColor: '#000',
                            borderWidth: 2,
                            borderRadius: 4,
                            borderSkipped: false,
                            maxBarThickness: 32,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { intersect: false, mode: 'index' },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#000',
                            titleColor: '#FFD23F',
                            bodyColor: '#fff',
                            borderColor: '#FFD23F',
                            borderWidth: 2,
                            cornerRadius: 6,
                            padding: 10,
                            titleFont: { weight: 'bold', size: 13 },
                            bodyFont: { weight: 'bold', size: 12 },
                            displayColors: true,
                            boxPadding: 4,
                            callbacks: {
                                label: ctx => ctx.dataset.label + ': Rp ' +
                                    new Intl.NumberFormat('id-ID').format(ctx.raw)
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            border: { color: '#000', width: 2 },
                            grid: { color: 'rgba(0,0,0,0.08)' },
                            ticks: {
                                callback: v => 'Rp ' + new Intl.NumberFormat('id-ID', { notation: 'compact' }).format(v),
                                font: { size: 11, weight: 'bold' },
                                color: '#000',
                            }
                        },
                        x: {
                            border: { color: '#000', width: 2 },
                            grid: { display: false },
                            ticks: { font: { size: 11, weight: 'bold' }, color: '#000' }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>