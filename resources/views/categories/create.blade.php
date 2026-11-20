
<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8">
                <a href="{{ route('categories.index') }}"
                   class="mb-4 inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600">
                    <i data-lucide="arrow-left" class="h-4 w-4"></i>
                    Kembali ke Kategori
                </a>

                <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">
                    Tambah Kategori
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Buat kategori untuk mengelompokkan pemasukan atau pengeluaran.
                </p>
            </div>

            {{-- FORM --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    {{-- NAMA --}}
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Kategori
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Gaji, Makanan, Transportasi"
                            required
                            maxlength="100"
                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- JENIS --}}
                    <div class="mb-6">
                        <label for="type" class="mb-2 block text-sm font-semibold text-slate-700">
                            Jenis Kategori
                        </label>
                        <select
                            id="type"
                            name="type"
                            required
                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Pilih jenis kategori</option>
                            <option value="income" {{ old('type') === 'income' ? 'selected' : '' }}>
                                Pemasukan
                            </option>
                            <option value="expense" {{ old('type') === 'expense' ? 'selected' : '' }}>
                                Pengeluaran
                            </option>
                        </select>
                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- IKON --}}
                    <div class="mb-6">
                        <label for="icon" class="mb-2 block text-sm font-semibold text-slate-700">
                            Ikon
                        </label>
                        <select
                            id="icon"
                            name="icon"
                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="tag" {{ old('icon', 'tag') === 'tag' ? 'selected' : '' }}>Tag</option>
                            <option value="wallet" {{ old('icon') === 'wallet' ? 'selected' : '' }}>Dompet</option>
                            <option value="banknote" {{ old('icon') === 'banknote' ? 'selected' : '' }}>Uang</option>
                            <option value="shopping-cart" {{ old('icon') === 'shopping-cart' ? 'selected' : '' }}>Belanja</option>
                            <option value="utensils" {{ old('icon') === 'utensils' ? 'selected' : '' }}>Makanan</option>
                            <option value="car" {{ old('icon') === 'car' ? 'selected' : '' }}>Transportasi</option>
                            <option value="house" {{ old('icon') === 'house' ? 'selected' : '' }}>Rumah</option>
                            <option value="heart-pulse" {{ old('icon') === 'heart-pulse' ? 'selected' : '' }}>Kesehatan</option>
                            <option value="graduation-cap" {{ old('icon') === 'graduation-cap' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="briefcase" {{ old('icon') === 'briefcase' ? 'selected' : '' }}>Pekerjaan</option>
                        </select>
                        @error('icon')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- WARNA --}}
                    <div class="mb-8">
                        <label for="color" class="mb-2 block text-sm font-semibold text-slate-700">
                            Warna Kategori
                        </label>
                        <select
                            id="color"
                            name="color"
                            class="w-full rounded-xl border-slate-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="#2563EB" {{ old('color', '#2563EB') === '#2563EB' ? 'selected' : '' }}>Biru</option>
                            <option value="#16A34A" {{ old('color') === '#16A34A' ? 'selected' : '' }}>Hijau</option>
                            <option value="#DC2626" {{ old('color') === '#DC2626' ? 'selected' : '' }}>Merah</option>
                            <option value="#9333EA" {{ old('color') === '#9333EA' ? 'selected' : '' }}>Ungu</option>
                            <option value="#EA580C" {{ old('color') === '#EA580C' ? 'selected' : '' }}>Oranye</option>
                            <option value="#D97706" {{ old('color') === '#D97706' ? 'selected' : '' }}>Kuning</option>
                            <option value="#0891B2" {{ old('color') === '#0891B2' ? 'selected' : '' }}>Toska</option>
                            <option value="#64748B" {{ old('color') === '#64748B' ? 'selected' : '' }}>Abu-abu</option>
                        </select>
                        @error('color')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('categories.index') }}"
                           class="rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
                        >
                            <i data-lucide="save" class="h-4 w-4"></i>
                            Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
