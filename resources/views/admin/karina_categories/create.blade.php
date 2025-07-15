@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Kategori Buku</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.karina_categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama kategori" value="{{ old('name') }}" required>
        </div>

        <a href="{{ route('admin.karina_categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
    </form>
</div>
@endsection
