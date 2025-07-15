@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">
        <i class="bi bi-plus-circle"></i> Tambah Buku
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.karina_books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Nama Penulis</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="" disabled selected>Pilih kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                class="form-check-input" id="tag{{ $tag->id }}">
                            <label class="form-check-label" for="tag{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Gambar Sampul (jpg/png)</label>
            <input type="file" name="cover_image" accept="image/*" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="file_pdf" class="form-label">File Buku (PDF)</label>
            <input type="file" name="file_pdf" accept="application/pdf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tag Buku</label>
            <select name="tags[]" class="form-select" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Gunakan Ctrl (atau Cmd) untuk memilih lebih dari satu tag</small>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="{{ route('admin.karina_books.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
