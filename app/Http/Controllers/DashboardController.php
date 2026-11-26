<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Saldo setiap dompet
        $wallets = $user->wallets()
            ->withSum([
                'transactions as total_income' => function ($query) {
                    $query->where('type', 'income');
                }
            ], 'amount')
            ->withSum([
                'transactions as total_expense' => function ($query) {
                    $query->where('type', 'expense');
                }
            ], 'amount')
            ->latest()
            ->get();

        foreach ($wallets as $wallet) {
            $income = (float) ($wallet->total_income ?? 0);
            $expense = (float) ($wallet->total_expense ?? 0);

            $wallet->current_balance =
                (float) $wallet->opening_balance + $income - $expense;
        }

        $totalBalance = $wallets->sum('current_balance');

        // Ringkasan transaksi bulan ini
        $startOfMonth = now()->startOfMonth()->toDateString();
        $endOfMonth = now()->endOfMonth()->toDateString();

        $monthlyTransactions = $user->transactions()
            ->whereBetween('transaction_date', [
                $startOfMonth,
                $endOfMonth
            ])
            ->get();

        $monthlyIncome = $monthlyTransactions
            ->where('type', 'income')
            ->sum('amount');

        $monthlyExpense = $monthlyTransactions
            ->where('type', 'expense')
            ->sum('amount');

        $netFlow = $monthlyIncome - $monthlyExpense;

        // Transaksi terbaru
        $recentTransactions = $user->transactions()
            ->with(['wallet', 'category'])
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        // Data grafik 7 hari terakhir
        $chartStart = now()->subDays(6)->startOfDay();

        $chartTransactions = $user->transactions()
            ->whereBetween('transaction_date', [
                $chartStart->toDateString(),
                now()->toDateString()
            ])
            ->get();

        $chartData = collect(range(6, 0))->reverse()->map(function ($day) use ($chartTransactions) {
            $date = now()->subDays($day);

            $dailyTransactions = $chartTransactions->filter(
                fn ($transaction) =>
                    $transaction->transaction_date->toDateString() === $date->toDateString()
            );

            return [
                'label' => $date->translatedFormat('D'),
                'income' => (float) $dailyTransactions
                    ->where('type', 'income')
                    ->sum('amount'),
                'expense' => (float) $dailyTransactions
                    ->where('type', 'expense')
                    ->sum('amount'),
            ];
        })->values();

        return view('dashboard', compact(
            'wallets',
            'totalBalance',
            'monthlyIncome',
            'monthlyExpense',
            'netFlow',
            'recentTransactions',
            'chartData'
        ));
    }
}
