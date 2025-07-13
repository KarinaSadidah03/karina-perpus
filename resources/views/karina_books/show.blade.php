@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-3">{{ $book->title }}</h2>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded" alt="{{ $book->title }}">
            </div>
            <div class="col-md-8">
                <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
                <p>{{ $book->description }}</p>

                <a href="{{ asset('storage/' . $book->file_pdf) }}" target="_blank" class="btn btn-success">
                    📖 Baca Buku
                </a>
            </div>
        </div>

        {{-- Ulasan buku --}}
        <hr>
        <h5 class="mt-4">Ulasan Pembaca</h5>
        @forelse ($book->reviews as $review)
            <div class="mb-3 border-bottom pb-2">
                <strong>{{ $review->user->name }}</strong> ⭐️ {{ $review->rating }}/5<br>
                <p>{{ $review->comment }}</p>
            </div>
        @empty
            <p>Belum ada ulasan.</p>
        @endforelse
    </div>
@endsection
