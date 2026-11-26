import Chart from 'chart.js/auto';
window.Chart = Chart;

import './bootstrap';

import Alpine from 'alpinejs';
import {
    createIcons,
    // Navigation & Layout
    LayoutDashboard,
    Wallet,
    WalletCards,
    ArrowLeftRight,
    ChartNoAxesCombined,
    UserRound,
    Settings,
    LogOut,
    LogIn,
    Plus,
    Menu,
    X,
    Bell,
    House,
    // Transactions & Finance
    TrendingUp,
    TrendingDown,
    Banknote,
    Building2,
    Smartphone,
    Receipt,
    ReceiptText,
    // Actions
    Pencil,
    Trash2,
    Save,
    ArrowLeft,
    ArrowRight,
    Search,
    Filter,
    Download,
    // Categories & Tags
    Tags,
    Tag,
    ShoppingCart,
    Utensils,
    Car,
    HeartPulse,
    GraduationCap,
    Briefcase,
    // Status & Feedback
    CheckCircle,
    AlertCircle,
    AlertTriangle,
    Info,
    // Misc
    ChevronDown,
    ChevronRight,
    Eye,
    EyeOff,
    RefreshCw,
    Calendar,
    Clock,
    SlidersHorizontal,
    // Auth
    Lock,
    Mail,
    User,
    ShieldCheck,
    Sparkles,
} from 'lucide';

window.Alpine = Alpine;

// =============================================
// TOAST NOTIFICATION SYSTEM
// =============================================
window.showToast = function (message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const id = 'toast-' + Date.now();
    const icons = {
        success: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
        error:   '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
        warning: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
        info:    '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>',
    };
    const colors = {
        success: 'bg-[#FFFFFF] text-[#16A34A] border-2 border-[#171717] shadow-[4px_4px_0px_0px_#171717]',
        error:   'bg-[#FFFFFF] text-[#EF4444] border-2 border-[#171717] shadow-[4px_4px_0px_0px_#171717]',
        warning: 'bg-[#FFFFFF] text-[#D97706] border-2 border-[#171717] shadow-[4px_4px_0px_0px_#171717]',
        info:    'bg-[#FFFFFF] text-[#2563EB] border-2 border-[#171717] shadow-[4px_4px_0px_0px_#171717]',
    };

    const toast = document.createElement('div');
    toast.id = id;
    toast.className = `flex items-start gap-3 rounded-xl px-4 py-3.5 text-sm font-bold max-w-sm transition-all duration-200 translate-x-full opacity-0 ${colors[type] || colors.info}`;
    toast.innerHTML = `
        <span class="shrink-0 mt-0.5">${icons[type] || icons.info}</span>
        <span class="flex-1 text-[#171717] font-semibold">${message}</span>
        <button onclick="document.getElementById('${id}').remove()" class="shrink-0 text-[#171717] opacity-60 hover:opacity-100 ml-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>`;

    container.appendChild(toast);

    // Animate in
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
        });
    });

    // Auto remove
    setTimeout(() => {
        toast.classList.add('translate-x-full', 'opacity-0');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
};

// =============================================
// GLOBAL DELETE CONFIRMATION MODAL
// =============================================
window.confirmDelete = function (formId, message = 'Apakah Anda yakin ingin menghapus data ini?') {
    const modal = document.getElementById('confirm-modal');
    const msgEl = document.getElementById('confirm-modal-message');
    const confirmBtn = document.getElementById('confirm-modal-btn');

    if (!modal) return;

    msgEl.textContent = message;
    modal.classList.remove('hidden');

    const newBtn = confirmBtn.cloneNode(true);
    confirmBtn.parentNode.replaceChild(newBtn, confirmBtn);

    newBtn.addEventListener('click', () => {
        const form = document.getElementById(formId);
        if (form) form.submit();
        modal.classList.add('hidden');
    });
};

window.closeConfirmModal = function () {
    const modal = document.getElementById('confirm-modal');
    if (modal) modal.classList.add('hidden');
};

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    createIcons({
        icons: {
            LayoutDashboard,
            Wallet,
            WalletCards,
            ArrowLeftRight,
            ChartNoAxesCombined,
            UserRound,
            Settings,
            LogOut,
            LogIn,
            Plus,
            Menu,
            X,
            Bell,
            House,
            TrendingUp,
            TrendingDown,
            Banknote,
            Building2,
            Smartphone,
            Receipt,
            ReceiptText,
            Pencil,
            Trash2,
            Save,
            ArrowLeft,
            Search,
            Filter,
            Download,
            Tags,
            Tag,
            ShoppingCart,
            Utensils,
            Car,
            HeartPulse,
            GraduationCap,
            Briefcase,
            CheckCircle,
            AlertCircle,
            AlertTriangle,
            Info,
            ChevronDown,
            ChevronRight,
            Eye,
            EyeOff,
            RefreshCw,
            Calendar,
            Clock,
            SlidersHorizontal,
            Lock,
            Mail,
            User,
            ShieldCheck,
            Sparkles,
        },
    });
});
