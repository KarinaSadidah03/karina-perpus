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
    <h4><i class="bi bi-chat-left-text"></i> Ulasan Pembaca</h4>

    @if ($book->reviews->isEmpty())
        <p class="text-muted">Belum ada ulasan untuk buku ini.</p>
    @else
        @foreach ($book->reviews as $review)
            <div class="border rounded p-3 mb-3">
                <strong>{{ $review->user->name }}</strong>
                <span class="text-warning">({{ $review->rating }} ★)</span>
                <p class="mb-0">{{ $review->content }}</p>
                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    @endif

    @auth
    <hr>
    <h5>Tambahkan Ulasan Anda</h5>
    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" class="form-select" required>
                <option value="">Pilih rating</option>
                @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}">{{ $i }} ★</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
                    <label for="content" class="form-label">Ulasan</label>
                    <textarea name="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i> Kirim Ulasan
                </button>
            </form>
        @endauth

        @guest
            <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk menulis ulasan.</p>
        @endguest

    </div>
@endsection
