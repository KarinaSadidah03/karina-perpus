@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>

    <form action="{{ route('karinacategories.update', $karinacategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $karinacategory->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('karinacategories.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
