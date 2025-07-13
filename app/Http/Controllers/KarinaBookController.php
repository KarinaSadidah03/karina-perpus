<?php

namespace App\Http\Controllers;

use App\Models\KarinaBook;
use App\Models\KarinaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarinaBookController extends Controller
{
    // Tampilkan daftar buku (Admin)
    public function index()
    {
        $books = KarinaBook::with('category')->latest()->paginate(10);
        return view('admin.karina_books.index', compact('books'));
    }

    // Tampilkan form tambah buku
    public function create()
    {
        $categories = KarinaCategory::all();
        return view('admin.karina_books.create', compact('categories'));
    }

    // Simpan data buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'file_pdf' => 'required|mimes:pdf|max:5120',
            'description' => 'required|string',
            'category_id' => 'required|exists:karina_categories,id',
        ]);

        $coverPath = $request->file('cover_image')->store('covers', 'public');
        $pdfPath = $request->file('file_pdf')->store('books', 'public');

        KarinaBook::create([
            'title' => $validated['title'],
            'cover_image' => $coverPath,
            'file_pdf' => $pdfPath,
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('admin.karina_books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Tampilkan detail buku (sudah kamu buat)
    public function show($id)
    {
        $book = KarinaBook::with('category', 'reviews')->findOrFail($id);
        return view('karina_books.show', compact('book'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $book = KarinaBook::findOrFail($id);
        $categories = KarinaCategory::all();
        return view('admin.karina_books.edit', compact('book', 'categories'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $book = KarinaBook::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_pdf' => 'nullable|mimes:pdf|max:5120',
            'description' => 'required|string',
            'category_id' => 'required|exists:karina_categories,id',
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);
            $book->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($book->file_pdf);
            $book->file_pdf = $request->file('file_pdf')->store('books', 'public');
        }

        $book->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('admin.karina_books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Hapus buku
    public function destroy($id)
    {
        $book = KarinaBook::findOrFail($id);
        Storage::disk('public')->delete([$book->cover_image, $book->file_pdf]);
        $book->delete();

        return redirect()->route('admin.karina_books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
