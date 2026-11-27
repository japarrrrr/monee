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

    <div class="min-h-screen nb-bg-page">
        <div class="mx-auto max-w-7xl space-y-10 px-5 py-8 sm:px-8 lg:px-10 xl:px-12">

            {{-- HEADER --}}
            <header class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-3 py-1 nb-text-10px font-black uppercase nb-tracking-wide nb-c-black nb-shadow-2">
                        <i data-lucide="arrow-left-right" class="h-3.5 w-3.5"></i>
                        Arus Transaksi
                    </span>
                    <h1 class="mt-2 text-3xl font-black tracking-tight nb-c-black sm:text-4xl lg:text-5xl">
                        Daftar Transaksi
                        <span class="ml-2 inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 nb-c-white nb-shadow-4">Kelola</span>
                    </h1>
                    <p class="mt-2 text-sm font-medium nb-c-black-60">Catat, telusuri, dan saring seluruh riwayat perputaran dana Anda.</p>
                </div>
                <a href="{{ route('transactions.create') }}"
                   class="nb-btn flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-3 text-sm font-black uppercase nb-tracking-wide nb-c-white">
                    <i data-lucide="plus" class="h-4 w-4"></i>
                    Tambah Transaksi
                </a>
            </header>

            {{-- FILTER + SEARCH BAR --}}
            <section class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 sm:p-8 mt-10">
                <form method="GET" action="{{ route('transactions.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">

                    {{-- Search --}}
                    <div class="flex-1">
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Pencarian</label>
                        <div class="relative">
                            <i data-lucide="search" class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 nb-c-black-60"></i>
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari kategori atau keterangan..."
                                   class="nb-input w-full pl-10 rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">
                        </div>
                    </div>

                    {{-- Jenis --}}
                    <div class="sm:w-44">
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Jenis</label>
                        <select name="type" class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-bold">
                            <option value="">Semua Jenis</option>
                            <option value="income"  {{ request('type') === 'income'  ? 'selected' : '' }}>Pemasukan</option>
                            <option value="expense" {{ request('type') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                    </div>

                    {{-- Dari Tanggal --}}
                    <div class="sm:w-36">
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Dari</label>
                        <input type="date"
                               name="start_date"
                               value="{{ request('start_date') }}"
                               class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">
                    </div>

                    {{-- Sampai Tanggal --}}
                    <div class="sm:w-36">
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Sampai</label>
                        <input type="date"
                               name="end_date"
                               value="{{ request('end_date') }}"
                               class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3 sm:shrink-0">
                        <button type="submit"
                                class="nb-btn px-5 py-3 text-xs flex items-center gap-2 rounded-lg nb-border-3px nb-bg-blue nb-c-white">
                            <i data-lucide="filter" class="h-4 w-4"></i>
                            Filter
                        </button>
                        @if(request()->hasAny(['search', 'type', 'start_date', 'end_date']))
                            <a href="{{ route('transactions.index') }}"
                               class="nb-btn px-4 py-3 text-xs flex items-center gap-2 rounded-lg nb-border-3px nb-bg-white nb-c-black">
                                <i data-lucide="refresh-cw" class="h-3.5 w-3.5"></i>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </section>

            {{-- TRANSACTION LIST CONTAINER --}}
            <section class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 sm:p-8 mt-10">

                {{-- Table Header --}}
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 nb-border-b-3px mb-6">
                    <div>
                        <h2 class="text-lg font-black nb-c-black">Riwayat Transaksi</h2>
                        <p class="text-xs font-bold nb-c-black-60">
                            Ditemukan <strong>{{ $transactions->total() }}</strong> catatan transaksi
                        </p>
                    </div>
                    <span class="nb-badge nb-bg-cream nb-c-black nb-text-10px">
                        Halaman {{ $transactions->currentPage() }} dari {{ $transactions->lastPage() }}
                    </span>
                </div>

                @if ($transactions->isEmpty())
                    {{-- EMPTY STATE --}}
                    <div class="py-12 text-center rounded-xl nb-border-dashed nb-bg-cream px-4">
                        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl nb-border-3px nb-bg-yellow nb-shadow-4 nb-c-black">
                            <i data-lucide="receipt" class="h-7 w-7"></i>
                        </div>
                        <h3 class="text-base font-black nb-c-black">Tidak Ada Transaksi</h3>
                        <p class="mt-1 text-xs font-bold nb-c-black-60">
                            Tidak ada transaksi yang cocok dengan kriteria filter saat ini.
                        </p>
                        <a href="{{ route('transactions.create') }}"
                           class="nb-btn mt-4 px-4 py-2.5 text-xs inline-flex items-center gap-1.5 rounded-lg nb-border-3px nb-bg-blue nb-c-white">
                            <i data-lucide="plus" class="h-4 w-4"></i>
                            Tambah Transaksi Baru
                        </a>
                    </div>
                @else
                    {{-- TRANSACTIONS LIST --}}
                    <div class="space-y-3">
                        @foreach ($transactions as $transaction)
                            <div class="nb-tr rounded-xl nb-border-2px nb-bg-white p-4 nb-shadow-2 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex min-w-0 items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl nb-border-2px nb-shadow-2
                                        {{ $transaction->type === 'income' ? 'nb-bg-green' : 'nb-bg-pink' }}">
                                        <i data-lucide="{{ $transaction->type === 'income' ? 'trending-up' : 'trending-down' }}"
                                           class="h-5 w-5 nb-c-white"></i>
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
                                            · <span class="nb-c-black font-extrabold">{{ $transaction->wallet->name }}</span>
                                            @if($transaction->description)
                                                · {{ Str::limit($transaction->description, 35) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end gap-3 pt-3 sm:pt-0 nb-border-t sm:border-0 nb-border-dashed">
                                    <p class="whitespace-nowrap text-base font-black {{ $transaction->type === 'income' ? 'nb-c-green' : 'nb-c-red' }}">
                                        {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </p>

                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('transactions.edit', $transaction->id) }}"
                                           class="nb-btn py-1.5 px-3 text-xs flex items-center justify-center rounded-lg nb-border-3px nb-bg-white nb-c-black">
                                            <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                        </a>

                                        <button type="button"
                                                onclick="confirmDelete('delete-tx-{{ $transaction->id }}', 'Hapus transaksi senilai Rp {{ number_format($transaction->amount, 0, ',', '.') }}?')"
                                                class="nb-btn py-1.5 px-3 text-xs flex items-center justify-center rounded-lg nb-border-3px nb-bg-red nb-c-white">
                                            <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                        </button>

                                        <form id="delete-tx-{{ $transaction->id }}"
                                              action="{{ route('transactions.destroy', $transaction->id) }}"
                                              method="POST"
                                              class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- PAGINATION --}}
                    <div class="nb-pagination mt-8 pt-6 nb-border-t-3px">
                        {{ $transactions->links() }}
                    </div>
                @endif

            </section>

        </div>
    </div>
</x-app-layout>