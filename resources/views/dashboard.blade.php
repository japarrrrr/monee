
<x-app-layout>
    <div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">

            {{-- HEADER --}}
            <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                <div>
                    <p class="text-sm font-medium text-slate-400">
                        {{ now()->translatedFormat('l, d F Y') }}
                    </p>
                    <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-800 sm:text-3xl">
                        Halo, {{ Auth::user()->name }}!
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Berikut ringkasan kondisi keuanganmu.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button class="hidden rounded-xl border border-slate-200 bg-white p-3 text-slate-500 shadow-sm transition hover:bg-slate-50 sm:block">
                        <i data-lucide="bell" class="h-5 w-5"></i>
                    </button>

                    <button class="flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-200 transition hover:bg-blue-700">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Tambah Transaksi
                    </button>
                </div>
            </div>

            {{-- MAIN BALANCE --}}
            <div class="relative mb-6 overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-600 to-indigo-700 p-6 text-white shadow-xl shadow-blue-100 sm:p-8">
                <div class="pointer-events-none absolute -right-16 -top-24 h-72 w-72 rounded-full border-[35px] border-white/5"></div>
                <div class="pointer-events-none absolute -bottom-28 right-32 h-64 w-64 rounded-full bg-white/5"></div>

                <div class="relative z-10 flex flex-col justify-between gap-8 sm:flex-row sm:items-center">
                    <div>
                        <div class="flex items-center gap-2 text-sm font-medium text-blue-100">
                            <i data-lucide="wallet" class="h-4 w-4"></i>
                            Total Saldo
                        </div>

                        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                            Rp 8.450.000
                        </h2>

                        <p class="mt-3 text-sm text-blue-100">
                            Total saldo dari seluruh dompet
                        </p>
                    </div>

                    <div class="flex items-center gap-3 rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15">
                            <i data-lucide="chart-no-axes-combined" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <p class="text-xs text-blue-100">Periode</p>
                            <p class="mt-1 text-sm font-bold">November 2026</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SUMMARY CARDS --}}
            <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <i data-lucide="arrow-left-right" class="h-5 w-5"></i>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                            Pemasukan
                        </span>
                    </div>
                    <p class="mt-5 text-sm font-medium text-slate-400">Total pemasukan bulan ini</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-slate-800">Rp 5.000.000</h3>
                    <p class="mt-2 text-xs text-slate-400">November 2026</p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                            <i data-lucide="arrow-left-right" class="h-5 w-5 rotate-180"></i>
                        </div>
                        <span class="rounded-full bg-rose-50 px-3 py-1 text-xs font-semibold text-rose-600">
                            Pengeluaran
                        </span>
                    </div>
                    <p class="mt-5 text-sm font-medium text-slate-400">Total pengeluaran bulan ini</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-slate-800">Rp 2.350.000</h3>
                    <p class="mt-2 text-xs text-slate-400">November 2026</p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md sm:col-span-2 xl:col-span-1">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <i data-lucide="wallet" class="h-5 w-5"></i>
                        </div>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-600">
                            Arus Bersih
                        </span>
                    </div>
                    <p class="mt-5 text-sm font-medium text-slate-400">Selisih pemasukan dan pengeluaran</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-slate-800">Rp 2.650.000</h3>
                    <p class="mt-2 text-xs font-medium text-emerald-600">Keuangan positif</p>
                </div>

            </div>

            {{-- CHART AND WALLET --}}
            <div class="mb-8 grid grid-cols-1 gap-6 xl:grid-cols-3">

                {{-- CHART --}}
                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6 xl:col-span-2">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div>
                            <h3 class="font-bold text-slate-800">Arus Keuangan</h3>
                            <p class="mt-1 text-xs text-slate-400">Ringkasan pemasukan dan pengeluaran</p>
                        </div>
                        <select class="rounded-xl border-slate-200 bg-slate-50 py-2 pl-3 pr-8 text-xs font-medium text-slate-600 focus:border-blue-500 focus:ring-blue-500">
                            <option>7 Hari Terakhir</option>
                            <option>Bulan Ini</option>
                        </select>
                    </div>

                    <div class="mt-7 flex flex-wrap gap-5 text-xs font-medium text-slate-500">
                        <span class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                            Pemasukan
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-rose-400"></span>
                            Pengeluaran
                        </span>
                    </div>

                    {{-- Placeholder chart --}}
                    <div class="mt-6 grid h-48 grid-cols-7 items-end gap-3 border-b border-slate-100 pb-2 sm:gap-6">
                        @foreach([
                            [65, 35], [85, 45], [55, 25], [95, 55],
                            [70, 40], [100, 50], [80, 30]
                        ] as $bar)
                            <div class="flex h-full items-end justify-center gap-1.5">
                                <div class="w-full max-w-5 rounded-t-lg bg-blue-600 transition hover:bg-blue-700"
                                     style="height: {{ $bar[0] }}%"></div>
                                <div class="w-full max-w-5 rounded-t-lg bg-rose-400 transition hover:bg-rose-500"
                                     style="height: {{ $bar[1] }}%"></div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3 grid grid-cols-7 text-center text-[10px] font-medium text-slate-400 sm:text-xs">
                        @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $day)
                            <span>{{ $day }}</span>
                        @endforeach
                    </div>
                </div>

                {{-- WALLETS --}}
                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-bold text-slate-800">Dompet Saya</h3>
                            <p class="mt-1 text-xs text-slate-400">Saldo setiap dompet</p>
                        </div>
                        <i data-lucide="wallet" class="h-5 w-5 text-blue-600"></i>
                    </div>

                    <div class="mt-6 space-y-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                <i data-lucide="wallet" class="h-5 w-5"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-slate-700">Tunai</p>
                                <p class="text-xs text-slate-400">Uang cash</p>
                            </div>
                            <p class="text-sm font-bold text-slate-800">Rp 1.200.000</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                                <i data-lucide="wallet" class="h-5 w-5"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-slate-700">Bank</p>
                                <p class="text-xs text-slate-400">Rekening utama</p>
                            </div>
                            <p class="text-sm font-bold text-slate-800">Rp 5.750.000</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                                <i data-lucide="wallet" class="h-5 w-5"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-semibold text-slate-700">E-Wallet</p>
                                <p class="text-xs text-slate-400">Dompet digital</p>
                            </div>
                            <p class="text-sm font-bold text-slate-800">Rp 1.500.000</p>
                        </div>
                    </div>

                    <button class="mt-7 w-full rounded-xl border border-blue-100 py-3 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                        Kelola Dompet
                    </button>
                </div>
            </div>

            {{-- RECENT TRANSACTIONS --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-slate-800">Transaksi Terbaru</h3>
                        <p class="mt-1 text-xs text-slate-400">Aktivitas keuangan terakhir</p>
                    </div>
                    <a href="#" class="text-xs font-bold text-blue-600 transition hover:text-blue-700">
                        Lihat Semua
                    </a>
                </div>

                <div class="divide-y divide-slate-100">

                    @foreach([
                        ['Gaji Bulanan','20 November 2026','Pemasukan','+ Rp 5.000.000','blue'],
                        ['Makan Siang','19 November 2026','Pengeluaran','- Rp 25.000','rose'],
                        ['Transportasi','18 November 2026','Pengeluaran','- Rp 15.000','rose'],
                        ['Belanja Bulanan','17 November 2026','Pengeluaran','- Rp 350.000','rose'],
                    ] as $transaction)
                        <div class="flex items-center justify-between gap-3 py-4 first:pt-0 last:pb-0">
                            <div class="flex min-w-0 items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl {{ $transaction[4] === 'blue' ? 'bg-blue-50 text-blue-600' : 'bg-rose-50 text-rose-500' }}">
                                    <i data-lucide="{{ $transaction[4] === 'blue' ? 'wallet' : 'arrow-left-right' }}" class="h-5 w-5"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="truncate text-sm font-semibold text-slate-800">{{ $transaction[0] }}</p>
                                    <p class="mt-1 text-xs text-slate-400">{{ $transaction[1] }} · {{ $transaction[2] }}</p>
                                </div>
                            </div>
                            <p class="whitespace-nowrap text-sm font-bold {{ $transaction[4] === 'blue' ? 'text-emerald-600' : 'text-rose-500' }}">
                                {{ $transaction[3] }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
