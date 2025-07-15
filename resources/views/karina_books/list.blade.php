@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="bi bi-book"></i> Daftar Buku</h2>

    <form action="{{ route('karina_books.list') }}" method="GET" class="row mb-4">
        <div class="col-md-5 mb-2">
            <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4 mb-2">
            <select name="category" class="form-select">
                <option value="">-- Semua Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <button class="btn btn-outline-primary w-100" type="submit">
                <i class="bi bi-funnel"></i> Filter
            </button>
        </div>
    </form>

    <form action="{{ route('karina_books.list') }}" method="GET" class="mb-4">

    <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $book->title }}</h5>
                        <p class="card-text text-muted mb-0"><i class="bi bi-person"></i> {{ $book->author }}</p>
                        <p class="card-text small text-secondary"><i class="bi bi-tags"></i> {{ $book->category->name }}</p>
                        <a href="{{ route('karina_books.show', $book->id) }}" class="btn btn-sm btn-primary mt-2">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada buku yang tersedia.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection
