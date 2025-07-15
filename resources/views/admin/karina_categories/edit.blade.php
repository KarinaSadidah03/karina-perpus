@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Kategori Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.karina_categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <a href="{{ route('admin.karina_categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Perbarui
        </button>
    </form>
</div>
@endsection
