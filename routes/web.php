<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KarinaBookController;
use App\Http\Controllers\KarinaCategoryController;
use App\Http\Controllers\KarinaReviewController;
use App\Models\KarinaBook;

// Halaman beranda (menampilkan buku acak)
Route::get('/', function () {
    $books = KarinaBook::inRandomOrder()->limit(6)->get();
    return view('welcome', compact('books'));
});

// Detail buku (untuk umum)
Route::get('/books/{id}', [KarinaBookController::class, 'show'])->name('karina_books.show');

// Dashboard umum (untuk semua user setelah login & verifikasi email)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Redirect login setelah autentikasi (opsional redirect sesuai role)
Route::get('/home', function () {
    return redirect()->route('redirect.role');
});

// Profil user (semua yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource route admin (gunakan attribute middleware di controller)
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

Route::get('/books', [KarinaBookController::class, 'list'])->name('karina_books.list');

Route::post('/books/{id}/reviews', [KarinaReviewController::class, 'store'])->middleware('auth')->name('reviews.store');

Route::resource('/admin/tags', \App\Http\Controllers\KarinaBookTagController::class)->names([
    'index' => 'admin.karina_tags.index',
    'create' => 'admin.karina_tags.create',
    'store' => 'admin.karina_tags.store',
    'edit' => 'admin.karina_tags.edit',
    'update' => 'admin.karina_tags.update',
    'destroy' => 'admin.karina_tags.destroy',
]);

// Auth routes dari Laravel Breeze
require __DIR__ . '/auth.php';
