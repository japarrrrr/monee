<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BACK + HEADER --}}
            <div>
                <a href="{{ route('wallets.index') }}"
                   class="mb-3 inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-wider text-[#525252] hover:text-[#171717]">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Dompet
                </a>
                <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl">Edit Dompet</h1>
                <p class="mt-1 text-sm font-bold text-[#525252]">Perbarui detail dompet <strong>{{ $wallet->name }}</strong>.</p>
            </div>

            <div class="neo-card p-6 sm:p-8 bg-white">

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border-2 border-[#171717] bg-[#EF4444]/15 p-4 shadow-[2px_2px_0px_#171717]">
                        <div class="flex items-start gap-3">
                            <i data-lucide="alert-circle" class="h-5 w-5 text-[#EF4444] shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm font-black text-[#EF4444]">Periksa kembali input Anda:</p>
                                <ul class="mt-1 list-inside list-disc text-xs font-bold text-[#171717] space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('wallets.update', $wallet->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div>
                        <label class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Nama Dompet</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $wallet->name) }}"
                               placeholder="Contoh: BCA, Dompet Tunai, GoPay"
                               required
                               class="neo-input">
                        @error('name')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Jenis Dompet --}}
                    <div>
                        <label class="mb-2.5 block text-xs font-black uppercase tracking-wider text-[#171717]">Jenis Dompet</label>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach([
                                'cash'    => ['label' => 'Tunai',    'icon' => 'banknote',   'color' => '#FACC15'],
                                'bank'    => ['label' => 'Bank',     'icon' => 'building-2', 'color' => '#A78BFA'],
                                'ewallet' => ['label' => 'E-Wallet', 'icon' => 'smartphone', 'color' => '#2563EB'],
                            ] as $type => $cfg)
                            <label class="cursor-pointer">
                                <input type="radio" name="type" value="{{ $type }}" class="peer sr-only"
                                       {{ old('type', $wallet->type) === $type ? 'checked' : '' }}>
                                <div class="flex flex-col items-center gap-2 rounded-xl border-2 border-[#171717] bg-white px-3 py-4 text-center transition
                                            peer-checked:bg-[{{ $cfg['color'] }}] peer-checked:shadow-[3px_3px_0px_#171717] hover:bg-[#F5F5F0]">
                                    <i data-lucide="{{ $cfg['icon'] }}" class="h-6 w-6 text-[#171717] stroke-[2.5]"></i>
                                    <span class="text-xs font-black text-[#171717]">{{ $cfg['label'] }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @error('type')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Saldo Awal --}}
                    <div>
                        <label class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Saldo Awal</label>
                        <div class="flex rounded-xl border-2 border-[#171717] overflow-hidden focus-within:shadow-[3px_3px_0px_#171717] bg-white">
                            <span class="flex items-center bg-[#FACC15] px-4 text-sm font-black text-[#171717] border-r-2 border-[#171717]">Rp</span>
                            <input type="number"
                                   name="opening_balance"
                                   min="0"
                                   step="0.01"
                                   value="{{ old('opening_balance', $wallet->opening_balance) }}"
                                   placeholder="0"
                                   required
                                   class="w-full border-0 px-4 py-3 text-sm font-bold text-[#171717] outline-none">
                        </div>
                        @error('opening_balance')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">
                            Deskripsi <span class="font-bold text-[#525252]">(Opsional)</span>
                        </label>
                        <textarea name="description"
                                  rows="3"
                                  placeholder="Tambahkan catatan khusus dompet ini..."
                                  class="neo-input">{{ old('description', $wallet->description) }}</textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col-reverse gap-3 border-t-2 border-[#171717]/10 pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ route('wallets.index') }}"
                           class="neo-btn neo-btn-white px-6 py-2.5 text-xs">
                            Batal
                        </a>
                        <button type="submit"
                                class="neo-btn neo-btn-primary px-6 py-2.5 text-xs">
                            Perbarui Dompet
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>