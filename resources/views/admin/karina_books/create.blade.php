@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📕 Tambah Buku Baru</h2>

    <form action="{{ route('karinabooks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Cover Buku</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload File Buku (PDF)</label>
            <input type="file" name="file_pdf" class="form-control" accept="application/pdf" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('karinabooks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
