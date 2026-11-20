<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @if (session('success'))
        <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
            <i data-lucide="check-circle" class="h-5 w-5 shrink-0"></i>
            {{ session('success') }}
        </div>
        @endif
            {{-- HEADER --}}
            <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="mb-2 text-sm font-semibold text-blue-600">KEUANGAN SAYA</p>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">
                        Dompet
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Kelola saldo dan pantau seluruh sumber keuangan Anda.
                    </p>
                </div>

                <a href="{{ route('wallets.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700">
                    <i data-lucide="plus" class="h-5 w-5"></i>
                    Tambah Dompet
                </a>
            </div>

            {{-- SUMMARY --}}
            <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Dompet</p>
                            <h2 class="mt-2 text-3xl font-extrabold text-slate-800">
                                {{ $wallets->count() }}
                            </h2>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <i data-lucide="wallet" class="h-6 w-6"></i>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total Saldo Awal</p>
                            <h2 class="mt-2 text-2xl font-extrabold text-slate-800">
                                Rp {{ number_format($wallets->sum('opening_balance'), 0, ',', '.') }}
                            </h2>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <i data-lucide="wallet-cards" class="h-6 w-6"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- WALLET LIST --}}
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Daftar Dompet</h2>
                    <p class="mt-1 text-sm text-slate-500">Semua dompet yang Anda miliki.</p>
                </div>
            </div>

            @if($wallets->isEmpty())
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
                    <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                        <i data-lucide="wallet" class="h-10 w-10"></i>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800">
                        Belum Ada Dompet
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        Anda belum memiliki dompet. Tambahkan dompet pertama untuk mulai mengelola uang tunai, rekening bank, dan e-wallet.
                    </p>

                    <a href="{{ route('wallets.create') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-blue-700">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Buat Dompet Pertama
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($wallets as $wallet)
                        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <div class="flex items-start justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                    @if($wallet->type === 'cash')
                                        <i data-lucide="banknote" class="h-6 w-6"></i>
                                    @elseif($wallet->type === 'bank')
                                        <i data-lucide="building-2" class="h-6 w-6"></i>
                                    @else
                                        <i data-lucide="smartphone" class="h-6 w-6"></i>
                                    @endif
                                </div>

                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                    {{ ['cash' => 'Tunai', 'bank' => 'Bank', 'ewallet' => 'E-Wallet'][$wallet->type] ?? 'Lainnya' }}
                                </span>
                            </div>

                            <h3 class="mt-5 text-lg font-bold text-slate-800">
                                {{ $wallet->name }}
                            </h3>

                            <p class="mt-2 text-xs text-slate-400">Saldo awal</p>

                            <p class="mt-1 text-2xl font-extrabold text-slate-800">
                                Rp {{ number_format((float) $wallet->opening_balance, 0, ',', '.') }}
                            </p>

                            @if($wallet->description)
                                <p class="mt-3 border-t border-slate-100 pt-3 text-sm text-slate-500">
                                    {{ $wallet->description }}
                                </p>
                            @endif

                            <div class="mt-5 flex flex-wrap justify-between gap-3 border-t border-slate-100 pt-4">
                                <a
                                    href="{{ route('wallets.edit', $wallet->id) }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-700 transition hover:bg-blue-100"
                                >
                                    Edit Dompet
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('wallets.destroy', $wallet->id) }}"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus dompet ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center justify-center rounded-lg bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 transition hover:bg-red-100"
                                    >
                                        Hapus Dompet
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
