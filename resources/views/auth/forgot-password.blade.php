@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white text-center">
                    <h4>Reset Password</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Anda</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-white">Kirim Link Reset</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}">Kembali ke login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
