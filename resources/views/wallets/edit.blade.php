<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8">
                <a href="{{ route('wallets.index') }}"
                   class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Dompet
                </a>

                <h1 class="text-2xl font-extrabold text-slate-800">
                    Edit Dompet
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Perbarui informasi dompet {{ $wallet->name }}.
                </p>
            </div>

            {{-- FORM --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">

                <form method="POST" action="{{ route('wallets.update', $wallet->id) }}">
                    @csrf
                    @method('PUT')

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
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Dompet
                            </label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $wallet->name) }}"
                                placeholder="Contoh: BCA, Tunai, GoPay"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Jenis Dompet
                            </label>
                            <select
                                name="type"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                            >
                                <option value="cash" {{ old('type', $wallet->type) === 'cash' ? 'selected' : '' }}>Tunai</option>
                                <option value="bank" {{ old('type', $wallet->type) === 'bank' ? 'selected' : '' }}>Bank</option>
                                <option value="ewallet" {{ old('type', $wallet->type) === 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Saldo Awal (Rp)
                            </label>
                            <input
                                type="number"
                                name="opening_balance"
                                min="0"
                                step="0.01"
                                value="{{ old('opening_balance', $wallet->opening_balance) }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Deskripsi
                                <span class="font-normal text-slate-400">(Opsional)</span>
                            </label>
                            <textarea
                                name="description"
                                rows="3"
                                placeholder="Tambahkan keterangan dompet..."
                                class="w-full rounded-xl border-slate-200 focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('description', $wallet->description) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('wallets.index') }}"
                           class="rounded-xl bg-slate-100 px-5 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-200">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow-md shadow-blue-600/20 transition hover:bg-blue-700"
                        >
                            <i data-lucide="save" class="h-4 w-4"></i>
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>