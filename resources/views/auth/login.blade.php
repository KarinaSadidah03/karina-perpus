@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center karina-header">
                    <h4>Login Perpustakaan Karina</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Checkbox + Link --}}
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="auth-link">Lupa password?</a>
                            @endif
                        </div>

                        {{-- Tombol Login --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-register">
                                Login
                            </button>
                        </div>

                        {{-- Link Daftar --}}
                        <div class="mt-3 text-center">
                            <a href="{{ route('register') }}" class="auth-link">Belum punya akun? Daftar sekarang!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
