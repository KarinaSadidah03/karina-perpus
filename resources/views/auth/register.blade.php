@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center karina-header">
                    <h4>Register Akun</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        {{-- Tombol Daftar --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-register">
                                Daftar
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}" class="auth-link">Sudah punya akun? Masuk di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
