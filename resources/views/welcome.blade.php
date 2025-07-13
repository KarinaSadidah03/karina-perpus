@extends('layouts.app')

@section('content')
    <div class="container my-5">
        {{-- Heading utama --}}
        <div class="text-center mb-5">
            <h1 class="fw-bold">Selamat Datang di Perpustakaan Karina 📚</h1>
            <p class="lead">Baca dan temukan buku favoritmu secara online ✨</p>
        </div>

        {{-- Rekomendasi Buku --}}
        <h3 class="mb-4">📖 Rekomendasi Buku</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                             class="card-img-top"
                             alt="{{ $book->title }}"
                             style="height: 300px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($book->description, 80) }}</p>
                            <a href="{{ route('karina_books.show', $book->id) }}" class="mt-auto btn btn-sm btn-primary">
                                Detail Buku
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada buku yang tersedia untuk direkomendasikan.</p>
            @endforelse
        </div>
    </div>
@endsection
