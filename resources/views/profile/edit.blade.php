<x-app-layout>
    <style>
        [x-cloak]{display:none !important}
        .nb-ico-l{position:absolute;left:16px;top:50%;transform:translateY(-50%);z-index:2;pointer-events:none;width:16px;height:16px}
        .nb-ico-r{position:absolute;right:10px;top:50%;transform:translateY(-50%);z-index:2;display:flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:6px;background:transparent;border:0;cursor:pointer}
        .nb-ico-r:hover,.nb-ico-r:focus-visible{background-color:#FFD23F;outline:2px solid #000}
        .nb-ico-r svg{width:16px;height:16px}
        .nb-pad-l{padding-left:44px !important;padding-right:16px !important}
        .nb-pad-lr{padding-left:44px !important;padding-right:48px !important}
        .nb-modal-center{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:100%;max-width:28rem;padding:0 16px}
        .nb-border-3px{border-width:3px;border-style:solid;border-color:#000}
        .nb-border-2px{border-width:2px;border-style:solid;border-color:#000}
        .nb-border-b-3px{border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:#000}
        .nb-border-t-dashed{border-top-width:3px;border-top-style:dashed;border-top-color:#000}
        .nb-bg-page{background-color:#FFF8E7;background-image:linear-gradient(rgba(0,0,0,.05) 1px,transparent 1px),linear-gradient(90deg,rgba(0,0,0,.05) 1px,transparent 1px);background-size:32px 32px}
        .nb-bg-white{background-color:#fff}
        .nb-bg-yellow{background-color:#FFD23F}
        .nb-bg-yellow-soft{background-color:#FFF3C4}
        .nb-bg-blue{background-color:#2F6BFF}
        .nb-bg-green{background-color:#3DDC97}
        .nb-bg-pink{background-color:#FF8FB1}
        .nb-bg-red{background-color:#FF5C5C}
        .nb-bg-violet{background-color:#B69CFF}
        .nb-bg-red-soft{background-color:#FFE4E4}
        .nb-bg-overlay{background-color:rgba(0,0,0,.55)}
        .nb-c-black{color:#000}
        .nb-c-black-60{color:rgba(0,0,0,.6)}
        .nb-c-white{color:#fff}
        .nb-c-green{color:#0E8F5A}
        .nb-c-red{color:#C81E1E}
        .nb-shadow-2{box-shadow:2px 2px 0 0 #000}
        .nb-shadow-4{box-shadow:4px 4px 0 0 #000}
        .nb-shadow-6{box-shadow:6px 6px 0 0 #000}
        .nb-shadow-8{box-shadow:8px 8px 0 0 #000}
        .nb-text-10px{font-size:10px}
        .nb-tracking-wide{letter-spacing:.15em}
        .nb-rotate-n2{rotate:-2deg}
        .nb-rotate-3{rotate:3deg}
        .nb-input{transition:all .15s;color:#000;background-color:#fff;box-shadow:4px 4px 0 0 #000;border-width:3px;border-style:solid;border-color:#000}
        .nb-input::placeholder{color:rgba(0,0,0,.4);font-weight:500}
        .nb-input:focus{outline:none;background-color:#FFF3C4;translate:2px 2px;box-shadow:2px 2px 0 0 #000;border-color:#000;--tw-ring-shadow:0 0 #0000}
        .nb-input-error{background-color:#FFE4E4;box-shadow:4px 4px 0 0 #C81E1E}
        .nb-btn{transition:all .15s;box-shadow:4px 4px 0 0 #000}
        .nb-btn:hover{translate:2px 2px;box-shadow:2px 2px 0 0 #000}
        .nb-btn:active{translate:4px 4px;box-shadow:none}
        .nb-btn:focus-visible{outline:3px solid #FFD23F;outline-offset:2px}
        .nb-link{text-decoration:underline;text-decoration-thickness:2px;text-underline-offset:3px}
        @media (prefers-reduced-motion:reduce){.nb-btn,.nb-input{transition:none}}
    </style>

    <div class="min-h-screen nb-bg-page nb-c-black">
        <div class="mx-auto max-w-3xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <header class="mb-8">
                <span class="mb-3 inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-yellow px-2.5 py-1 nb-text-10px font-bold uppercase nb-tracking-wide nb-shadow-2">
                    <i data-lucide="user-cog" class="h-3.5 w-3.5"></i>
                    Akun Saya
                </span>
                <h1 class="flex flex-wrap items-center gap-3 text-3xl font-black tracking-tight sm:text-4xl">
                    Pengaturan
                    <span class="inline-block nb-rotate-n2 rounded-lg nb-border-3px nb-bg-blue px-3 py-0.5 nb-c-white nb-shadow-4">Profil</span>
                </h1>
                <p class="mt-3 text-sm nb-c-black-60">Kelola informasi akun dan keamanan Anda.</p>
            </header>

            {{-- USER CARD --}}
            <section class="mb-6 rounded-2xl nb-border-3px nb-bg-yellow p-6 nb-shadow-6" aria-label="Ringkasan akun">
                <div class="flex flex-col items-start gap-5 sm:flex-row sm:items-center">
                    <div class="flex h-20 w-20 shrink-0 nb-rotate-n2 items-center justify-center rounded-2xl nb-border-3px nb-bg-blue text-3xl font-black nb-c-white nb-shadow-4" aria-hidden="true">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <h2 class="truncate text-xl font-black">{{ Auth::user()->name }}</h2>
                        <p class="mt-0.5 truncate text-sm font-medium nb-c-black-60">{{ Auth::user()->email }}</p>
                        <p class="mt-3 inline-flex items-center gap-1.5 rounded-full nb-border-2px nb-bg-white px-3 py-1 text-xs font-bold nb-shadow-2">
                            <span class="h-2.5 w-2.5 rounded-full nb-border-2px nb-bg-green"></span>
                            Akun Aktif
                        </p>
                    </div>
                </div>
            </section>

            <div class="space-y-6">

                {{-- PROFILE INFORMATION --}}
                <section class="rounded-2xl nb-border-3px nb-bg-white nb-shadow-6" aria-labelledby="profile-info-title">
                    <div class="nb-border-b-3px px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-blue nb-c-white nb-shadow-2">
                                <i data-lucide="user" class="h-5 w-5"></i>
                            </div>
                            <div>
                                <h3 id="profile-info-title" class="font-black">Informasi Profil</h3>
                                <p class="text-xs nb-c-black-60">Perbarui nama dan alamat email Anda.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
                            @csrf
                            @method('patch')

                            <div>
                                <label for="name" class="mb-2 block text-xs font-bold uppercase nb-tracking-wide">Nama Lengkap</label>
                                <div class="relative">
                                    <i data-lucide="user" class="nb-ico-l h-4 w-4"></i>
                                    <input id="name"
                                           name="name"
                                           type="text"
                                           value="{{ old('name', Auth::user()->name) }}"
                                           required
                                           autofocus
                                           autocomplete="name"
                                           class="nb-input w-full rounded-lg py-3 nb-pad-l text-sm font-semibold focus:ring-0 @error('name', 'updateProfileInformation') nb-input-error @enderror">
                                </div>
                                @error('name', 'updateProfileInformation')
                                    <p class="mt-2 flex items-center gap-1.5 text-xs font-bold nb-c-red">
                                        <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="mb-2 block text-xs font-bold uppercase nb-tracking-wide">Alamat Email</label>
                                <div class="relative">
                                    <i data-lucide="mail" class="nb-ico-l h-4 w-4"></i>
                                    <input id="email"
                                           name="email"
                                           type="email"
                                           value="{{ old('email', Auth::user()->email) }}"
                                           required
                                           autocomplete="username"
                                           class="nb-input w-full rounded-lg py-3 nb-pad-l text-sm font-semibold focus:ring-0 @error('email', 'updateProfileInformation') nb-input-error @enderror">
                                </div>
                                @error('email', 'updateProfileInformation')
                                    <p class="mt-2 flex items-center gap-1.5 text-xs font-bold nb-c-red">
                                        <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                    </p>
                                @enderror

                                @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                                    <div class="mt-4 rounded-lg nb-border-2px nb-bg-yellow-soft p-3 nb-shadow-2">
                                        <p class="flex flex-wrap items-center gap-1.5 text-xs font-semibold">
                                            <i data-lucide="mail-warning" class="h-4 w-4"></i>
                                            Email Anda belum diverifikasi.
                                            <button form="send-verification" class="nb-link font-bold">
                                                Kirim ulang email verifikasi
                                            </button>
                                        </p>
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 text-xs font-bold nb-c-green">Link verifikasi baru telah dikirim!</p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-wrap items-center justify-end gap-3 nb-border-t-dashed pt-5">
                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }"
                                       x-show="show"
                                       x-transition
                                       x-init="setTimeout(() => show = false, 3000)"
                                       role="status"
                                       class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-green px-3 py-1.5 text-xs font-bold nb-shadow-2">
                                        <i data-lucide="check-circle" class="h-4 w-4"></i>
                                        Tersimpan!
                                    </p>
                                @endif
                                <button type="submit"
                                        class="nb-btn inline-flex items-center gap-2 rounded-lg nb-border-3px nb-bg-blue px-5 py-2.5 text-sm font-bold uppercase tracking-wider nb-c-white">
                                    <i data-lucide="save" class="h-4 w-4"></i>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                {{-- UPDATE PASSWORD --}}
                <section class="rounded-2xl nb-border-3px nb-bg-white nb-shadow-6"
                         aria-labelledby="password-title"
                         x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
                    <div class="nb-border-b-3px px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-violet nb-shadow-2">
                                <i data-lucide="key" class="h-5 w-5"></i>
                            </div>
                            <div>
                                <h3 id="password-title" class="font-black">Ubah Password</h3>
                                <p class="text-xs nb-c-black-60">Gunakan password yang kuat dan unik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <form method="post" action="{{ route('password.update') }}" class="space-y-5">
                            @csrf
                            @method('put')

                            @foreach ([
                                ['id' => 'current_password', 'label' => 'Password Saat Ini', 'auto' => 'current-password', 'toggle' => 'showCurrent', 'placeholder' => 'Masukkan password saat ini'],
                                ['id' => 'password', 'label' => 'Password Baru', 'auto' => 'new-password', 'toggle' => 'showNew', 'placeholder' => 'Minimal 8 karakter'],
                                ['id' => 'password_confirmation', 'label' => 'Konfirmasi Password Baru', 'auto' => 'new-password', 'toggle' => 'showConfirm', 'placeholder' => 'Ulangi password baru'],
                            ] as $field)
                                <div>
                                    <label for="update_{{ $field['id'] }}" class="mb-2 block text-xs font-bold uppercase nb-tracking-wide">{{ $field['label'] }}</label>
                                    <div class="relative">
                                        <i data-lucide="lock" class="nb-ico-l h-4 w-4"></i>
                                        <input id="update_{{ $field['id'] }}"
                                               name="{{ $field['id'] }}"
                                               :type="{{ $field['toggle'] }} ? 'text' : 'password'"
                                               type="password"
                                               autocomplete="{{ $field['auto'] }}"
                                               placeholder="{{ $field['placeholder'] }}"
                                               class="nb-input w-full rounded-lg py-3 nb-pad-lr text-sm font-semibold focus:ring-0 @error($field['id'], 'updatePassword') nb-input-error @enderror">
                                        <button type="button"
                                                @click="{{ $field['toggle'] }} = !{{ $field['toggle'] }}"
                                                :aria-label="{{ $field['toggle'] }} ? 'Sembunyikan password' : 'Tampilkan password'"
                                                aria-label="Tampilkan password"
                                                class="nb-ico-r">
                                            <i x-show="!{{ $field['toggle'] }}" data-lucide="eye" class="h-4 w-4"></i>
                                            <i x-show="{{ $field['toggle'] }}" x-cloak data-lucide="eye-off" class="h-4 w-4"></i>
                                        </button>
                                    </div>
                                    @error($field['id'], 'updatePassword')
                                        <p class="mt-2 flex items-center gap-1.5 text-xs font-bold nb-c-red">
                                            <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="flex flex-wrap items-center justify-end gap-3 nb-border-t-dashed pt-5">
                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }"
                                       x-show="show"
                                       x-transition
                                       x-init="setTimeout(() => show = false, 3000)"
                                       role="status"
                                       class="inline-flex items-center gap-1.5 rounded-md nb-border-2px nb-bg-green px-3 py-1.5 text-xs font-bold nb-shadow-2">
                                        <i data-lucide="check-circle" class="h-4 w-4"></i>
                                        Password diperbarui!
                                    </p>
                                @endif
                                <button type="submit"
                                        class="nb-btn inline-flex items-center gap-2 rounded-lg nb-border-3px nb-bg-violet px-5 py-2.5 text-sm font-bold uppercase tracking-wider nb-c-black">
                                    <i data-lucide="shield-check" class="h-4 w-4"></i>
                                    Perbarui Password
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                {{-- DELETE ACCOUNT --}}
                <section class="rounded-2xl nb-border-3px nb-bg-red-soft nb-shadow-6"
                         aria-labelledby="delete-title"
                         x-data="{ showDeleteModal: @js($errors->userDeletion->isNotEmpty()) }"
                         @keydown.escape.window="showDeleteModal = false">
                    <div class="nb-border-b-3px px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg nb-border-2px nb-bg-red nb-c-white nb-shadow-2">
                                <i data-lucide="trash-2" class="h-5 w-5"></i>
                            </div>
                            <div>
                                <h3 id="delete-title" class="font-black nb-c-red">Hapus Akun</h3>
                                <p class="text-xs nb-c-black-60">Tindakan ini tidak dapat dibatalkan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <p class="mb-5 text-sm font-medium leading-relaxed">
                            Setelah akun dihapus, seluruh data dan informasi akan dihapus secara permanen.
                            Pastikan Anda sudah mengunduh atau mencatat data penting sebelum melanjutkan.
                        </p>

                        <button @click="showDeleteModal = true; $nextTick(() => $refs.deletePassword.focus())"
                                type="button"
                                class="nb-btn inline-flex items-center gap-2 rounded-lg nb-border-3px nb-bg-red px-5 py-2.5 text-sm font-bold uppercase tracking-wider nb-c-white">
                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                            Hapus Akun Saya
                        </button>

                        {{-- Delete Modal --}}
                        <div x-show="showDeleteModal"
                             x-cloak
                             x-transition:enter="transition-opacity duration-200"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition-opacity duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-[100]"
                             role="dialog"
                             aria-modal="true"
                             aria-labelledby="delete-modal-title">
                            <div class="absolute inset-0 nb-bg-overlay" @click="showDeleteModal = false"></div>
                            <div class="nb-modal-center">
                                <div class="rounded-2xl nb-border-3px nb-bg-white p-6 nb-shadow-8">
                                    <div class="flex items-start gap-4">
                                        <div class="flex h-12 w-12 shrink-0 nb-rotate-3 items-center justify-center rounded-lg nb-border-3px nb-bg-yellow nb-shadow-2">
                                            <i data-lucide="alert-triangle" class="h-6 w-6"></i>
                                        </div>
                                        <div>
                                            <h3 id="delete-modal-title" class="text-lg font-black">Hapus Akun?</h3>
                                            <p class="mt-1.5 text-sm nb-c-black-60">
                                                Semua data akan dihapus secara permanen. Masukkan password Anda untuk konfirmasi.
                                            </p>
                                        </div>
                                    </div>

                                    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                                        @csrf
                                        @method('delete')

                                        <div class="mb-6">
                                            <label for="delete_password" class="mb-2 block text-xs font-bold uppercase nb-tracking-wide">Password</label>
                                            <div class="relative">
                                                <i data-lucide="lock" class="nb-ico-l h-4 w-4"></i>
                                                <input id="delete_password"
                                                       x-ref="deletePassword"
                                                       type="password"
                                                       name="password"
                                                       autocomplete="current-password"
                                                       placeholder="Masukkan password Anda"
                                                       class="nb-input w-full rounded-lg py-3 nb-pad-l text-sm font-semibold focus:ring-0 @error('password', 'userDeletion') nb-input-error @enderror">
                                            </div>
                                            @error('password', 'userDeletion')
                                                <p class="mt-2 flex items-center gap-1.5 text-xs font-bold nb-c-red">
                                                    <i data-lucide="alert-circle" class="h-3.5 w-3.5"></i>{{ $message }}
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                                            <button type="button"
                                                    @click="showDeleteModal = false"
                                                    class="nb-btn rounded-lg nb-border-3px nb-bg-white px-5 py-2.5 text-sm font-bold uppercase tracking-wider nb-c-black">
                                                Batal
                                            </button>
                                            <button type="submit"
                                                    class="nb-btn inline-flex items-center justify-center gap-2 rounded-lg nb-border-3px nb-bg-red px-5 py-2.5 text-sm font-bold uppercase tracking-wider nb-c-white">
                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                                Ya, Hapus Akun
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>