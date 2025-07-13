@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kategori Buku</h2>

    <a href="{{ route('karinacategories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('karinacategories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('karinacategories.destroy', $cat->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
