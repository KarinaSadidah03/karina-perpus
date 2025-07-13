<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KarinaBookController;
use App\Http\Controllers\KarinaCategoryController;
use App\Models\KarinaBook;

// Halaman Beranda (menampilkan buku acak)
Route::get('/', function () {
    $books = KarinaBook::inRandomOrder()->limit(6)->get();
    return view('welcome', compact('books'));
});

// Detail buku
Route::get('/books/{id}', [KarinaBookController::class, 'show'])->name('karina_books.show');

// Dashboard umum
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Redirect login setelah autentikasi
Route::get('/home', function () {
    return redirect()->route('redirect.role');
});

// Profil user (semua yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin (hanya admin yang bisa akses)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin/books', KarinaBookController::class)->names([
        'index' => 'admin.karina_books.index',
        'create' => 'admin.karina_books.create',
        'store' => 'admin.karina_books.store',
        'show' => 'admin.karina_books.show',
        'edit' => 'admin.karina_books.edit',
        'update' => 'admin.karina_books.update',
        'destroy' => 'admin.karina_books.destroy',
    ]);

    Route::resource('/admin/categories', KarinaCategoryController::class)->names([
        'index' => 'admin.karina_categories.index',
        'create' => 'admin.karina_categories.create',
        'store' => 'admin.karina_categories.store',
        'show' => 'admin.karina_categories.show',
        'edit' => 'admin.karina_categories.edit',
        'update' => 'admin.karina_categories.update',
        'destroy' => 'admin.karina_categories.destroy',
    ]);

    Route::get('/tes-view', function () {
    return view('admin.karina_books.index');
});

});

// Auth bawaan Laravel Breeze (login, register, dll)
require __DIR__.'/auth.php';
