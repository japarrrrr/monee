<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()
            ->categories()
            ->orderBy('type')
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
    return view('categories.create');
    }
    
    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'max:100',
            \Illuminate\Validation\Rule::unique('categories', 'name')
                ->where('user_id', auth()->id())
                ->where('type', $request->type),
        ],
        'type' => ['required', 'in:income,expense'],
        'icon' => ['nullable', 'string', 'max:50'],
        'color' => ['nullable', 'string', 'max:20'],
    ], [
        'name.unique' => 'Nama kategori tersebut sudah digunakan untuk jenis ini.',
    ]);

    auth()->user()->categories()->create($validated);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
    $category = auth()->user()
        ->categories()
        ->findOrFail($id);

    return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
    $category = auth()->user()
        ->categories()
        ->findOrFail($id);

    $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'max:100',
            \Illuminate\Validation\Rule::unique('categories', 'name')
                ->where('user_id', auth()->id())
                ->where('type', $request->type)
                ->ignore($category->id),
        ],
        'type' => ['required', 'in:income,expense'],
        'icon' => ['nullable', 'string', 'max:50'],
        'color' => ['nullable', 'string', 'max:20'],
    ], [
        'name.unique' => 'Nama kategori tersebut sudah digunakan untuk jenis ini.',
    ]);

    $category->update($validated);

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $category = auth()->user()
        ->categories()
        ->findOrFail($id);

    $category->delete();

    return redirect()
        ->route('categories.index')
        ->with('success', 'Kategori berhasil dihapus.');
    }
}   