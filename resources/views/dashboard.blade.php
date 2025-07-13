<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center fw-bold fs-3 text-dark">
            <i class="bi bi-house-door-fill me-2"></i>Dashboard Perpustakaan Karina
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title mb-3">
                        <i class="bi bi-person-circle me-2"></i>Halo, {{ Auth::user()->name }}! 👋
                    </h4>
                    <p class="card-text">
                        Selamat datang di <strong>Sistem Perpustakaan Digital Karina</strong>.<br>
                        Gunakan menu navigasi di atas untuk mengakses fitur perpustakaan.
                    </p>

                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-book me-1"></i> Lihat Katalog Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
