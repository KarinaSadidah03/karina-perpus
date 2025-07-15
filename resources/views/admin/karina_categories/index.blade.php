@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kategori Buku</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.karina_categories.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th width="150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.karina_categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('admin.karina_categories.destroy', $category->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
