<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            {{-- HEADER --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#FACC15] border-2 border-[#171717] px-2.5 py-1 shadow-[2px_2px_0px_#171717] mb-2 text-xs font-black text-[#171717] uppercase tracking-wider">
                        <i data-lucide="wallet" class="h-3.5 w-3.5"></i>
                        Manajemen Finansial
                    </div>
                    <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl lg:text-4xl">
                        Dompet Keuangan
                    </h1>
                    <p class="mt-1 text-sm font-bold text-[#525252]">
                        Kelola seluruh kantong kas, rekening bank, dan saldo dompet digital Anda.
                    </p>
                </div>
                <a href="{{ route('wallets.create') }}"
                   class="neo-btn neo-btn-primary px-5 py-3 text-sm flex items-center gap-2">
                    <i data-lucide="plus" class="h-5 w-5 stroke-[2.5]"></i>
                    Tambah Dompet
                </a>
            </div>

            {{-- SUMMARY STATS --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6">
                {{-- Total Dompet --}}
                <div class="neo-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-[#525252]">Total Dompet Terdaftar</span>
                            <h2 class="mt-1.5 text-3xl font-black text-[#171717] sm:text-4xl">
                                {{ $wallets->count() }} <span class="text-sm font-bold text-[#525252]">Dompet</span>
                            </h2>
                            <p class="mt-1 text-xs font-bold text-[#525252]">Status aktif digunakan</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#FACC15] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-[#171717]">
                            <i data-lucide="wallet" class="h-7 w-7 stroke-[2.5]"></i>
                        </div>
                    </div>
                </div>

                {{-- Total Saldo --}}
                <div class="neo-card p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-[#525252]">Total Saldo Gabungan</span>
                            <h2 class="mt-1.5 text-3xl font-black text-[#2563EB] sm:text-4xl">
                                Rp {{ number_format($wallets->sum('current_balance'), 0, ',', '.') }}
                            </h2>
                            <p class="mt-1 text-xs font-bold text-[#525252]">Akumulasi seluruh sumber dana</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#2563EB] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-white">
                            <i data-lucide="wallet-cards" class="h-7 w-7 stroke-[2.5]"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION HEADER --}}
            <div class="flex items-center justify-between border-b-2 border-[#171717]/10 pb-3">
                <div>
                    <h2 class="text-xl font-black text-[#171717]">Daftar Dompet</h2>
                    <p class="text-xs font-bold text-[#525252]">Daftar akun keuangan Anda saat ini.</p>
                </div>
                <span class="neo-badge bg-white text-[#171717] text-xs">
                    {{ $wallets->count() }} Akun
                </span>
            </div>

            @if ($wallets->isEmpty())
                {{-- EMPTY STATE --}}
                <div class="neo-card p-12 text-center bg-white">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl bg-[#FACC15] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-[#171717]">
                        <i data-lucide="wallet" class="h-8 w-8 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-lg font-black text-[#171717]">Belum Ada Dompet</h3>
                    <p class="mx-auto mt-1 max-w-sm text-xs font-bold text-[#525252]">
                        Tambahkan dompet pertama Anda untuk mulai mencatat dan mengelola keuangan pribadi.
                    </p>
                    <a href="{{ route('wallets.create') }}"
                       class="neo-btn neo-btn-primary mt-5 px-5 py-2.5 text-xs inline-flex items-center gap-1.5">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Buat Dompet Pertama
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($wallets as $wallet)
                        @php
                            $wConfig = match($wallet->type) {
                                'cash'    => ['icon' => 'banknote',   'bg' => 'bg-[#FACC15]', 'text' => 'text-[#171717]', 'label' => 'Tunai'],
                                'bank'    => ['icon' => 'building-2', 'bg' => 'bg-[#A78BFA]', 'text' => 'text-[#171717]', 'label' => 'Bank'],
                                default   => ['icon' => 'smartphone', 'bg' => 'bg-[#2563EB]', 'text' => 'text-white',     'label' => 'E-Wallet'],
                            };
                        @endphp

                        <div class="neo-card p-6 flex flex-col justify-between transition hover:-translate-y-1 hover:shadow-[6px_6px_0px_#171717]">

                            <div>
                                {{-- Card Header --}}
                                <div class="flex items-start justify-between">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl border-2 border-[#171717] {{ $wConfig['bg'] }} {{ $wConfig['text'] }} shadow-[2px_2px_0px_#171717]">
                                        <i data-lucide="{{ $wConfig['icon'] }}" class="h-6 w-6 stroke-[2.5]"></i>
                                    </div>
                                    <span class="neo-badge {{ $wConfig['bg'] }} {{ $wConfig['text'] }}">
                                        {{ $wConfig['label'] }}
                                    </span>
                                </div>

                                {{-- Name & Description --}}
                                <h3 class="mt-4 text-xl font-black text-[#171717] tracking-tight">{{ $wallet->name }}</h3>
                                @if ($wallet->description)
                                    <p class="mt-1 text-xs font-bold text-[#525252] line-clamp-2">
                                        {{ $wallet->description }}
                                    </p>
                                @endif

                                {{-- Saldo Saat Ini --}}
                                <div class="mt-5 p-3.5 rounded-xl border-2 border-[#171717] bg-[#F5F5F0] shadow-[2px_2px_0px_#171717]">
                                    <span class="text-[10px] font-black uppercase tracking-wider text-[#525252]">Saldo Saat Ini</span>
                                    <p class="text-2xl font-black tracking-tight {{ $wallet->current_balance < 0 ? 'text-[#EF4444]' : 'text-[#171717]' }} mt-0.5">
                                        Rp {{ number_format($wallet->current_balance, 0, ',', '.') }}
                                    </p>
                                    <div class="mt-1 pt-1.5 border-t border-[#171717]/10 flex items-center justify-between text-[11px] font-bold text-[#525252]">
                                        <span>Saldo Awal:</span>
                                        <span>Rp {{ number_format($wallet->opening_balance, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="mt-6 flex items-center gap-2 pt-4 border-t-2 border-[#171717]/10">
                                <a href="{{ route('wallets.edit', $wallet->id) }}"
                                   class="neo-btn neo-btn-white flex-1 py-2 text-xs flex items-center justify-center gap-1.5">
                                    <i data-lucide="pencil" class="h-3.5 w-3.5"></i>
                                    Edit
                                </a>

                                <button type="button"
                                        onclick="confirmDelete('delete-wallet-{{ $wallet->id }}', 'Apakah Anda yakin ingin menghapus dompet {{ $wallet->name }}?')"
                                        class="neo-btn neo-btn-danger py-2 px-3 text-xs flex items-center justify-center gap-1.5">
                                    <i data-lucide="trash-2" class="h-3.5 w-3.5"></i>
                                    Hapus
                                </button>

                                <form id="delete-wallet-{{ $wallet->id }}"
                                      action="{{ route('wallets.destroy', $wallet->id) }}"
                                      method="POST"
                                      class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>