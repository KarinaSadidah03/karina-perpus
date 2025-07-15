@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Buku</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.karina_books.index') }}" method="GET" class="row mb-3 g-2 align-items-center">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari judul buku..."
                value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="category_id" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">
                <i class="bi bi-search"></i> Cari
            </button>
        </div>
    </form>

    <a href="{{ route('admin.karina_books.create') }}" class="btn btn-primary mb-3">+ Tambah Buku</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th width="170px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $book->cover_image) }}" width="70" alt="cover">
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category->name ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($book->description, 80) }}</td>
                        <td>
                            <a href="{{ route('admin.karina_books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.karina_books.destroy', $book->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada buku yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $books->appends(request()->query())->links() }}
    </div>
</div>
@endsection
