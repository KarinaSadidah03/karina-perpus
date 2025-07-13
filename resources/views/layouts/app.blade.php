<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Karina</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom CSS --}}
    @vite('resources/css/app.css')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6d4c41;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="bi bi-book"></i> Karina-Perpus
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#karinaNavbar" aria-controls="karinaNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="karinaNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>

                        {{-- Admin-only: Kelola Buku --}}
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/books') }}">
                                    <i class="bi bi-book-half"></i> Kelola Buku
                                </a>
                            </li>
                        @endif

                        {{-- Umum: Profil & Riwayat --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/profile') }}">
                                <i class="bi bi-person-circle"></i> Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/riwayat-peminjaman') }}">
                                <i class="bi bi-clock-history"></i> Riwayat Peminjaman
                            </a>
                        </li>

                        {{-- Logout --}}
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        {{-- Guest --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Register
                            </a>
                        </li>
                    @endauth

                    {{-- Theme Toggle --}}
                    <li class="nav-item">
                        <button class="btn btn-sm btn-light ms-3" id="themeToggle">
                            <i class="bi bi-moon-stars-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Header & Content --}}
    <main class="container py-4">
        @isset($header)
            <div class="mb-4">
                {{ $header }}
            </div>
        @endisset

        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Dark Mode Toggle --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggle = document.getElementById('themeToggle');
            const body = document.body;

            // Cek & terapkan tema dari localStorage
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
            }

            if (toggle) {
                toggle.addEventListener('click', function () {
                    body.classList.toggle('dark-mode');
                    const theme = body.classList.contains('dark-mode') ? 'dark' : 'light';
                    localStorage.setItem('theme', theme);
                });
            } else {
                console.warn('Tombol themeToggle tidak ditemukan!');
            }
        });
    </script>
</body>
</html>
