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
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Perpustakaan Karina</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    {{-- Menu Umum --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('karina_books.list') }}">
                            <i class="bi bi-journal-bookmark"></i> Daftar Buku
                        </a>
                    </li>

                    @auth
                        {{-- Admin menu --}}
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.karina_books.index') }}">
                                    <i class="bi bi-book"></i> Kelola Buku
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.karina_categories.index') }}">
                                    <i class="bi bi-tags"></i> Kelola Kategori
                                </a>
                            </li>
                        @endif

                        {{-- Profil --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person"></i> Profil
                            </a>
                        </li>

                        {{-- Logout --}}
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn nav-link border-0 bg-transparent">
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
                    @endauth
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
