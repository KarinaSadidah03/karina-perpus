@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Kategori Buku</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">
                ID: {{ $category->id }}<br>
                Dibuat pada: {{ $category->created_at->format('d M Y, H:i') }}<br>
                Diperbarui pada: {{ $category->updated_at->format('d M Y, H:i') }}
            </p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.karina_categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('admin.karina_categories.edit', $category->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
    </div>
</div>
@endsection
