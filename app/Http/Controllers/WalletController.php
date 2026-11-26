<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()
            ->wallets()
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

        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        return view('wallets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:cash,bank,ewallet'],
            'opening_balance' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        auth()->user()->wallets()->create($validated);

        return redirect()
            ->route('wallets.index')
            ->with('success', 'Dompet berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $wallet = auth()->user()
            ->wallets()
            ->findOrFail($id);

        return view('wallets.edit', compact('wallet'));
    }

    public function update(Request $request, $id)
    {
        $wallet = auth()->user()
            ->wallets()
            ->findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', 'in:cash,bank,ewallet'],
            'opening_balance' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        $wallet->update($validated);

        return redirect()
            ->route('wallets.index')
            ->with('success', 'Dompet berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $wallet = auth()->user()
            ->wallets()
            ->findOrFail($id);

        if ($wallet->transactions()->exists()) {
            return redirect()
                ->route('wallets.index')
                ->with('error', 'Dompet tidak dapat dihapus karena masih memiliki riwayat transaksi.');
        }

        $wallet->delete();

        return redirect()
            ->route('wallets.index')
            ->with('success', 'Dompet berhasil dihapus.');
    }
}
