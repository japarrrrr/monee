
<x-app-layout>
    <div class="min-h-screen bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="mb-2 text-sm font-semibold text-blue-600">
                        PENGELOLAAN KEUANGAN
                    </p>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-800">
                        Kategori
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Kelompokkan pemasukan dan pengeluaran agar pencatatan lebih teratur.
                    </p>
                </div>

                <a href="{{ route('categories.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                    <i data-lucide="plus" class="h-5 w-5"></i>
                    Tambah Kategori
                </a>
            </div>

            {{-- SUMMARY --}}
            <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Kategori Pemasukan</p>
                            <h2 class="mt-2 text-3xl font-extrabold text-emerald-600">
                                {{ $categories->where('type', 'income')->count() }}
                            </h2>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                            <i data-lucide="trending-up" class="h-6 w-6"></i>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Kategori Pengeluaran</p>
                            <h2 class="mt-2 text-3xl font-extrabold text-red-600">
                                {{ $categories->where('type', 'expense')->count() }}
                            </h2>
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 text-red-600">
                            <i data-lucide="trending-down" class="h-6 w-6"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- NOTIFICATION --}}
            @if (session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
                    <i data-lucide="check-circle" class="h-5 w-5 shrink-0"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm font-medium text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            {{-- CATEGORY LIST HEADER --}}
            <div class="mb-5">
                <h2 class="text-lg font-bold text-slate-800">Daftar Kategori</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Seluruh kategori yang Anda miliki.
                </p>
            </div>

            {{-- EMPTY STATE --}}
            @if ($categories->isEmpty())
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm">
                    <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-50 text-blue-600">
                        <i data-lucide="tags" class="h-10 w-10"></i>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800">Belum Ada Kategori</h3>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        Anda belum memiliki kategori transaksi. Buat kategori pemasukan dan pengeluaran agar pencatatan keuangan lebih mudah.
                    </p>

                    <a href="{{ route('categories.create') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                        <i data-lucide="plus" class="h-5 w-5"></i>
                        Buat Kategori Pertama
                    </a>
                </div>

            {{-- CATEGORY CARDS --}}
            @else
                <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($categories as $category)
                        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:shadow-md">
                            <div class="flex flex-col gap-5">

                                {{-- CATEGORY INFORMATION --}}
                                <div class="flex min-w-0 items-center gap-4">
                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                                        <i data-lucide="{{ $category->icon ?: 'tag' }}" class="h-6 w-6"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <h3 class="truncate font-bold text-slate-800">
                                            {{ $category->name }}
                                        </h3>
                                        <span class="text-xs font-semibold {{ $category->type === 'income' ? 'text-emerald-600' : 'text-red-600' }}">
                                            {{ $category->type === 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- ACTION BUTTONS --}}
                                <div class="flex items-center gap-2 border-t border-slate-100 pt-4">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg border border-blue-200 px-3 py-2.5 text-sm font-semibold text-blue-600 transition hover:bg-blue-50">
                                        <i data-lucide="pencil" class="h-4 w-4"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          class="flex-1"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori {{ $category->name }}?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-red-200 px-3 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
