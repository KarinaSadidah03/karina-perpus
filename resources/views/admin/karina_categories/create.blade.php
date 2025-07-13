@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori</h2>

    <form action="{{ route('karinacategories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('karinacategories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
