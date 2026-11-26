<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()
            ->transactions()
            ->with(['wallet', 'category']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($catQuery) use ($search) {
                      $catQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('type') && in_array($request->input('type'), ['income', 'expense'])) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('transaction_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('transaction_date', '<=', $request->input('end_date'));
        }

        $transactions = $query
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $wallets = auth()->user()
            ->wallets()
            ->orderBy('name')
            ->get();

        $categories = auth()->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('transactions.create', compact(
            'wallets',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['income', 'expense'])],

            'wallet_id' => [
                'required',
                Rule::exists('wallets', 'id')
                    ->where('user_id', auth()->id()),
            ],

            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', auth()->id())
                    ->where('type', $request->input('type')),
            ],

            'amount' => ['required', 'numeric', 'gt:0', 'max:9999999999999.99'],

            'transaction_date' => ['required', 'date'],

            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        auth()->user()
            ->transactions()
            ->create($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $transaction = auth()->user()
            ->transactions()
            ->findOrFail($id);

        $wallets = auth()->user()
            ->wallets()
            ->orderBy('name')
            ->get();

        $categories = auth()->user()
            ->categories()
            ->orderBy('name')
            ->get();

        return view('transactions.edit', compact(
            'transaction',
            'wallets',
            'categories'
        ));
    }

    public function update(Request $request, string $id)
    {
        $transaction = auth()->user()
            ->transactions()
            ->findOrFail($id);

        $validated = $request->validate([
            'type' => ['required', Rule::in(['income', 'expense'])],

            'wallet_id' => [
                'required',
                Rule::exists('wallets', 'id')
                    ->where('user_id', auth()->id()),
            ],

            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
                    ->where('user_id', auth()->id())
                    ->where('type', $request->input('type')),
            ],

            'amount' => ['required', 'numeric', 'gt:0', 'max:9999999999999.99'],

            'transaction_date' => ['required', 'date'],

            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $transaction->update($validated);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $transaction = auth()->user()
            ->transactions()
            ->findOrFail($id);

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
