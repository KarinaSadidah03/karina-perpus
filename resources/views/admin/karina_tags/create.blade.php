@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">
        <i class="bi bi-plus-circle"></i> Tambah Tag Baru
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.karina_tags.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Tag</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: Fiksi, Edukasi, Sains" required value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="{{ route('admin.karina_tags.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
