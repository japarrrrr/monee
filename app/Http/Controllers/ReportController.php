<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $startDate = isset($validated['start_date'])
            ? Carbon::parse($validated['start_date'])->startOfDay()
            : now()->startOfMonth();

        $endDate = isset($validated['end_date'])
            ? Carbon::parse($validated['end_date'])->endOfDay()
            : now()->endOfDay();

        $user = auth()->user();

        // Data transaksi berdasarkan periode
        $transactions = $user->transactions()
            ->with(['wallet', 'category'])
            ->whereBetween('transaction_date', [
                $startDate->toDateString(),
                $endDate->toDateString()
            ]);

        // Ringkasan pemasukan dan pengeluaran
        $totalIncome = (clone $transactions)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = (clone $transactions)
            ->where('type', 'expense')
            ->sum('amount');

        $netIncome = $totalIncome - $totalExpense;

        $totalTransactions = (clone $transactions)->count();

        // Ringkasan berdasarkan kategori
        $categoryReports = (clone $transactions)
            ->selectRaw('category_id, type, SUM(amount) as total')
            ->with('category')
            ->groupBy('category_id', 'type')
            ->orderByDesc('total')
            ->get();

        // Data grafik berdasarkan tanggal
        $dailyReports = (clone $transactions)
            ->selectRaw('transaction_date, type, SUM(amount) as total')
            ->groupBy('transaction_date', 'type')
            ->orderBy('transaction_date')
            ->get();

        // Daftar transaksi
        $transactionList = (clone $transactions)
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('reports.index', compact(
            'startDate',
            'endDate',
            'totalIncome',
            'totalExpense',
            'netIncome',
            'totalTransactions',
            'categoryReports',
            'dailyReports',
            'transactionList'
        ));
    }
}
