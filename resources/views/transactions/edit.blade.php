<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- BACK + HEADER --}}
            <div class="mb-8">
                <a href="{{ route('transactions.index') }}"
                   class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-blue-600">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Transaksi
                </a>
                <h1 class="text-2xl font-black tracking-tight text-slate-900">Edit Transaksi</h1>
                <p class="mt-1.5 text-sm text-slate-500">Perbarui informasi transaksi yang sudah tersimpan.</p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4">
                        <i data-lucide="alert-circle" class="mt-0.5 h-5 w-5 shrink-0 text-red-500"></i>
                        <div>
                            <p class="text-sm font-semibold text-red-700">Periksa kembali data berikut:</p>
                            <ul class="mt-1 list-inside list-disc space-y-0.5 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- TYPE --}}
                    <div>
                        <label class="mb-3 block text-sm font-semibold text-slate-700">Jenis Transaksi</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="type" value="income" class="peer sr-only"
                                       {{ old('type', $transaction->type) === 'income' ? 'checked' : '' }}>
                                <div class="flex flex-col items-center gap-2 rounded-xl border-2 border-slate-200 py-5 text-center transition
                                            hover:border-emerald-300 hover:bg-emerald-50
                                            peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100">
                                        <i data-lucide="trending-up" class="h-6 w-6 text-emerald-600"></i>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800">Pemasukan</span>
                                    <span class="text-xs text-slate-400">Uang masuk</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="type" value="expense" class="peer sr-only"
                                       {{ old('type', $transaction->type) === 'expense' ? 'checked' : '' }}>
                                <div class="flex flex-col items-center gap-2 rounded-xl border-2 border-slate-200 py-5 text-center transition
                                            hover:border-rose-300 hover:bg-rose-50
                                            peer-checked:border-rose-500 peer-checked:bg-rose-50">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-rose-100">
                                        <i data-lucide="trending-down" class="h-6 w-6 text-rose-600"></i>
                                    </div>
                                    <span class="text-sm font-bold text-slate-800">Pengeluaran</span>
                                    <span class="text-xs text-slate-400">Uang keluar</span>
                                </div>
                            </label>
                        </div>
                        @error('type')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- AMOUNT --}}
                    <div>
                        <label for="amount" class="mb-2 block text-sm font-semibold text-slate-700">Nominal Transaksi</label>
                        <div class="flex overflow-hidden rounded-xl border border-slate-300 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100">
                            <span class="flex items-center bg-slate-50 px-4 text-sm font-bold text-slate-500 border-r border-slate-300">Rp</span>
                            <input type="number"
                                   name="amount"
                                   id="amount"
                                   value="{{ old('amount', $transaction->amount) }}"
                                   min="0.01"
                                   step="0.01"
                                   class="w-full border-0 px-4 py-3 text-sm focus:ring-0"
                                   required>
                        </div>
                        @error('amount')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- CATEGORY --}}
                    <div>
                        <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                        <select name="category_id"
                                id="category_id"
                                class="w-full rounded-xl border-slate-300 py-3 text-sm transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                required>
                            <option value="">Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        data-type="{{ $category->type }}"
                                        {{ (string) old('category_id', $transaction->category_id) === (string) $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- WALLET --}}
                    <div>
                        <label for="wallet_id" class="mb-2 block text-sm font-semibold text-slate-700">Sumber Dompet</label>
                        <select name="wallet_id"
                                id="wallet_id"
                                class="w-full rounded-xl border-slate-300 py-3 text-sm transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                required>
                            <option value="">Pilih dompet</option>
                            @foreach ($wallets as $wallet)
                                <option value="{{ $wallet->id }}"
                                        {{ (string) old('wallet_id', $transaction->wallet_id) === (string) $wallet->id ? 'selected' : '' }}>
                                    {{ $wallet->name }} — Rp {{ number_format($wallet->current_balance, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        @error('wallet_id')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- DATE --}}
                    <div>
                        <label for="transaction_date" class="mb-2 block text-sm font-semibold text-slate-700">Tanggal Transaksi</label>
                        <input type="date"
                               name="transaction_date"
                               id="transaction_date"
                               value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}"
                               class="w-full rounded-xl border-slate-300 py-3 text-sm transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                               required>
                        @error('transaction_date')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- DESCRIPTION --}}
                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">
                            Catatan <span class="font-normal text-slate-400">(Opsional)</span>
                        </label>
                        <textarea name="description"
                                  id="description"
                                  rows="3"
                                  placeholder="Tambahkan keterangan transaksi..."
                                  class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('description', $transaction->description) }}</textarea>
                        @error('description')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- BUTTONS --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ route('transactions.index') }}"
                           class="inline-flex justify-center rounded-xl bg-slate-100 px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700">
                            <i data-lucide="save" class="h-4 w-4"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeInputs = document.querySelectorAll('input[name="type"]');
            const categorySelect = document.getElementById('category_id');
            if (!categorySelect) return;

            const options = Array.from(categorySelect.options);

            function filterCategories() {
                const selectedType = document.querySelector('input[name="type"]:checked')?.value;
                options.forEach(option => {
                    if (!option.value) return;
                    const matches = option.dataset.type === selectedType;
                    option.hidden = !matches;
                    option.disabled = !matches;
                });
                if (categorySelect.selectedOptions[0]?.disabled) {
                    categorySelect.value = '';
                }
            }

            typeInputs.forEach(input => input.addEventListener('change', filterCategories));
            filterCategories();
        });
    </script>
</x-app-layout>
