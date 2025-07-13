<?php

namespace App\Http\Controllers;

use App\Models\KarinaCategory;
use Illuminate\Http\Request;

class KarinaCategoryController extends Controller
{
    public function index()
    {
        $categories = KarinaCategory::all();
        return view('admin.karina_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.karina_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:karina_categories,name']);
        KarinaCategory::create($request->only('name'));

        return redirect()->route('karinacategories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(KarinaCategory $karinacategory)
    {
        return view('admin.karina_categories.edit', compact('karinacategory'));
    }

    public function update(Request $request, KarinaCategory $karinacategory)
    {
        $request->validate(['name' => 'required']);
        $karinacategory->update($request->only('name'));

        return redirect()->route('karinacategories.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(KarinaCategory $karinacategory)
    {
        $karinacategory->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
