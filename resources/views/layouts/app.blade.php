<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Monee') }} @hasSection('title') — @yield('title') @endif</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#F5F5F0] text-[#171717]">

    <div class="min-h-screen bg-[#F5F5F0]">

        @include('layouts.navigation')

        {{-- MAIN CONTENT --}}
        <main class="pb-24 lg:pb-8 lg:pl-64 min-h-screen">
            {{ $slot }}
        </main>

    </div>

    {{-- ============================================ --}}
    {{-- GLOBAL CONFIRM DELETE MODAL (NEO-BRUTALISM) --}}
    {{-- ============================================ --}}
    <div id="confirm-modal"
         class="fixed inset-0 z-[100] hidden"
         role="dialog"
         aria-modal="true">

        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-[#171717]/60"
             onclick="closeConfirmModal()"></div>

        {{-- Modal Panel --}}
        <div class="absolute left-1/2 top-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 px-4">
            <div class="neo-card-lg p-6 bg-white">
                <div class="flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#EF4444] border-2 border-[#171717] shadow-[2px_2px_0px_#171717] text-white">
                        <i data-lucide="alert-triangle" class="h-6 w-6"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-black text-[#171717]">Konfirmasi Hapus</h3>
                        <p id="confirm-modal-message" class="mt-1 text-sm font-bold text-[#525252]">
                            Apakah Anda yakin ingin menghapus data ini?
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button onclick="closeConfirmModal()"
                            class="neo-btn neo-btn-white px-5 py-2.5 text-sm">
                        Batal
                    </button>
                    <button id="confirm-modal-btn"
                            class="neo-btn neo-btn-danger px-5 py-2.5 text-sm">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- GLOBAL TOAST NOTIFICATION CONTAINER --}}
    {{-- ============================================ --}}
    <div id="toast-container"
         class="fixed bottom-24 right-4 z-[200] flex flex-col gap-2.5 lg:bottom-6 lg:right-6">
    </div>

    {{-- ============================================ --}}
    {{-- AUTO-SHOW SESSION TOAST --}}
    {{-- ============================================ --}}
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showToast(@json(session('success')), 'success');
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showToast(@json(session('error')), 'error');
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                showToast(@json(session('warning')), 'warning');
            });
        </script>
    @endif

    @stack('scripts')
</body>
</html>