@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="bi bi-book"></i> Detail Buku</h2>

    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded-start" alt="Cover Buku">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">{{ $book->title }}</h4>
                    <p>{{ $book->author }}</p>
                    <p class="card-text"><strong>Kategori:</strong> {{ $book->category->name ?? '-' }}</p>
                    <p class="card-text">{{ $book->description }}</p>
                    <a href="{{ asset('storage/' . $book->file_pdf) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-file-earmark-pdf"></i> Baca PDF
                    </a>
                    <a href="{{ route('admin.karina_books.index') }}" class="btn btn-secondary mt-2">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
