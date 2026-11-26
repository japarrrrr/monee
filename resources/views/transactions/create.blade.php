<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BACK + HEADER --}}
            <div>
                <a href="{{ route('transactions.index') }}"
                   class="mb-3 inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-wider text-[#525252] hover:text-[#171717]">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Transaksi
                </a>
                <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl">Tambah Transaksi</h1>
                <p class="mt-1 text-sm font-bold text-[#525252]">Catat pemasukan atau pengeluaran baru Anda.</p>
            </div>

            <div class="neo-card p-6 sm:p-8 bg-white">

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border-2 border-[#171717] bg-[#EF4444]/15 p-4 shadow-[2px_2px_0px_#171717]">
                        <div class="flex items-start gap-3">
                            <i data-lucide="alert-circle" class="h-5 w-5 text-[#EF4444] shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm font-black text-[#EF4444]">Periksa kembali data berikut:</p>
                                <ul class="mt-1 list-inside list-disc text-xs font-bold text-[#171717] space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($wallets->isEmpty())
                    <div class="rounded-xl border-2 border-[#171717] bg-[#FACC15] p-5 shadow-[3px_3px_0px_#171717]">
                        <div class="flex gap-3">
                            <i data-lucide="alert-triangle" class="h-5 w-5 shrink-0 text-[#171717] mt-0.5"></i>
                            <div>
                                <p class="font-black text-[#171717]">Belum Ada Dompet</p>
                                <p class="mt-1 text-xs font-bold text-[#171717]">Tambahkan dompet terlebih dahulu sebelum mencatat transaksi.</p>
                                <a href="{{ route('wallets.create') }}"
                                   class="neo-btn neo-btn-primary mt-3 px-4 py-2 text-xs inline-flex items-center gap-1.5">
                                    <i data-lucide="plus" class="h-4 w-4"></i>
                                    Tambah Dompet
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif ($categories->isEmpty())
                    <div class="rounded-xl border-2 border-[#171717] bg-[#FACC15] p-5 shadow-[3px_3px_0px_#171717]">
                        <div class="flex gap-3">
                            <i data-lucide="alert-triangle" class="h-5 w-5 shrink-0 text-[#171717] mt-0.5"></i>
                            <div>
                                <p class="font-black text-[#171717]">Belum Ada Kategori</p>
                                <p class="mt-1 text-xs font-bold text-[#171717]">Tambahkan kategori pemasukan atau pengeluaran terlebih dahulu.</p>
                                <a href="{{ route('categories.create') }}"
                                   class="neo-btn neo-btn-primary mt-3 px-4 py-2 text-xs inline-flex items-center gap-1.5">
                                    <i data-lucide="plus" class="h-4 w-4"></i>
                                    Tambah Kategori
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-6" x-data="{ currentType: '{{ old('type', 'expense') }}' }">
                        @csrf

                        {{-- TYPE --}}
                        <div>
                            <label class="mb-2.5 block text-xs font-black uppercase tracking-wider text-[#171717]">Jenis Transaksi</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="income" class="peer sr-only"
                                           x-model="currentType"
                                           {{ old('type', 'expense') === 'income' ? 'checked' : '' }}>
                                    <div class="flex items-center gap-3 rounded-xl border-2 border-[#171717] bg-white p-3.5 transition
                                                peer-checked:bg-[#16A34A] peer-checked:text-white peer-checked:shadow-[3px_3px_0px_#171717] hover:bg-[#F5F5F0]">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border-2 border-[#171717] bg-white text-[#171717]">
                                            <i data-lucide="trending-up" class="h-5 w-5 stroke-[2.5] text-[#16A34A]"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black">Pemasukan</p>
                                            <p class="text-[10px] font-bold opacity-80">Uang masuk</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="expense" class="peer sr-only"
                                           x-model="currentType"
                                           {{ old('type', 'expense') === 'expense' ? 'checked' : '' }}>
                                    <div class="flex items-center gap-3 rounded-xl border-2 border-[#171717] bg-white p-3.5 transition
                                                peer-checked:bg-[#EF4444] peer-checked:text-white peer-checked:shadow-[3px_3px_0px_#171717] hover:bg-[#F5F5F0]">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border-2 border-[#171717] bg-white text-[#171717]">
                                            <i data-lucide="trending-down" class="h-5 w-5 stroke-[2.5] text-[#EF4444]"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black">Pengeluaran</p>
                                            <p class="text-[10px] font-bold opacity-80">Uang keluar</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            @error('type')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                        </div>

                        {{-- NOMINAL --}}
                        <div>
                            <label for="amount" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Nominal Transaksi</label>
                            <div class="flex rounded-xl border-2 border-[#171717] overflow-hidden focus-within:shadow-[3px_3px_0px_#171717] bg-white">
                                <span class="flex items-center bg-[#FACC15] px-4 text-sm font-black text-[#171717] border-r-2 border-[#171717]">Rp</span>
                                <input type="number"
                                       id="amount"
                                       name="amount"
                                       value="{{ old('amount') }}"
                                       min="0.01"
                                       step="0.01"
                                       required
                                       placeholder="0"
                                       class="w-full border-0 px-4 py-3 text-sm font-bold text-[#171717] outline-none">
                            </div>
                            @error('amount')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                        </div>

                        {{-- DOMPET & KATEGORI (GRID 2) --}}
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            {{-- Dompet --}}
                            <div>
                                <label for="wallet_id" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Pilih Dompet</label>
                                <select id="wallet_id" name="wallet_id" required class="neo-input font-bold">
                                    <option value="" disabled {{ old('wallet_id') ? '' : 'selected' }}>Pilih dompet...</option>
                                    @foreach ($wallets as $wallet)
                                        <option value="{{ $wallet->id }}" {{ old('wallet_id') == $wallet->id ? 'selected' : '' }}>
                                            {{ $wallet->name }} (Rp {{ number_format($wallet->current_balance ?? 0, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('wallet_id')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                            </div>

                            {{-- Kategori --}}
                            <div>
                                <label for="category_id" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Pilih Kategori</label>
                                <select id="category_id" name="category_id" required class="neo-input font-bold">
                                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Pilih kategori...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                                x-show="currentType === '{{ $category->type }}'"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }} ({{ $category->type === 'income' ? 'Masuk' : 'Keluar' }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                            </div>

                        </div>

                        {{-- TANGGAL TRANSAKSI --}}
                        <div>
                            <label for="transaction_date" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Tanggal Transaksi</label>
                            <input type="date"
                                   id="transaction_date"
                                   name="transaction_date"
                                   value="{{ old('transaction_date', now()->toDateString()) }}"
                                   required
                                   class="neo-input font-bold">
                            @error('transaction_date')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                        </div>

                        {{-- DESKRIPSI --}}
                        <div>
                            <label for="description" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">
                                Keterangan / Catatan <span class="font-bold text-[#525252]">(Opsional)</span>
                            </label>
                            <textarea id="description"
                                      name="description"
                                      rows="3"
                                      placeholder="Catatan tambahan seperti nama toko atau keperluan..."
                                      class="neo-input">{{ old('description') }}</textarea>
                            @error('description')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="flex flex-col-reverse gap-3 border-t-2 border-[#171717]/10 pt-5 sm:flex-row sm:justify-end">
                            <a href="{{ route('transactions.index') }}"
                               class="neo-btn neo-btn-white px-6 py-2.5 text-xs">
                                Batal
                            </a>
                            <button type="submit"
                                    class="neo-btn neo-btn-primary px-6 py-2.5 text-xs">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>