<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            {{-- HEADER --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#FACC15] border-2 border-[#171717] px-2.5 py-1 shadow-[2px_2px_0px_#171717] mb-2 text-xs font-black text-[#171717] uppercase tracking-wider">
                        <i data-lucide="arrow-left-right" class="h-3.5 w-3.5"></i>
                        Arus Transaksi
                    </div>
                    <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl lg:text-4xl">
                        Daftar Transaksi
                    </h1>
                    <p class="mt-1 text-sm font-bold text-[#525252]">
                        Catat, telusuri, dan saring seluruh riwayat perputaran dana Anda.
                    </p>
                </div>
                <a href="{{ route('transactions.create') }}"
                   class="neo-btn neo-btn-primary px-5 py-3 text-sm flex items-center gap-2">
                    <i data-lucide="plus" class="h-5 w-5 stroke-[2.5]"></i>
                    Tambah Transaksi
                </a>
            </div>

            {{-- FILTER + SEARCH BAR (NEO-BRUTALISM) --}}
            <div class="neo-card p-5">
                <form method="GET" action="{{ route('transactions.index') }}" class="flex flex-col gap-3 sm:flex-row sm:items-end">

                    {{-- Search --}}
                    <div class="flex-1">
                        <label class="mb-1.5 block text-xs font-black text-[#171717] uppercase tracking-wider">Pencarian</label>
                        <div class="relative">
                            <i data-lucide="search" class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-[#171717]"></i>
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari kategori atau keterangan..."
                                   class="neo-input pl-10 text-sm">
                        </div>
                    </div>

                    {{-- Jenis --}}
                    <div class="sm:w-44">
                        <label class="mb-1.5 block text-xs font-black text-[#171717] uppercase tracking-wider">Jenis</label>
                        <select name="type" class="neo-input text-sm font-bold">
                            <option value="">Semua Jenis</option>
                            <option value="income"  {{ request('type') === 'income'  ? 'selected' : '' }}>Pemasukan</option>
                            <option value="expense" {{ request('type') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                    </div>

                    {{-- Dari Tanggal --}}
                    <div class="sm:w-36">
                        <label class="mb-1.5 block text-xs font-black text-[#171717] uppercase tracking-wider">Dari</label>
                        <input type="date"
                               name="start_date"
                               value="{{ request('start_date') }}"
                               class="neo-input text-sm">
                    </div>

                    {{-- Sampai Tanggal --}}
                    <div class="sm:w-36">
                        <label class="mb-1.5 block text-xs font-black text-[#171717] uppercase tracking-wider">Sampai</label>
                        <input type="date"
                               name="end_date"
                               value="{{ request('end_date') }}"
                               class="neo-input text-sm">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-2">
                        <button type="submit"
                                class="neo-btn neo-btn-primary px-4 py-2.5 text-xs flex items-center gap-1.5">
                            <i data-lucide="filter" class="h-4 w-4"></i>
                            Filter
                        </button>
                        @if(request()->hasAny(['search', 'type', 'start_date', 'end_date']))
                            <a href="{{ route('transactions.index') }}"
                               class="neo-btn neo-btn-white px-3.5 py-2.5 text-xs flex items-center gap-1">
                                <i data-lucide="refresh-cw" class="h-3.5 w-3.5"></i>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- TRANSACTION LIST CONTAINER --}}
            <div class="neo-card p-5 sm:p-6">

                {{-- Table Header --}}
                <div class="flex items-center justify-between pb-4 border-b-2 border-[#171717]/10 mb-4">
                    <div>
                        <h2 class="text-lg font-black text-[#171717]">Riwayat Transaksi</h2>
                        <p class="text-xs font-bold text-[#525252]">
                            Ditemukan <strong>{{ $transactions->total() }}</strong> catatan transaksi
                        </p>
                    </div>
                    <span class="neo-badge bg-[#F5F5F0] text-[#171717] text-xs">
                        Halaman {{ $transactions->currentPage() }} dari {{ $transactions->lastPage() }}
                    </span>
                </div>

                @if ($transactions->isEmpty())
                    {{-- EMPTY STATE --}}
                    <div class="py-12 text-center rounded-xl border-2 border-dashed border-[#171717] bg-[#F5F5F0] p-6">
                        <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl bg-white border-2 border-[#171717] shadow-[2px_2px_0px_#171717]">
                            <i data-lucide="receipt" class="h-7 w-7 text-[#171717]"></i>
                        </div>
                        <h3 class="text-base font-black text-[#171717]">Tidak Ada Transaksi</h3>
                        <p class="mt-1 text-xs font-bold text-[#525252]">
                            Tidak ada transaksi yang cocok dengan kriteria filter saat ini.
                        </p>
                        <a href="{{ route('transactions.create') }}"
                           class="neo-btn neo-btn-primary mt-4 px-4 py-2.5 text-xs inline-flex items-center gap-1.5">
                            <i data-lucide="plus" class="h-4 w-4"></i>
                            Tambah Transaksi Baru
                        </a>
                    </div>
                @else
                    {{-- TRANSACTIONS LIST --}}
                    <div class="space-y-2.5">
                        @foreach ($transactions as $transaction)
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-3.5 rounded-xl border-2 border-[#171717] bg-white shadow-[2px_2px_0px_#171717] transition hover:translate-x-0.5 hover:shadow-[3px_3px_0px_#171717]">

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
                                            · <span class="text-[#171717] font-extrabold">{{ $transaction->wallet->name }}</span>
                                            @if($transaction->description)
                                                · {{ Str::limit($transaction->description, 35) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end gap-3 pt-2 sm:pt-0 border-t sm:border-0 border-[#171717]/10">
                                    <p class="whitespace-nowrap text-base font-black {{ $transaction->type === 'income' ? 'text-[#16A34A]' : 'text-[#EF4444]' }}">
                                        {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </p>

                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('transactions.edit', $transaction->id) }}"
                                           class="neo-btn neo-btn-white py-1 px-2.5 text-xs flex items-center justify-center">
                                            <i data-lucide="pencil" class="h-3 w-3"></i>
                                        </a>

                                        <button type="button"
                                                onclick="confirmDelete('delete-tx-{{ $transaction->id }}', 'Hapus transaksi senilai Rp {{ number_format($transaction->amount, 0, ',', '.') }}?')"
                                                class="neo-btn neo-btn-danger py-1 px-2.5 text-xs flex items-center justify-center">
                                            <i data-lucide="trash-2" class="h-3 w-3"></i>
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
                    <div class="mt-6 pt-4 border-t-2 border-[#171717]/10">
                        {{ $transactions->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>