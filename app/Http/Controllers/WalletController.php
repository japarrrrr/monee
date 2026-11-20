<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()
            ->wallets()
            ->latest()
            ->get();

        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        return view('wallets.create');
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

    $wallet->delete();

    return redirect()
        ->route('wallets.index')
        ->with('success', 'Dompet berhasil dihapus.');
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
}
