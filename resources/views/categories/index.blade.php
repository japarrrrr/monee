<x-app-layout>
    <div class="min-h-screen bg-[#F5F5F0] py-6 sm:py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            {{-- HEADER --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 rounded-lg bg-[#FACC15] border-2 border-[#171717] px-2.5 py-1 shadow-[2px_2px_0px_#171717] mb-2 text-xs font-black text-[#171717] uppercase tracking-wider">
                        <i data-lucide="tags" class="h-3.5 w-3.5"></i>
                        Klasifikasi Anggaran
                    </div>
                    <h1 class="text-2xl font-black tracking-tight text-[#171717] sm:text-3xl lg:text-4xl">
                        Kategori Transaksi
                    </h1>
                    <p class="mt-1 text-sm font-bold text-[#525252]">
                        Kelompokkan pos pemasukan dan pos pengeluaran Anda dengan rapi.
                    </p>
                </div>
                <a href="{{ route('categories.create') }}"
                   class="neo-btn neo-btn-primary px-5 py-3 text-sm flex items-center gap-2">
                    <i data-lucide="plus" class="h-5 w-5 stroke-[2.5]"></i>
                    Tambah Kategori
                </a>
            </div>

            {{-- SUMMARY --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="neo-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-[#525252]">Kategori Pemasukan</span>
                            <h2 class="mt-1.5 text-3xl font-black text-[#16A34A] sm:text-4xl">
                                {{ $categories->where('type', 'income')->count() }} <span class="text-sm font-bold text-[#525252]">Pos</span>
                            </h2>
                            <p class="mt-1 text-xs font-bold text-[#525252]">Pos penerimaan dana</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#16A34A] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-white">
                            <i data-lucide="trending-up" class="h-7 w-7 stroke-[2.5]"></i>
                        </div>
                    </div>
                </div>

                <div class="neo-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-[#525252]">Kategori Pengeluaran</span>
                            <h2 class="mt-1.5 text-3xl font-black text-[#EF4444] sm:text-4xl">
                                {{ $categories->where('type', 'expense')->count() }} <span class="text-sm font-bold text-[#525252]">Pos</span>
                            </h2>
                            <p class="mt-1 text-xs font-bold text-[#525252]">Pos alokasi belanja & biaya</p>
                        </div>
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#EF4444] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-white">
                            <i data-lucide="trending-down" class="h-7 w-7 stroke-[2.5]"></i>
                        </div>
                    </div>
                </div>
            </div>

            @if ($categories->isEmpty())
                {{-- EMPTY STATE --}}
                <div class="neo-card p-12 text-center bg-white">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-xl bg-[#FACC15] border-2 border-[#171717] shadow-[3px_3px_0px_#171717] text-[#171717]">
                        <i data-lucide="tags" class="h-8 w-8 stroke-[2.5]"></i>
                    </div>
                    <h3 class="text-lg font-black text-[#171717]">Belum Ada Kategori</h3>
                    <p class="mx-auto mt-1 max-w-sm text-xs font-bold text-[#525252]">
                        Buat kategori pertama Anda untuk memudahkan pelacakan pos keuangan.
                    </p>
                    <a href="{{ route('categories.create') }}"
                       class="neo-btn neo-btn-primary mt-5 px-5 py-2.5 text-xs inline-flex items-center gap-1.5">
                        <i data-lucide="plus" class="h-4 w-4"></i>
                        Buat Kategori Pertama
                    </a>
                </div>
            @else
                {{-- TABS & LIST --}}
                <div x-data="{ tab: 'all' }" class="space-y-6">

                    {{-- TABS CONTROL (NEO-BRUTALISM) --}}
                    <div class="flex gap-2.5 overflow-x-auto pb-1">
                        <button @click="tab = 'all'"
                                :class="tab === 'all'
                                    ? 'bg-[#2563EB] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                                    : 'bg-white text-[#171717] border-2 border-[#171717] hover:bg-[#F5F5F0] shadow-[2px_2px_0px_#171717]'"
                                class="neo-btn px-4 py-2 text-xs font-black rounded-xl">
                            Semua Pos ({{ $categories->count() }})
                        </button>
                        <button @click="tab = 'income'"
                                :class="tab === 'income'
                                    ? 'bg-[#16A34A] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                                    : 'bg-white text-[#171717] border-2 border-[#171717] hover:bg-[#F5F5F0] shadow-[2px_2px_0px_#171717]'"
                                class="neo-btn px-4 py-2 text-xs font-black rounded-xl">
                            Pemasukan ({{ $categories->where('type', 'income')->count() }})
                        </button>
                        <button @click="tab = 'expense'"
                                :class="tab === 'expense'
                                    ? 'bg-[#EF4444] text-white border-2 border-[#171717] shadow-[3px_3px_0px_#171717]'
                                    : 'bg-white text-[#171717] border-2 border-[#171717] hover:bg-[#F5F5F0] shadow-[2px_2px_0px_#171717]'"
                                class="neo-btn px-4 py-2 text-xs font-black rounded-xl">
                            Pengeluaran ({{ $categories->where('type', 'expense')->count() }})
                        </button>
                    </div>

                    {{-- CATEGORY GRID --}}
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($categories as $category)
                            <div x-show="tab === 'all' || tab === '{{ $category->type }}'"
                                 class="neo-card p-4 flex flex-col justify-between transition hover:-translate-y-1 hover:shadow-[5px_5px_0px_#171717]">

                                <div>
                                    <div class="flex items-start justify-between">
                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl border-2 border-[#171717] shadow-[2px_2px_0px_#171717]"
                                             style="background-color: {{ $category->color ?? '#2563EB' }}; color: #FFFFFF;">
                                            <i data-lucide="{{ $category->icon ?? 'tag' }}" class="h-5 w-5 stroke-[2.5]"></i>
                                        </div>
                                        <span class="neo-badge {{ $category->type === 'income' ? 'bg-[#16A34A] text-white' : 'bg-[#EF4444] text-white' }}">
                                            {{ $category->type === 'income' ? 'Masuk' : 'Keluar' }}
                                        </span>
                                    </div>

                                    <h3 class="mt-3.5 text-base font-black text-[#171717] truncate">
                                        {{ $category->name }}
                                    </h3>
                                    <p class="text-[11px] font-bold text-[#525252] mt-0.5">
                                        {{ $category->type === 'income' ? 'Pos Pemasukan' : 'Pos Pengeluaran' }}
                                    </p>
                                </div>

                                <div class="mt-4 flex items-center gap-2 pt-3 border-t-2 border-[#171717]/10">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="neo-btn neo-btn-white flex-1 py-1.5 text-xs flex items-center justify-center gap-1">
                                        <i data-lucide="pencil" class="h-3 w-3"></i>
                                        Edit
                                    </a>

                                    <button type="button"
                                            onclick="confirmDelete('delete-category-{{ $category->id }}', 'Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?')"
                                            class="neo-btn neo-btn-danger py-1.5 px-2.5 text-xs flex items-center justify-center">
                                        <i data-lucide="trash-2" class="h-3 w-3"></i>
                                    </button>

                                    <form id="delete-category-{{ $category->id }}"
                                          action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            @endif

        </div>
    </div>
</x-app-layout>