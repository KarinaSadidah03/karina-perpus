@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">
        <i class="bi bi-pencil-square"></i> Edit Tag
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

    <form action="{{ route('admin.karina_tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Tag</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $tag->name) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.karina_tags.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Batal
        </a>
    </form>
</div>
@endsection
