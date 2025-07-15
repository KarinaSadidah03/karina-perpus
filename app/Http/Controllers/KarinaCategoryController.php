<?php

namespace App\Http\Controllers;

use App\Models\KarinaCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Attributes\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

#[Middleware(['auth', 'admin'])] // Middleware hanya untuk admin
class KarinaCategoryController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $categories = KarinaCategory::latest()->get();
        return view('admin.karina_categories.index', compact('categories'));
    }

    // Tampilkan form tambah kategori
    public function create()
    {
        return view('admin.karina_categories.create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:karina_categories,name',
        ]);

        KarinaCategory::create($validated);

        return redirect()->route('admin.karina_categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan detail kategori (opsional)
    public function show(KarinaCategory $category)
    {
        return view('admin.karina_categories.show', compact('category'));
    }

    // Tampilkan form edit kategori
    public function edit(KarinaCategory $category)
    {
        return view('admin.karina_categories.edit', compact('category'));
    }

    // Update kategori
    public function update(Request $request, KarinaCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:karina_categories,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('admin.karina_categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy(KarinaCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.karina_categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
