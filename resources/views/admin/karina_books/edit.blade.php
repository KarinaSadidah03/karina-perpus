@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Edit Buku</h2>

    <form action="{{ route('karinabooks.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Sekarang:</label><br>
            <img src="{{ asset('storage/' . $book->cover_image) }}" width="100">
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Cover Buku (Opsional)</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti File PDF (Opsional)</label>
            <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('karinabooks.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
