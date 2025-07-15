<?php

namespace App\Http\Controllers;

use App\Models\KarinaBookTag;
use Illuminate\Http\Request;

class KarinaBookTagController extends Controller
{
    public function index()
    {
        $tags = KarinaBookTag::latest()->paginate(10);
        return view('admin.karina_tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.karina_tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:karina_book_tags,name',
        ]);

        KarinaBookTag::create(['name' => $request->name]);

        return redirect()->route('admin.karina_tags.index')->with('success', 'Tag berhasil ditambahkan.');
    }

    public function edit(KarinaBookTag $tag)
    {
        return view('admin.karina_tags.edit', compact('tag'));
    }

    public function update(Request $request, KarinaBookTag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:karina_book_tags,name,' . $tag->id,
        ]);

        $tag->update(['name' => $request->name]);

        return redirect()->route('admin.karina_tags.index')->with('success', 'Tag berhasil diperbarui.');
    }

    public function destroy(KarinaBookTag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.karina_tags.index')->with('success', 'Tag berhasil dihapus.');
    }
}
