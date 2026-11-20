
import './bootstrap';

import Alpine from 'alpinejs';
import { createIcons, LayoutDashboard, Wallet, ArrowLeftRight, ChartNoAxesCombined, UserRound, Settings, LogOut, Plus, Menu, X, Bell, House } from 'lucide';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    createIcons({
        icons: {
            LayoutDashboard,
            Wallet,
            ArrowLeftRight,
            ChartNoAxesCombined,
            UserRound,
            Settings,
            LogOut,
            Plus,
            Menu,
            X,
            Bell,
            House,
        },
    });
});
