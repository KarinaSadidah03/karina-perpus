<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Attributes\Middleware;
use App\Models\KarinaBook;
use App\Models\KarinaCategory;

#[Middleware('auth')]
#[Middleware('admin')]
class KarinaBookController extends Controller
{
    // Tampilkan daftar buku (Admin)
    public function index(Request $request)
    {
        $query = KarinaBook::with('category');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->latest()->paginate(10);
        $categories = KarinaCategory::all();

        return view('admin.karina_books.index', compact('books', 'categories'));
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
            'author' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'file_pdf' => 'required|mimes:pdf|max:5120',
            'description' => 'required|string',
            'category_id' => 'required|exists:karina_categories,id',
        ]);

        $coverPath = $request->file('cover_image')->store('covers', 'public');
        $pdfPath = $request->file('file_pdf')->store('books', 'public');

        KarinaBook::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'cover_image' => $coverPath,
            'file_pdf' => $pdfPath,
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('admin.karina_books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Tampilkan detail buku
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
            'author' => 'required|string|max:255',
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
            'author' => $validated['author'],
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

    // Tampilkan daftar buku untuk user umum
    public function list(Request $request)
    {
        $categories = KarinaCategory::all();
        $query = KarinaBook::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $books = $query->latest()->paginate(9);

        return view('karina_books.list', compact('books', 'categories'));
    }
}
