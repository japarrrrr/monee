
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
                    Edit Kategori
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Perbarui informasi kategori keuangan Anda.
                </p>
            </div>

            {{-- FORM --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- NAMA --}}
                    <div class="mb-6">
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Kategori
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $category->name) }}"
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
                            <option value="income" {{ old('type', $category->type) === 'income' ? 'selected' : '' }}>
                                Pemasukan
                            </option>
                            <option value="expense" {{ old('type', $category->type) === 'expense' ? 'selected' : '' }}>
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
                            @foreach ([
                                'tag' => 'Tag',
                                'wallet' => 'Dompet',
                                'banknote' => 'Uang',
                                'shopping-cart' => 'Belanja',
                                'utensils' => 'Makanan',
                                'car' => 'Transportasi',
                                'house' => 'Rumah',
                                'heart-pulse' => 'Kesehatan',
                                'graduation-cap' => 'Pendidikan',
                                'briefcase' => 'Pekerjaan',
                            ] as $value => $label)
                                <option value="{{ $value }}" {{ old('icon', $category->icon ?: 'tag') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
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
                            @foreach ([
                                '#2563EB' => 'Biru',
                                '#16A34A' => 'Hijau',
                                '#DC2626' => 'Merah',
                                '#9333EA' => 'Ungu',
                                '#EA580C' => 'Oranye',
                                '#D97706' => 'Kuning',
                                '#0891B2' => 'Toska',
                                '#64748B' => 'Abu-abu',
                            ] as $value => $label)
                                <option value="{{ $value }}" {{ old('color', $category->color ?: '#2563EB') === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
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
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
