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

        .nb-pagination nav a,
        .nb-pagination nav span[aria-disabled] span,
        .nb-pagination nav span[aria-current] span{
            border:2px solid #000!important;
            border-radius:.5rem;
            margin:0 2px;
            font-weight:700;
            color:#000!important;
            background:#fff!important;
        }
        .nb-pagination nav span[aria-current] span{background:#FFD23F!important}
        .nb-pagination nav a:hover{background:#FFF3C4!important}
        .nb-pagination nav .shadow-sm{box-shadow:none}

        @media(prefers-reduced-motion:reduce){
            .nb-card,.nb-btn,.nb-input{transition:none}
        }
    </style>

    @php
        $summaryCards = [
            [
                'label' => 'Total Pemasukan',
                'value' => 'Rp '.number_format((float)$totalIncome,0,',','.'),
                'description' => 'Selama periode terpilih',
                'color' => 'nb-bg-green',
                'icon' => 'trending-up',
                'text' => 'nb-c-black',
            ],
            [
                'label' => 'Total Pengeluaran',
                'value' => 'Rp '.number_format((float)$totalExpense,0,',','.'),
                'description' => 'Selama periode terpilih',
                'color' => 'nb-bg-pink',
                'icon' => 'trending-down',
                'text' => 'nb-c-black',
            ],
            [
                'label' => 'Selisih',
                'value' => ($netIncome < 0 ? '-' : '').'Rp '.number_format(abs((float)$netIncome),0,',','.'),
                'description' => $netIncome >= 0 ? 'Keuangan positif' : 'Pengeluaran lebih besar',
                'color' => $netIncome >= 0 ? 'nb-bg-blue' : 'nb-bg-red',
                'icon' => 'wallet',
                'text' => 'nb-c-white',
            ],
            [
                'label' => 'Jumlah Transaksi',
                'value' => number_format($totalTransactions,0,',','.'),
                'description' => 'Transaksi dalam periode ini',
                'color' => 'nb-bg-yellow',
                'icon' => 'receipt-text',
                'text' => 'nb-c-black',
            ],
        ];
    @endphp

    <div class="min-h-screen nb-bg-page">
        <div class="mx-auto max-w-7xl space-y-10 px-5 py-8 sm:px-8 lg:px-10 xl:px-12">

            {{-- HEADER --}}
            <header class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-3 py-1 nb-text-10px font-black uppercase nb-tracking-wide nb-c-black nb-shadow-2">
                        <i data-lucide="chart-column" class="h-3.5 w-3.5"></i>
                        Analisis
                    </span>
                    <h1 class="mt-2 text-3xl font-black tracking-tight nb-c-black sm:text-4xl lg:text-5xl">
                        Laporan
                        <span class="ml-2 inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 nb-c-white nb-shadow-4">Keuangan</span>
                    </h1>
                    <p class="mt-2 text-sm font-medium nb-c-black-60">Pantau pemasukan, pengeluaran, dan kondisi keuanganmu.</p>
                </div>
            </header>

            {{-- FILTER PERIODE --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 mt-10" aria-labelledby="filter-heading">
                <div class="mb-4 flex items-center gap-3">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-yellow nb-shadow-2">
                        <i data-lucide="sliders-horizontal" class="h-4 w-4 nb-c-black"></i>
                    </div>
                    <h2 id="filter-heading" class="text-base font-black uppercase tracking-wide nb-c-black">Filter Periode</h2>
                </div>

                <form action="{{ route('reports.index') }}" method="GET">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:items-end">
                        @foreach ([
                            ['id'=>'start_date','label'=>'Dari Tanggal','value'=>request('start_date',$startDate->toDateString())],
                            ['id'=>'end_date','label'=>'Sampai Tanggal','value'=>request('end_date',$endDate->toDateString())],
                        ] as $date)
                            <div>
                                <label for="{{ $date['id'] }}" class="mb-2 block text-xs font-black uppercase tracking-wider nb-c-black">{{ $date['label'] }}</label>
                                <input type="date" name="{{ $date['id'] }}" id="{{ $date['id'] }}"
                                    value="{{ $date['value'] }}" max="{{ now()->toDateString() }}"
                                    class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">
                            </div>
                        @endforeach

                        <div class="flex gap-3 sm:col-span-2 lg:col-span-2">
                            <button type="submit" class="nb-btn flex flex-1 items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-3 text-sm font-black uppercase tracking-wider nb-c-white">
                                <i data-lucide="filter" class="h-4 w-4"></i> Terapkan
                            </button>
                            <a href="{{ route('reports.index') }}" class="nb-btn flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-white px-5 py-3 text-sm font-black uppercase tracking-wider nb-c-black">
                                <i data-lucide="refresh-cw" class="h-4 w-4"></i> Reset
                            </a>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mt-4 flex items-center gap-2 rounded-lg nb-border-3px nb-bg-red-soft px-4 py-3 text-sm font-bold nb-c-red nb-shadow-2" role="alert">
                            <i data-lucide="alert-circle" class="h-4 w-4 shrink-0"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mt-4 inline-flex flex-wrap items-center gap-2 rounded-lg nb-border-2px nb-bg-yellow-soft px-4 py-2.5 nb-shadow-2">
                        <i data-lucide="calendar" class="h-4 w-4 shrink-0 nb-c-black"></i>
                        <p class="text-sm font-bold nb-c-black">
                            Periode: {{ $startDate->translatedFormat('d F Y') }} — {{ $endDate->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </form>
            </section>

            {{-- RINGKASAN --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 mt-10">
                @foreach ($summaryCards as $card)
                    <div class="nb-card rounded-2xl nb-border-3px {{ $card['color'] }} p-5 nb-shadow-6 sm:p-6">
                        <div class="flex items-center justify-between">
                            <p class="nb-text-10px font-black uppercase nb-tracking-wide {{ $card['text'] }}">{{ $card['label'] }}</p>
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-white nb-shadow-2">
                                <i data-lucide="{{ $card['icon'] }}" class="h-5 w-5 nb-c-black"></i>
                            </div>
                        </div>
                        <p class="mt-4 text-2xl font-black {{ $card['text'] }} sm:text-3xl">{{ $card['value'] }}</p>
                        @if ($card['label'] === 'Selisih')
                            <p class="mt-2 inline-flex items-center gap-1 rounded-md nb-border-2px nb-bg-white px-2.5 py-0.5 text-xs font-black nb-c-black">
                                <i data-lucide="{{ $netIncome >= 0 ? 'circle-check' : 'triangle-alert' }}" class="h-3.5 w-3.5"></i>
                                {{ $card['description'] }}
                            </p>
                        @else
                            <p class="mt-1.5 text-xs font-semibold nb-c-black-60">{{ $card['description'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- GRAFIK HARIAN --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 mt-10" aria-labelledby="chart-heading">
                <div class="mb-4 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-blue nb-shadow-2">
                        <i data-lucide="chart-column" class="h-5 w-5 nb-c-white"></i>
                    </div>
                    <div>
                        <h2 id="chart-heading" class="text-lg font-black nb-c-black">Grafik Keuangan Harian</h2>
                        <p class="mt-0.5 text-sm font-medium nb-c-black-60">Perbandingan pemasukan dan pengeluaran berdasarkan tanggal.</p>
                    </div>
                </div>

                @if ($dailyReports->isNotEmpty())
                    <div class="relative h-64 w-full rounded-xl nb-border-2px nb-bg-cream p-4">
                        <canvas id="financialChart" aria-label="Grafik pemasukan dan pengeluaran harian" role="img"></canvas>
                    </div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream px-4 py-10 text-center">
                        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-xl nb-border-3px nb-bg-yellow nb-shadow-4">
                            <i data-lucide="chart-no-axes-combined" class="h-6 w-6 nb-c-black"></i>
                        </div>
                        <p class="text-sm font-black nb-c-black">Belum ada data grafik</p>
                        <p class="mt-1 text-sm font-medium nb-c-black-60">Tambahkan transaksi untuk melihat grafik keuangan.</p>
                    </div>
                @endif
            </section>

            {{-- LAPORAN KATEGORI --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 mt-10" aria-labelledby="category-heading">
                <div class="mb-4 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-pink nb-shadow-2">
                        <i data-lucide="tags" class="h-5 w-5 nb-c-black"></i>
                    </div>
                    <div>
                        <h2 id="category-heading" class="text-lg font-black nb-c-black">Laporan Berdasarkan Kategori</h2>
                        <p class="mt-0.5 text-sm font-medium nb-c-black-60">Rincian total transaksi untuk setiap kategori.</p>
                    </div>
                </div>

                @if ($categoryReports->isNotEmpty())
                    <div class="overflow-x-auto rounded-xl nb-border-3px nb-bg-white">
                        <table class="w-full text-left text-sm">
                            <thead class="nb-bg-yellow">
                                <tr class="nb-border-b-3px text-xs font-black uppercase tracking-wider nb-c-black">
                                    <th class="px-4 py-3">Kategori</th>
                                    <th class="px-4 py-3">Jenis</th>
                                    <th class="px-4 py-3 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody class="nb-bg-white">
                                @foreach ($categoryReports as $report)
                                    <tr class="nb-row nb-tr">
                                        <td class="px-4 py-3 font-bold nb-c-black">{{ $report->category?->name ?? 'Kategori tidak tersedia' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center gap-1 rounded-md nb-border-2px {{ $report->type === 'income' ? 'nb-bg-green' : 'nb-bg-pink' }} px-2 py-0.5 text-xs font-black nb-c-black">
                                                <i data-lucide="{{ $report->type === 'income' ? 'trending-up' : 'trending-down' }}" class="h-3 w-3"></i>
                                                {{ $report->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 text-right font-black {{ $report->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                            Rp {{ number_format((float)$report->total,0,',','.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream px-4 py-8 text-center">
                        <p class="text-sm font-bold nb-c-black-60">Belum ada transaksi berdasarkan kategori pada periode ini.</p>
                    </div>
                @endif
            </section>

            {{-- RIWAYAT TRANSAKSI --}}
            <section class="rounded-2xl nb-border-3px nb-bg-white p-5 nb-shadow-6 sm:p-6 mt-10" aria-labelledby="history-heading">
                <div class="mb-4 flex flex-col justify-between gap-3 pb-4 nb-border-b-3px sm:flex-row sm:items-start">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-green nb-shadow-2">
                            <i data-lucide="history" class="h-5 w-5 nb-c-black"></i>
                        </div>
                        <div>
                            <h2 id="history-heading" class="text-lg font-black nb-c-black">Riwayat Transaksi</h2>
                            <p class="mt-0.5 text-sm font-medium nb-c-black-60">Daftar transaksi sesuai periode yang dipilih.</p>
                        </div>
                    </div>
                </div>

                @if ($transactionList->isNotEmpty())
                    <div class="overflow-x-auto rounded-xl nb-border-3px nb-bg-white">
                        <table class="w-full min-w-[700px] text-left text-sm">
                            <thead class="nb-bg-yellow">
                                <tr class="nb-border-b-3px text-xs font-black uppercase tracking-wider nb-c-black">
                                    @foreach (['Tanggal','Keterangan','Kategori','Dompet','Jenis','Jumlah'] as $heading)
                                        <th class="px-4 py-3 {{ $heading === 'Jumlah' ? 'text-right' : '' }}">{{ $heading }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="nb-bg-white">
                                @foreach ($transactionList as $transaction)
                                    <tr class="nb-row nb-tr">
                                        <td class="whitespace-nowrap px-4 py-3 text-xs font-bold nb-c-black-60">{{ $transaction->transaction_date->translatedFormat('d M Y') }}</td>
                                        <td class="px-4 py-3 font-bold nb-c-black">{{ $transaction->description ?: '-' }}</td>
                                        <td class="px-4 py-3 font-medium nb-c-black">{{ $transaction->category?->name ?? '-' }}</td>
                                        <td class="px-4 py-3 font-medium nb-c-black">{{ $transaction->wallet?->name ?? '-' }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center gap-1 rounded-md nb-border-2px {{ $transaction->type === 'income' ? 'nb-bg-green' : 'nb-bg-pink' }} px-2 py-0.5 text-xs font-black nb-c-black">
                                                <i data-lucide="{{ $transaction->type === 'income' ? 'trending-up' : 'trending-down' }}" class="h-3 w-3"></i>
                                                {{ $transaction->type === 'income' ? 'Masuk' : 'Keluar' }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 text-right font-black {{ $transaction->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                            {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format((float)$transaction->amount,0,',','.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="nb-pagination mt-6">{{ $transactionList->links() }}</div>
                @else
                    <div class="rounded-xl nb-border-dashed nb-bg-cream px-4 py-10 text-center">
                        <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-xl nb-border-3px nb-bg-green nb-shadow-4">
                            <i data-lucide="receipt" class="h-6 w-6 nb-c-black"></i>
                        </div>
                        <p class="text-sm font-black nb-c-black">Belum ada transaksi</p>
                        <p class="mt-1 text-sm font-medium nb-c-black-60">Tidak ditemukan transaksi pada periode yang dipilih.</p>
                        <a href="{{ route('transactions.create') }}" class="nb-btn mt-4 inline-flex items-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-2.5 text-sm font-black uppercase tracking-wider nb-c-white">
                            <i data-lucide="plus" class="h-4 w-4"></i> Tambah Transaksi
                        </a>
                    </div>
                @endif
            </section>

        </div>
    </div>

    {{-- CHART.JS --}}
    @if ($dailyReports->isNotEmpty())
        @php
            $groupedDailyReports = $dailyReports->groupBy(fn($item) => \Carbon\Carbon::parse($item->transaction_date)->format('Y-m-d'));
            $chartLabels = $groupedDailyReports->keys()->map(fn($date) => \Carbon\Carbon::parse($date)->translatedFormat('d M'))->values();
            $incomeData = $groupedDailyReports->map(fn($items) => (float)($items->firstWhere('type','income')->total ?? 0))->values();
            $expenseData = $groupedDailyReports->map(fn($items) => (float)($items->firstWhere('type','expense')->total ?? 0))->values();
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
