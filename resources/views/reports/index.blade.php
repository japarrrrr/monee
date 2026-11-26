<x-app-layout>
    <style>
        .nb-border-3px{border-width:3px;border-style:solid;border-color:#000}
        .nb-border-2px{border-width:2px;border-style:solid;border-color:#000}
        .nb-border-b-3px{border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:#000}
        .nb-border-dashed{border-width:3px;border-style:dashed;border-color:#000}
        .nb-row + .nb-row{border-top:2px solid #000}
        .nb-bg-page{background-color:#FFF8E7;background-image:linear-gradient(rgba(0,0,0,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(0,0,0,.05) 1px,transparent 1px);background-size:32px 32px}
        .nb-bg-white{background-color:#fff}
        .nb-bg-cream{background-color:#FFF8E7}
        .nb-bg-yellow{background-color:#FFD23F}
        .nb-bg-yellow-soft{background-color:#FFF3C4}
        .nb-bg-blue{background-color:#2F6BFF}
        .nb-bg-green{background-color:#3DDC97}
        .nb-bg-pink{background-color:#FF8FB1}
        .nb-bg-red{background-color:#FF5C5C}
        .nb-bg-violet{background-color:#B69CFF}
        .nb-bg-red-soft{background-color:#FFE4E4}
        .nb-c-black{color:#000}
        .nb-c-black-60{color:rgba(0,0,0,.6)}
        .nb-c-white{color:#fff}
        .nb-c-green{color:#0E8F5A}
        .nb-c-red{color:#C81E1E}
        .nb-c-blue{color:#2F6BFF}
        .nb-shadow-2{box-shadow:2px 2px 0 0 #000}
        .nb-shadow-4{box-shadow:4px 4px 0 0 #000}
        .nb-shadow-6{box-shadow:6px 6px 0 0 #000}
        .nb-text-10px{font-size:10px}
        .nb-tracking-wide{letter-spacing:.15em}
        .nb-rotate-n2{rotate:-2deg}
        .nb-card{transition:translate .15s,box-shadow .15s}
        .nb-card:hover{translate:-2px -2px;box-shadow:8px 8px 0 0 #000}
        .nb-input{transition:all .15s;color:#000;background-color:#fff;box-shadow:4px 4px 0 0 #000}
        .nb-input:focus{outline:none;background-color:#FFF3C4;translate:2px 2px;box-shadow:2px 2px 0 0 #000;border-color:#000;--tw-ring-shadow:0 0 #0000}
        .nb-btn{transition:all .15s;box-shadow:4px 4px 0 0 #000}
        .nb-btn:hover{translate:2px 2px;box-shadow:2px 2px 0 0 #000}
        .nb-btn:active{translate:4px 4px;box-shadow:none}
        .nb-btn:focus-visible{outline:3px solid #FFD23F;outline-offset:2px}
        .nb-tr:hover{background-color:#FFF3C4}
        .nb-pagination nav a,.nb-pagination nav span[aria-disabled] span,.nb-pagination nav span[aria-current] span{border:2px solid #000 !important;border-radius:.5rem;margin:0 2px;font-weight:700;color:#000 !important;background:#fff !important}
        .nb-pagination nav span[aria-current] span{background:#FFD23F !important}
        .nb-pagination nav a:hover{background:#FFF3C4 !important}
        .nb-pagination nav .shadow-sm{box-shadow:none}
        @media (prefers-reduced-motion:reduce){.nb-card,.nb-btn,.nb-input{transition:none}}
    </style>

    <div class="min-h-screen nb-bg-page">
        <div class="mx-auto max-w-7xl space-y-8 px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-2.5 py-1 nb-text-10px font-black uppercase nb-tracking-wide nb-c-black nb-shadow-2">
                        <i data-lucide="chart-column" class="h-3.5 w-3.5"></i>
                        Analisis
                    </span>
                    <h1 class="mt-3 text-3xl font-black tracking-tight nb-c-black sm:text-4xl">
                        Laporan
                        <span class="inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 nb-c-white nb-shadow-4">Keuangan</span>
                    </h1>
                    <p class="mt-3 text-sm font-medium nb-c-black-60">Pantau pemasukan, pengeluaran, dan kondisi keuanganmu.</p>
                </div>
            </div>

            {{-- FILTER PERIODE --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6" aria-labelledby="filter-heading">
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg nb-border-2px nb-bg-yellow nb-shadow-2">
                        <i data-lucide="sliders-horizontal" class="h-4 w-4 nb-c-black"></i>
                    </div>
                    <h2 id="filter-heading" class="text-base font-black uppercase tracking-wide nb-c-black">Filter Periode</h2>
                </div>

                <form action="{{ route('reports.index') }}" method="GET">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:items-end">

                        <div>
                            <label for="start_date" class="mb-2 block text-xs font-black uppercase tracking-wider nb-c-black">Dari Tanggal</label>
                            <input type="date"
                                   name="start_date"
                                   id="start_date"
                                   value="{{ request('start_date', $startDate->toDateString()) }}"
                                   max="{{ now()->toDateString() }}"
                                   class="nb-input w-full rounded-lg nb-border-3px px-3 py-3 text-sm font-semibold">
                        </div>

                        <div>
                            <label for="end_date" class="mb-2 block text-xs font-black uppercase tracking-wider nb-c-black">Sampai Tanggal</label>
                            <input type="date"
                                   name="end_date"
                                   id="end_date"
                                   value="{{ request('end_date', $endDate->toDateString()) }}"
                                   max="{{ now()->toDateString() }}"
                                   class="nb-input w-full rounded-lg nb-border-3px px-3 py-3 text-sm font-semibold">
                        </div>

                        <div class="flex gap-3 sm:col-span-2 lg:col-span-2">
                            <button type="submit"
                                    class="nb-btn flex flex-1 items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-3 text-sm font-black uppercase tracking-wider nb-c-white">
                                <i data-lucide="filter" class="h-4 w-4"></i>
                                Terapkan
                            </button>
                            <a href="{{ route('reports.index') }}"
                               class="nb-btn flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-white px-5 py-3 text-sm font-black uppercase tracking-wider nb-c-black">
                                <i data-lucide="refresh-cw" class="h-4 w-4"></i>
                                Reset
                            </a>
                        </div>

                    </div>

                    @if ($errors->any())
                        <div class="mt-5 flex items-center gap-2 rounded-lg nb-border-3px nb-bg-red-soft px-4 py-3 text-sm font-bold nb-c-red nb-shadow-2" role="alert">
                            <i data-lucide="alert-circle" class="h-4 w-4 shrink-0"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- Active period indicator --}}
                    <div class="mt-5 inline-flex flex-wrap items-center gap-2 rounded-lg nb-border-2px nb-bg-yellow-soft px-4 py-2.5 nb-shadow-2">
                        <i data-lucide="calendar" class="h-4 w-4 nb-c-black"></i>
                        <p class="text-sm font-bold nb-c-black">
                            Periode: {{ $startDate->translatedFormat('d F Y') }} — {{ $endDate->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </form>
            </section>

            {{-- RINGKASAN --}}
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <div class="nb-card rounded-2xl nb-border-3px nb-bg-green p-5 nb-shadow-6">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-black uppercase tracking-wider nb-c-black">Total Pemasukan</p>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="trending-up" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black">
                        Rp {{ number_format((float) $totalIncome, 0, ',', '.') }}
                    </p>
                    <p class="mt-1 text-xs font-semibold nb-c-black-60">Selama periode terpilih</p>
                </div>

                <div class="nb-card rounded-2xl nb-border-3px nb-bg-pink p-5 nb-shadow-6">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-black uppercase tracking-wider nb-c-black">Total Pengeluaran</p>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="trending-down" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black">
                        Rp {{ number_format((float) $totalExpense, 0, ',', '.') }}
                    </p>
                    <p class="mt-1 text-xs font-semibold nb-c-black-60">Selama periode terpilih</p>
                </div>

                <div class="nb-card rounded-2xl nb-border-3px {{ $netIncome >= 0 ? 'nb-bg-blue' : 'nb-bg-red' }} p-5 nb-shadow-6">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-black uppercase tracking-wider nb-c-white">Selisih</p>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="wallet" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-white">
                        {{ $netIncome < 0 ? '-' : '' }}Rp {{ number_format(abs((float) $netIncome), 0, ',', '.') }}
                    </p>
                    <p class="mt-2 inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-white px-2 py-0.5 text-xs font-black nb-c-black">
                        <i data-lucide="{{ $netIncome >= 0 ? 'circle-check' : 'triangle-alert' }}" class="h-3.5 w-3.5"></i>
                        {{ $netIncome >= 0 ? 'Keuangan positif' : 'Pengeluaran lebih besar' }}
                    </p>
                </div>

                <div class="nb-card rounded-2xl nb-border-3px nb-bg-yellow p-5 nb-shadow-6">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-black uppercase tracking-wider nb-c-black">Jumlah Transaksi</p>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                            <i data-lucide="receipt-text" class="h-5 w-5 nb-c-black"></i>
                        </div>
                    </div>
                    <p class="mt-4 text-2xl font-black nb-c-black">
                        {{ number_format($totalTransactions, 0, ',', '.') }}
                    </p>
                    <p class="mt-1 text-xs font-semibold nb-c-black-60">Transaksi dalam periode ini</p>
                </div>
            </div>

            {{-- GRAFIK HARIAN --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6" aria-labelledby="chart-heading">
                <div class="mb-5 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-blue nb-shadow-2">
                        <i data-lucide="chart-column" class="h-5 w-5 nb-c-white"></i>
                    </div>
                    <div>
                        <h2 id="chart-heading" class="text-lg font-black nb-c-black">Grafik Keuangan Harian</h2>
                        <p class="mt-0.5 text-sm font-medium nb-c-black-60">Perbandingan pemasukan dan pengeluaran berdasarkan tanggal.</p>
                    </div>
                </div>

                @if ($dailyReports->isNotEmpty())
                    <div class="relative h-72 w-full rounded-xl nb-border-2px nb-bg-cream p-3">
                        <canvas id="financialChart" aria-label="Grafik pemasukan dan pengeluaran harian" role="img"></canvas>
                    </div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream py-14 text-center">
                        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl nb-border-3px nb-bg-yellow nb-shadow-4">
                            <i data-lucide="chart-no-axes-combined" class="h-7 w-7 nb-c-black"></i>
                        </div>
                        <p class="font-black nb-c-black">Belum ada data grafik</p>
                        <p class="mt-1 text-sm font-medium nb-c-black-60">Tambahkan transaksi untuk melihat grafik keuangan.</p>
                    </div>
                @endif
            </section>

            {{-- LAPORAN KATEGORI --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6" aria-labelledby="category-heading">
                <div class="mb-5 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-pink nb-shadow-2">
                        <i data-lucide="tags" class="h-5 w-5 nb-c-black"></i>
                    </div>
                    <div>
                        <h2 id="category-heading" class="text-lg font-black nb-c-black">Laporan Berdasarkan Kategori</h2>
                        <p class="mt-0.5 text-sm font-medium nb-c-black-60">Rincian total transaksi untuk setiap kategori.</p>
                    </div>
                </div>

                @if ($categoryReports->isNotEmpty())
                    <div class="overflow-x-auto rounded-xl nb-border-3px">
                        <table class="w-full text-left text-sm">
                            <thead class="nb-bg-yellow">
                                <tr class="nb-border-b-3px text-xs font-black uppercase tracking-wider nb-c-black">
                                    <th scope="col" class="px-4 py-3">Kategori</th>
                                    <th scope="col" class="px-4 py-3">Jenis</th>
                                    <th scope="col" class="px-4 py-3 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody class="nb-bg-white">
                                @foreach ($categoryReports as $report)
                                    <tr class="nb-row nb-tr">
                                        <td class="px-4 py-3.5 font-bold nb-c-black">
                                            {{ $report->category?->name ?? 'Kategori tidak tersedia' }}
                                        </td>
                                        <td class="px-4 py-3.5">
                                            @if ($report->type === 'income')
                                                <span class="inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-green px-2 py-0.5 text-xs font-black nb-c-black">
                                                    <i data-lucide="trending-up" class="h-3 w-3"></i>
                                                    Pemasukan
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-pink px-2 py-0.5 text-xs font-black nb-c-black">
                                                    <i data-lucide="trending-down" class="h-3 w-3"></i>
                                                    Pengeluaran
                                                </span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3.5 text-right font-black {{ $report->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                            Rp {{ number_format((float) $report->total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream py-10 text-center">
                        <p class="text-sm font-bold nb-c-black-60">Belum ada transaksi berdasarkan kategori pada periode ini.</p>
                    </div>
                @endif
            </section>

            {{-- RIWAYAT TRANSAKSI --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6" aria-labelledby="history-heading">
                <div class="mb-5 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-green nb-shadow-2">
                        <i data-lucide="history" class="h-5 w-5 nb-c-black"></i>
                    </div>
                    <div>
                        <h2 id="history-heading" class="text-lg font-black nb-c-black">Riwayat Transaksi</h2>
                        <p class="mt-0.5 text-sm font-medium nb-c-black-60">Daftar transaksi sesuai periode yang dipilih.</p>
                    </div>
                </div>

                @if ($transactionList->isNotEmpty())
                    <div class="overflow-x-auto rounded-xl nb-border-3px">
                        <table class="w-full min-w-[700px] text-left text-sm">
                            <thead class="nb-bg-yellow">
                                <tr class="nb-border-b-3px text-xs font-black uppercase tracking-wider nb-c-black">
                                    <th scope="col" class="px-4 py-3">Tanggal</th>
                                    <th scope="col" class="px-4 py-3">Keterangan</th>
                                    <th scope="col" class="px-4 py-3">Kategori</th>
                                    <th scope="col" class="px-4 py-3">Dompet</th>
                                    <th scope="col" class="px-4 py-3">Jenis</th>
                                    <th scope="col" class="px-4 py-3 text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="nb-bg-white">
                                @foreach ($transactionList as $transaction)
                                    <tr class="nb-row nb-tr">
                                        <td class="whitespace-nowrap px-4 py-3.5 text-xs font-bold nb-c-black-60">
                                            {{ $transaction->transaction_date->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="px-4 py-3.5 font-bold nb-c-black">
                                            {{ $transaction->description ?: '-' }}
                                        </td>
                                        <td class="px-4 py-3.5 font-medium nb-c-black">
                                            {{ $transaction->category?->name ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3.5 font-medium nb-c-black">
                                            {{ $transaction->wallet?->name ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3.5">
                                            @if ($transaction->type === 'income')
                                                <span class="inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-green px-2 py-0.5 text-xs font-black nb-c-black">
                                                    <i data-lucide="trending-up" class="h-3 w-3"></i>
                                                    Masuk
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-pink px-2 py-0.5 text-xs font-black nb-c-black">
                                                    <i data-lucide="trending-down" class="h-3 w-3"></i>
                                                    Keluar
                                                </span>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3.5 text-right font-black {{ $transaction->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                            {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format((float) $transaction->amount, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="nb-pagination mt-5">
                        {{ $transactionList->links() }}
                    </div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream py-14 text-center">
                        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl nb-border-3px nb-bg-green nb-shadow-4">
                            <i data-lucide="receipt" class="h-7 w-7 nb-c-black"></i>
                        </div>
                        <p class="font-black nb-c-black">Belum ada transaksi</p>
                        <p class="mt-1 text-sm font-medium nb-c-black-60">Tidak ditemukan transaksi pada periode yang dipilih.</p>
                        <a href="{{ route('transactions.create') }}"
                           class="nb-btn mt-5 inline-flex items-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-2.5 text-sm font-black uppercase tracking-wider nb-c-white">
                            <i data-lucide="plus" class="h-4 w-4"></i>
                            Tambah Transaksi
                        </a>
                    </div>
                @endif
            </section>

        </div>
    </div>

    {{-- CHART.JS --}}
    @if ($dailyReports->isNotEmpty())
        @php
            $groupedDailyReports = $dailyReports->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->transaction_date)->format('Y-m-d');
            });

            $chartLabels = $groupedDailyReports->keys()->map(function ($date) {
                return \Carbon\Carbon::parse($date)->translatedFormat('d M');
            })->values();

            $incomeData = $groupedDailyReports->map(function ($items) {
                return (float) ($items->firstWhere('type', 'income')->total ?? 0);
            })->values();

            $expenseData = $groupedDailyReports->map(function ($items) {
                return (float) ($items->firstWhere('type', 'expense')->total ?? 0);
            })->values();
        @endphp

        @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const canvas = document.getElementById('financialChart');
                if (!canvas || typeof window.Chart === 'undefined') return;

                new window.Chart(canvas, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [
                            {
                                label: 'Pemasukan',
                                data: @json($incomeData),
                                backgroundColor: '#3DDC97',
                                borderColor: '#000',
                                borderWidth: 2,
                                borderRadius: 4,
                                borderSkipped: false,
                                maxBarThickness: 40,
                            },
                            {
                                label: 'Pengeluaran',
                                data: @json($expenseData),
                                backgroundColor: '#FF8FB1',
                                borderColor: '#000',
                                borderWidth: 2,
                                borderRadius: 4,
                                borderSkipped: false,
                                maxBarThickness: 40,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { intersect: false, mode: 'index' },
                        plugins: {
                            legend: {
                                position: 'top',
                                align: 'end',
                                labels: {
                                    usePointStyle: true,
                                    pointStyle: 'rectRounded',
                                    boxWidth: 10,
                                    padding: 20,
                                    color: '#000',
                                    font: { size: 12, weight: 'bold' }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#000',
                                titleColor: '#FFD23F',
                                bodyColor: '#fff',
                                borderColor: '#FFD23F',
                                borderWidth: 2,
                                cornerRadius: 6,
                                padding: 10,
                                titleFont: { weight: 'bold' },
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
    @endif

</x-app-layout>