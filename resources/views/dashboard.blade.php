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

    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            {{-- ============================================================ --}}
            {{-- A. WELCOME HEADER (NEO-BRUTALISM)                           --}}
            {{-- ============================================================ --}}
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-lg bg-[#FACC15] border-2 border-[#171717] px-2.5 py-1 shadow-[2px_2px_0px_#171717] mb-2 text-xs font-black text-[#171717] uppercase tracking-wider">
                        <i data-lucide="calendar" class="h-3.5 w-3.5"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                    <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl lg:text-4xl">
                        {{ $greetingEmoji }} {{ $greeting }}, {{ Auth::user()->name }}!
                    </h1>
                    <p class="mt-1 text-sm font-bold text-[#525252]">
                        Ringkasan kondisi finansial dan arus kas pribadimu hari ini.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('transactions.create') }}"
                       class="neo-btn neo-btn-primary px-5 py-3 text-sm flex items-center gap-2">
                        <i data-lucide="plus" class="h-5 w-5 stroke-[2.5]"></i>
                        Tambah Transaksi
                    </a>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- B. MAIN TOTAL SALDO HERO CARD (SOLID BLUE, ZERO GRADIENT)    --}}
            {{-- ============================================================ --}}
            <div class="relative overflow-hidden rounded-2xl bg-[#2563EB] border-2.5 border-[#171717] shadow-[6px_6px_0px_#171717] p-6 text-white sm:p-8">
                <div class="relative z-10 flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                    <div>
                        <div class="inline-flex items-center gap-2 rounded-lg bg-white/20 border-2 border-[#171717] px-3 py-1 text-xs font-black text-white shadow-[2px_2px_0px_#171717]">
                            <i data-lucide="wallet" class="h-4 w-4"></i>
                            Total Saldo Semua Dompet
                        </div>
                        <h2 class="mt-4 text-3xl font-black tracking-tight sm:text-5xl lg:text-6xl text-white">
                            Rp {{ number_format($totalBalance, 0, ',', '.') }}
                        </h2>
                        <p class="mt-2 text-xs font-bold text-blue-100 flex items-center gap-1.5">
                            <i data-lucide="clock" class="h-3.5 w-3.5"></i>
                            Diperbarui per {{ now()->translatedFormat('d F Y, H:i') }} WIB
                        </p>
                    </div>

                    <div class="flex items-center gap-3 rounded-xl border-2 border-[#171717] bg-[#FACC15] px-4 py-3 shadow-[3px_3px_0px_#171717] text-[#171717]">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white border-2 border-[#171717]">
                            <i data-lucide="chart-no-axes-combined" class="h-5 w-5 text-[#171717]"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-wider text-[#525252]">Periode Laporan</p>
                            <p class="text-sm font-black text-[#171717]">{{ now()->translatedFormat('F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- C. SUMMARY CARDS (PEMASUKAN, PENGELUARAN, ARUS BERSIH)       --}}
            {{-- ============================================================ --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-6">

                {{-- Card 1: Pemasukan Bulan Ini --}}
                <div class="neo-card p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#16A34A] border-2 border-[#171717] shadow-[2px_2px_0px_#171717] text-white">
                            <i data-lucide="trending-up" class="h-5 w-5 stroke-[2.5]"></i>
                        </div>
                        <span class="neo-badge bg-[#16A34A] text-white">
                            Pemasukan
                        </span>
                    </div>
                    <p class="mt-4 text-xs font-black uppercase tracking-wider text-[#525252]">Total Bulan Ini</p>
                    <p class="mt-1 text-2xl font-black text-[#171717]">
                        Rp {{ number_format($monthlyIncome, 0, ',', '.') }}
                    </p>
                    <div class="mt-2 pt-2 border-t border-[#171717]/10 flex items-center justify-between text-xs font-bold text-[#525252]">
                        <span>{{ now()->translatedFormat('F Y') }}</span>
                        <span class="text-[#16A34A] font-extrabold">Uang Masuk</span>
                    </div>
                </div>

                {{-- Card 2: Pengeluaran Bulan Ini --}}
                <div class="neo-card p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EF4444] border-2 border-[#171717] shadow-[2px_2px_0px_#171717] text-white">
                            <i data-lucide="trending-down" class="h-5 w-5 stroke-[2.5]"></i>
                        </div>
                        <span class="neo-badge bg-[#EF4444] text-white">
                            Pengeluaran
                        </span>
                    </div>
                    <p class="mt-4 text-xs font-black uppercase tracking-wider text-[#525252]">Total Bulan Ini</p>
                    <p class="mt-1 text-2xl font-black text-[#171717]">
                        Rp {{ number_format($monthlyExpense, 0, ',', '.') }}
                    </p>
                    <div class="mt-2 pt-2 border-t border-[#171717]/10 flex items-center justify-between text-xs font-bold text-[#525252]">
                        <span>{{ now()->translatedFormat('F Y') }}</span>
                        <span class="text-[#EF4444] font-extrabold">Uang Keluar</span>
                    </div>
                </div>

                {{-- Card 3: Arus Kas Bersih --}}
                <div class="neo-card p-5">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl {{ $netFlow >= 0 ? 'bg-[#FACC15]' : 'bg-[#EF4444]' }} border-2 border-[#171717] shadow-[2px_2px_0px_#171717] {{ $netFlow >= 0 ? 'text-[#171717]' : 'text-white' }}">
                            <i data-lucide="arrow-left-right" class="h-5 w-5 stroke-[2.5]"></i>
                        </div>
                        <span class="neo-badge {{ $netFlow >= 0 ? 'bg-[#FACC15] text-[#171717]' : 'bg-[#EF4444] text-white' }}">
                            Arus Bersih
                        </span>
                    </div>
                    <p class="mt-4 text-xs font-black uppercase tracking-wider text-[#525252]">Selisih Bulan Ini</p>
                    <p class="mt-1 text-2xl font-black {{ $netFlow >= 0 ? 'text-[#16A34A]' : 'text-[#EF4444]' }}">
                        {{ $netFlow < 0 ? '-' : '' }}Rp {{ number_format(abs($netFlow), 0, ',', '.') }}
                    </p>
                    <div class="mt-2 pt-2 border-t border-[#171717]/10 flex items-center justify-between text-xs font-extrabold">
                        <span class="{{ $netFlow >= 0 ? 'text-[#16A34A]' : 'text-[#EF4444]' }}">
                            {{ $netFlow >= 0 ? '✓ Keuangan Positif' : '⚠ Defisit Anggaran' }}
                        </span>
                    </div>
                </div>

            </div>

            {{-- ============================================================ --}}
            {{-- D. CHART & DOMPET OVERVIEW                                   --}}
            {{-- ============================================================ --}}
            <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                {{-- CHART.JS (SOLID COLORS, NEO-BRUTALISM) --}}
                <div class="neo-card p-5 sm:p-6 xl:col-span-2">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b-2 border-[#171717]/10">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black text-[#171717]">Arus Keuangan 7 Hari Terakhir</h3>
                                <span class="neo-badge bg-[#F5F5F0] text-[#171717] text-[10px]">Statistik</span>
                            </div>
                            <p class="mt-1 text-xs font-bold text-[#525252]">Perbandingan riil pemasukan vs pengeluaran harian</p>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-black">
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-white border border-[#171717] shadow-[1px_1px_0px_#171717]">
                                <span class="h-3 w-3 rounded-sm bg-[#2563EB] border border-[#171717]"></span>
                                Pemasukan
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md bg-white border border-[#171717] shadow-[1px_1px_0px_#171717]">
                                <span class="h-3 w-3 rounded-sm bg-[#EF4444] border border-[#171717]"></span>
                                Pengeluaran
                            </span>
                        </div>
                    </div>

                    <div class="mt-5 h-64 w-full">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>

                {{-- WALLETS OVERVIEW --}}
                <div class="neo-card p-5 sm:p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-3 border-b-2 border-[#171717]/10">
                            <div>
                                <h3 class="text-lg font-black text-[#171717]">Dompet Saya</h3>
                                <p class="text-xs font-bold text-[#525252]">Status saldo per dompet</p>
                            </div>
                            <div class="h-8 w-8 rounded-lg bg-[#FACC15] border-2 border-[#171717] flex items-center justify-center shadow-[2px_2px_0px_#171717]">
                                <i data-lucide="wallet" class="h-4 w-4 text-[#171717]"></i>
                            </div>
                        </div>

                        <div class="mt-4 space-y-3">
                            @forelse($wallets as $wallet)
                                @php
                                    $walletConfig = match($wallet->type) {
                                        'cash'    => ['icon' => 'banknote',   'bg' => 'bg-[#FACC15]', 'text' => 'text-[#171717]', 'label' => 'Tunai'],
                                        'bank'    => ['icon' => 'building-2', 'bg' => 'bg-[#A78BFA]', 'text' => 'text-[#171717]', 'label' => 'Bank'],
                                        default   => ['icon' => 'smartphone', 'bg' => 'bg-[#2563EB]', 'text' => 'text-white',     'label' => 'E-Wallet'],
                                    };
                                @endphp
                                <div class="flex items-center justify-between p-3 rounded-xl border-2 border-[#171717] bg-[#F5F5F0] shadow-[2px_2px_0px_#171717]">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg border-2 border-[#171717] {{ $walletConfig['bg'] }} {{ $walletConfig['text'] }}">
                                            <i data-lucide="{{ $walletConfig['icon'] }}" class="h-4 w-4"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="truncate text-xs font-black text-[#171717]">{{ $wallet->name }}</p>
                                            <span class="inline-block text-[10px] font-bold text-[#525252]">{{ $walletConfig['label'] }}</span>
                                        </div>
                                    </div>
                                    <p class="whitespace-nowrap text-xs font-black {{ $wallet->current_balance < 0 ? 'text-[#EF4444]' : 'text-[#171717]' }}">
                                        Rp {{ number_format($wallet->current_balance, 0, ',', '.') }}
                                    </p>
                                </div>
                            @empty
                                <div class="py-8 text-center rounded-xl border-2 border-dashed border-[#171717] bg-[#F5F5F0] p-4">
                                    <p class="text-xs font-black text-[#171717]">Belum ada dompet aktif</p>
                                    <p class="text-[11px] font-bold text-[#525252] mt-1">Tambahkan dompet untuk mulai mencatat.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <a href="{{ route('wallets.index') }}"
                       class="neo-btn neo-btn-white w-full py-2.5 mt-5 text-xs flex items-center justify-center gap-1.5">
                        <i data-lucide="wallet" class="h-4 w-4"></i>
                        Kelola Semua Dompet
                    </a>
                </div>
            </div>

            {{-- ============================================================ --}}
            {{-- E. RECENT TRANSACTIONS (LIST TABLE NEO-BRUTALISM)            --}}
            {{-- ============================================================ --}}
            <div class="neo-card p-5 sm:p-6">
                <div class="mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b-2 border-[#171717]/10">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-black text-[#171717]">Transaksi Terbaru</h3>
                            <span class="neo-badge bg-[#2563EB] text-white text-[10px]">Aktual</span>
                        </div>
                        <p class="text-xs font-bold text-[#525252]">Catatan aktivitas finansial terakhir Anda</p>
                    </div>
                    <a href="{{ route('transactions.index') }}"
                       class="neo-btn neo-btn-white text-xs px-3.5 py-2 inline-flex items-center gap-1">
                        Lihat Seluruh Transaksi
                        <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                    </a>
                </div>

                <div class="space-y-2.5">
                    @forelse($recentTransactions as $transaction)
                        <div class="flex items-center justify-between gap-3 p-3.5 rounded-xl border-2 border-[#171717] bg-white shadow-[2px_2px_0px_#171717] transition hover:translate-x-0.5 hover:shadow-[3px_3px_0px_#171717]">
                            <div class="flex min-w-0 items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border-2 border-[#171717] shadow-[2px_2px_0px_#171717]
                                    {{ $transaction->type === 'income' ? 'bg-[#16A34A] text-white' : 'bg-[#EF4444] text-white' }}">
                                    <i data-lucide="{{ $transaction->type === 'income' ? 'trending-up' : 'trending-down' }}"
                                       class="h-5 w-5 stroke-[2.5]"></i>
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <p class="truncate text-sm font-black text-[#171717]">
                                            {{ $transaction->category->name }}
                                        </p>
                                        <span class="inline-block px-1.5 py-0.5 rounded text-[9px] font-black uppercase tracking-wider border border-[#171717] {{ $transaction->type === 'income' ? 'bg-[#16A34A]/20 text-[#16A34A]' : 'bg-[#EF4444]/20 text-[#EF4444]' }}">
                                            {{ $transaction->type === 'income' ? 'Masuk' : 'Keluar' }}
                                        </span>
                                    </div>
                                    <p class="mt-0.5 truncate text-xs font-bold text-[#525252]">
                                        {{ $transaction->transaction_date->translatedFormat('d F Y') }}
                                        · <span class="text-[#171717]">{{ $transaction->wallet->name }}</span>
                                        @if($transaction->description)
                                            · {{ Str::limit($transaction->description, 35) }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <p class="whitespace-nowrap text-sm font-black {{ $transaction->type === 'income' ? 'text-[#16A34A]' : 'text-[#EF4444]' }}">
                                {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </p>
                        </div>
                    @empty
                        <div class="py-12 text-center rounded-xl border-2 border-dashed border-[#171717] bg-[#F5F5F0]">
                            <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl bg-white border-2 border-[#171717] shadow-[2px_2px_0px_#171717]">
                                <i data-lucide="receipt" class="h-7 w-7 text-[#171717]"></i>
                            </div>
                            <p class="text-sm font-black text-[#171717]">Belum ada riwayat transaksi</p>
                            <p class="mt-1 text-xs font-bold text-[#525252]">
                                Catat transaksi pemasukan atau pengeluaran pertama Anda sekarang.
                            </p>
                            <a href="{{ route('transactions.create') }}"
                               class="neo-btn neo-btn-primary mt-4 px-4 py-2.5 text-xs inline-flex items-center gap-1.5">
                                <i data-lucide="plus" class="h-4 w-4"></i>
                                Tambah Transaksi
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- CHART.JS SCRIPT (NEO-BRUTALISM SOLID BARS)                  --}}
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
                            backgroundColor: '#2563EB',
                            borderColor: '#171717',
                            borderWidth: 2,
                            borderRadius: 6,
                            maxBarThickness: 32,
                        },
                        {
                            label: 'Pengeluaran',
                            data: expense,
                            backgroundColor: '#EF4444',
                            borderColor: '#171717',
                            borderWidth: 2,
                            borderRadius: 6,
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
                            backgroundColor: '#FFFFFF',
                            titleColor: '#171717',
                            bodyColor: '#171717',
                            titleFont: { weight: 'bold', size: 13 },
                            bodyFont: { weight: 'bold', size: 12 },
                            borderColor: '#171717',
                            borderWidth: 2,
                            padding: 10,
                            displayColors: true,
                            boxPadding: 4,
                            callbacks: {
                                label: ctx => ' ' + ctx.dataset.label + ': Rp ' +
                                    new Intl.NumberFormat('id-ID').format(ctx.raw)
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(23, 23, 23, 0.08)', lineWidth: 1 },
                            border: { dash: [4, 4] },
                            ticks: {
                                callback: v => 'Rp ' + new Intl.NumberFormat('id-ID', { notation: 'compact' }).format(v),
                                font: { size: 11, weight: 'bold' },
                                color: '#525252',
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 11, weight: 'bold' }, color: '#171717' }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>