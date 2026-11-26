<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- BACK + HEADER --}}
            <div>
                <a href="{{ route('categories.index') }}"
                   class="mb-3 inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-wider text-[#525252] hover:text-[#171717]">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Kategori
                </a>
                <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl">Edit Kategori</h1>
                <p class="mt-1 text-sm font-bold text-[#525252]">Perbarui detail pos kategori <strong>{{ $category->name }}</strong>.</p>
            </div>

            <div class="neo-card p-6 sm:p-8 bg-white">
                <form method="POST" action="{{ route('categories.update', $category->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div>
                        <label for="name" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Nama Kategori</label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name', $category->name) }}"
                               placeholder="Contoh: Gaji, Makanan, Belanja, Hiburan"
                               required
                               maxlength="100"
                               class="neo-input">
                        @error('name')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Jenis Kategori --}}
                    <div>
                        <label class="mb-2.5 block text-xs font-black uppercase tracking-wider text-[#171717]">Jenis Kategori</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="cursor-pointer">
                                <input type="radio" name="type" value="income" class="peer sr-only"
                                       {{ old('type', $category->type) === 'income' ? 'checked' : '' }}>
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
                                       {{ old('type', $category->type) === 'expense' ? 'checked' : '' }}>
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

                    {{-- Ikon --}}
                    <div>
                        <label for="icon" class="mb-2 block text-xs font-black uppercase tracking-wider text-[#171717]">Pilih Ikon</label>
                        <select id="icon" name="icon" class="neo-input font-bold">
                            <option value="tag"            {{ old('icon', $category->icon) === 'tag'            ? 'selected' : '' }}>🏷️ Tag (Default)</option>
                            <option value="wallet"         {{ old('icon', $category->icon) === 'wallet'         ? 'selected' : '' }}>👛 Dompet</option>
                            <option value="banknote"       {{ old('icon', $category->icon) === 'banknote'       ? 'selected' : '' }}>💵 Uang Tunai</option>
                            <option value="shopping-cart"  {{ old('icon', $category->icon) === 'shopping-cart'  ? 'selected' : '' }}>🛒 Belanja</option>
                            <option value="utensils"       {{ old('icon', $category->icon) === 'utensils'       ? 'selected' : '' }}>🍴 Makanan & Minuman</option>
                            <option value="car"            {{ old('icon', $category->icon) === 'car'            ? 'selected' : '' }}>🚗 Transportasi</option>
                            <option value="house"          {{ old('icon', $category->icon) === 'house'          ? 'selected' : '' }}>🏠 Kebutuhan Rumah</option>
                            <option value="heart-pulse"    {{ old('icon', $category->icon) === 'heart-pulse'    ? 'selected' : '' }}>❤️ Kesehatan</option>
                            <option value="graduation-cap" {{ old('icon', $category->icon) === 'graduation-cap' ? 'selected' : '' }}>🎓 Pendidikan</option>
                            <option value="briefcase"      {{ old('icon', $category->icon) === 'briefcase'      ? 'selected' : '' }}>💼 Pekerjaan & Usaha</option>
                        </select>
                        @error('icon')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Warna Solid --}}
                    <div>
                        <label class="mb-2.5 block text-xs font-black uppercase tracking-wider text-[#171717]">Pilihan Warna Solid</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach([
                                '#2563EB' => 'Biru',
                                '#16A34A' => 'Hijau',
                                '#EF4444' => 'Merah',
                                '#A78BFA' => 'Ungu',
                                '#FACC15' => 'Kuning',
                                '#EA580C' => 'Oranye',
                                '#0891B2' => 'Toska',
                                '#171717' => 'Hitam',
                            ] as $hex => $label)
                                <label class="cursor-pointer" title="{{ $label }}">
                                    <input type="radio" name="color" value="{{ $hex }}" class="peer sr-only"
                                           {{ old('color', $category->color) === $hex ? 'checked' : '' }}>
                                    <div class="h-9 w-9 rounded-xl border-2 border-[#171717] transition
                                                peer-checked:scale-115 peer-checked:shadow-[3px_3px_0px_#171717] hover:scale-105"
                                         style="background-color: {{ $hex }};"></div>
                                </label>
                            @endforeach
                        </div>
                        @error('color')<p class="mt-1.5 text-xs font-bold text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col-reverse gap-3 border-t-2 border-[#171717]/10 pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ route('categories.index') }}"
                           class="neo-btn neo-btn-white px-6 py-2.5 text-xs">
                            Batal
                        </a>
                        <button type="submit"
                                class="neo-btn neo-btn-primary px-6 py-2.5 text-xs">
                            Perbarui Kategori
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>