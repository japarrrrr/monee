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

        @media(prefers-reduced-motion:reduce){
            .nb-card,.nb-btn,.nb-input{transition:none}
        }
    </style>

    <div class="min-h-screen nb-bg-page">
        <div class="mx-auto max-w-2xl space-y-8 px-5 py-8 sm:px-8 lg:px-10 xl:px-12">

            {{-- BACK + HEADER --}}
            <div>
                <a href="{{ route('wallets.index') }}"
                   class="mb-3 inline-flex items-center gap-1.5 text-xs font-black uppercase nb-tracking-wide nb-c-black-60 hover:nb-c-black">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Dompet
                </a>
                <h1 class="text-3xl font-black tracking-tight nb-c-black sm:text-4xl">Edit Dompet</h1>
                <p class="mt-1 text-sm font-medium nb-c-black-60">Perbarui detail dompet <strong>{{ $wallet->name }}</strong>.</p>
            </div>

            <div class="nb-card rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-6 sm:p-8">

                @if ($errors->any())
                    <div class="mb-6 rounded-xl nb-border-3px nb-bg-red-soft p-4 nb-shadow-2">
                        <div class="flex items-start gap-3">
                            <i data-lucide="alert-circle" class="h-5 w-5 nb-c-red shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm font-black nb-c-red">Periksa kembali input Anda:</p>
                                <ul class="mt-1 list-inside list-disc text-xs font-bold nb-c-black space-y-0.5">
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
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Nama Dompet</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $wallet->name) }}"
                               placeholder="Contoh: BCA, Dompet Tunai, GoPay"
                               required
                               class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">
                        @error('name')<p class="mt-1.5 text-xs font-bold nb-c-red">{{ $message }}</p>@enderror
                    </div>

                    {{-- Jenis Dompet --}}
                    <div>
                        <label class="mb-2.5 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Jenis Dompet</label>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach([
                                'cash'    => ['label' => 'Tunai',    'icon' => 'banknote',   'color' => 'nb-bg-yellow',  'text' => 'nb-c-black'],
                                'bank'    => ['label' => 'Bank',     'icon' => 'building-2', 'color' => 'nb-bg-violet',  'text' => 'nb-c-black'],
                                'ewallet' => ['label' => 'E-Wallet', 'icon' => 'smartphone', 'color' => 'nb-bg-blue',    'text' => 'nb-c-white'],
                            ] as $type => $cfg)
                                <label class="cursor-pointer">
                                    <input type="radio" name="type" value="{{ $type }}" class="peer sr-only"
                                           {{ old('type', $wallet->type) === $type ? 'checked' : '' }}>
                                    <div class="flex flex-col items-center gap-2 rounded-xl nb-border-2px nb-bg-white px-3 py-4 text-center transition
                                                peer-checked:nb-bg-[{{ $cfg['color'] }}] peer-checked:nb-shadow-3 hover:nb-bg-cream">
                                        <i data-lucide="{{ $cfg['icon'] }}" class="h-6 w-6 nb-c-black"></i>
                                        <span class="text-xs font-black nb-c-black">{{ $cfg['label'] }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('type')<p class="mt-1.5 text-xs font-bold nb-c-red">{{ $message }}</p>@enderror
                    </div>

                    {{-- Saldo Awal --}}
                    <div>
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">Saldo Awal</label>
                        <div class="flex rounded-xl nb-border-2px overflow-hidden focus-within:nb-shadow-3 nb-bg-white">
                            <span class="flex items-center nb-bg-yellow px-4 text-sm font-black nb-c-black border-r-2 border-[#000]">Rp</span>
                            <input type="number"
                                   name="opening_balance"
                                   min="0"
                                   step="0.01"
                                   value="{{ old('opening_balance', $wallet->opening_balance) }}"
                                   placeholder="0"
                                   required
                                   class="w-full border-0 px-4 py-3 text-sm font-bold nb-c-black outline-none">
                        </div>
                        @error('opening_balance')<p class="mt-1.5 text-xs font-bold nb-c-red">{{ $message }}</p>@enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="mb-2 block text-xs font-black uppercase nb-tracking-wide nb-c-black">
                            Deskripsi <span class="font-bold nb-c-black-60">(Opsional)</span>
                        </label>
                        <textarea name="description"
                                  rows="3"
                                  placeholder="Tambahkan catatan khusus dompet ini..."
                                  class="nb-input w-full rounded-lg nb-border-3px px-4 py-3 text-sm font-semibold">{{ old('description', $wallet->description) }}</textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col-reverse gap-3 nb-border-t-3px nb-border-dashed pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ route('wallets.index') }}"
                           class="nb-btn px-6 py-2.5 text-xs rounded-lg nb-border-3px nb-bg-white nb-c-black">
                            Batal
                        </a>
                        <button type="submit"
                                class="nb-btn px-6 py-2.5 text-xs rounded-lg nb-border-3px nb-bg-blue nb-c-white">
                            Perbarui Dompet
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>