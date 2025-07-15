@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="bi bi-pencil-square"></i> Edit Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.karina_books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Nama Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Lama</label><br>
            <img src="{{ asset('storage/' . $book->cover_image) }}" width="100" alt="Cover Buku">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Ganti Gambar Cover</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">File PDF Lama</label><br>
            <a href="{{ asset('storage/' . $book->file_pdf) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-file-earmark-pdf"></i> Lihat PDF
            </a>
        </div>

        <div class="mb-3">
            <label for="file_pdf" class="form-label">Ganti File PDF</label>
            <input type="file" name="file_pdf" class="form-control" accept=".pdf">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tag Buku</label>
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}"
                                class="form-check-input" id="tag{{ $tag->id }}"
                                {{ $book->tags->contains($tag->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update
        </button>
        <a href="{{ route('admin.karina_books.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Batal
        </a>
    </form>
</div>
@endsection
