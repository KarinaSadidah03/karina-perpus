<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Perpustakaan Karina') }}</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="min-vh-100 d-flex flex-column">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">📚 Karina-Perpus</a>

            <button class="btn btn-sm btn-light ms-auto" id="themeToggle">🌙 Mode</button>
        </div>
    </nav>

    {{-- Konten utama --}}
    <main class="flex-fill d-flex justify-content-center align-items-center">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <a href="/">
                    <x-application-logo class="w-25 h-25" />
                </a>
                <h4 class="mt-3">Selamat Datang</h4>
            </div>

            {{ $slot }}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center py-3 bg-light mt-auto">
        <small>© {{ date('Y') }} Karina Sadidah - Perpustakaan Digital</small>
    </footer>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Dark mode toggle --}}
    <script>
        document.getElementById('themeToggle').addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
