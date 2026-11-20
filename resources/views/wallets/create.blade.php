<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="mb-8">
            <a href="{{ route('wallets.index') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-primary mb-4">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali ke Dompet
            </a>

            <h1 class="text-2xl font-bold text-slate-800">Tambah Dompet</h1>
            <p class="text-sm text-slate-500 mt-1">
                Tambahkan dompet baru untuk mencatat keuangan Anda.
            </p>
        </div>

        <div class="bg-white border border-slate-100 rounded-card p-6 sm:p-8 shadow-sm">

            <form method="POST" action="{{ route('wallets.store') }}">
                @csrf
                @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    <p class="mb-2 font-semibold">Periksa kembali input Anda:</p>
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="space-y-6">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Dompet
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: BCA, Tunai, GoPay"
                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jenis Dompet
                        </label>
                        <select
                            name="type"
                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Pilih jenis dompet</option>
                            <option value="cash" {{ old('type') === 'cash' ? 'selected' : '' }}>Tunai</option>
                            <option value="bank" {{ old('type') === 'bank' ? 'selected' : '' }}>Bank</option>
                            <option value="ewallet" {{ old('type') === 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Saldo Awal (Rp)
                        </label>
                        <input
                            type="number"
                            name="opening_balance"
                            min="0"
                            step="0.01"
                            value="{{ old('opening_balance', '0') }}"
                            placeholder="0"
                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Deskripsi
                            <span class="font-normal text-slate-400">(Opsional)</span>
                        </label>
                        <textarea
                            name="description"
                            rows="3"
                            placeholder="Tambahkan keterangan dompet..."
                            class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('description') }}</textarea>
                    </div>

                </div>

                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-8">
                    <a href="{{ route('wallets.index') }}"
                       class="px-5 py-3 text-center text-sm font-semibold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200 transition">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        <i data-lucide="save" class="h-4 w-4"></i>
                        Simpan Dompet
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>