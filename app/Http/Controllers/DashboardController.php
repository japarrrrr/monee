<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Saldo setiap dompet
        $wallets = $user->wallets()
            ->withSum(['transactions as total_income' => fn ($q) => $q->where('type', 'income')], 'amount')
            ->withSum(['transactions as total_expense' => fn ($q) => $q->where('type', 'expense')], 'amount')
            ->latest()
            ->get();

        foreach ($wallets as $wallet) {
            $wallet->current_balance = (float) $wallet->opening_balance
                + (float) ($wallet->total_income ?? 0)
                - (float) ($wallet->total_expense ?? 0);
        }

        $totalBalance = $wallets->sum('current_balance');

        // Ringkasan transaksi bulan ini
        $monthlySummary = $user->transactions()
            ->whereMonth('transaction_date', now()->month)
            ->whereYear('transaction_date', now()->year)
            ->selectRaw("
                COALESCE(SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END), 0) AS monthly_income,
                COALESCE(SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END), 0) AS monthly_expense,
                COUNT(*) AS monthly_transaction_count
            ")
            ->first();

        $monthlyIncome = (float) $monthlySummary->monthly_income;
        $monthlyExpense = (float) $monthlySummary->monthly_expense;
        $monthlyTransactionCount = (int) $monthlySummary->monthly_transaction_count;
        $netFlow = $monthlyIncome - $monthlyExpense;

        // Transaksi terbaru
        $recentTransactions = $user->transactions()
            ->with(['wallet', 'category'])
            ->latest('transaction_date')
            ->latest('id')
            ->limit(5)
            ->get();

        // Grafik 7 hari terakhir
        $chartTransactions = $user->transactions()
            ->whereBetween('transaction_date', [
                now()->subDays(6)->toDateString(),
                now()->toDateString(),
            ])
            ->selectRaw("
                transaction_date,
                SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) AS income,
                SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) AS expense
            ")
            ->groupBy('transaction_date')
            ->get()
            ->keyBy('transaction_date');

        $chartData = collect(range(6, 0))->map(function ($day) use ($chartTransactions) {
            $date = now()->subDays($day);

            return [
                'label' => $date->translatedFormat('D'),
                'income' => (float) ($chartTransactions[$date->toDateString()]->income ?? 0),
                'expense' => (float) ($chartTransactions[$date->toDateString()]->expense ?? 0),
            ];
        });

        return view('dashboard', compact(
            'wallets',
            'totalBalance',
            'monthlyIncome',
            'monthlyExpense',
            'monthlyTransactionCount',
            'netFlow',
            'recentTransactions',
            'chartData'
        ));
    }
}
