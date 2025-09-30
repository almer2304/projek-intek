<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'showlogin'])->name('auth.showlogin');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.showRegister');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [BookController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', function () {
    return view('user.dashboard'); // bikin view khusus user
})->name('user.dashboard');

// Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/sync', [BookController::class, 'syncBooksFromApi'])->name('books.sync');


Route::get('/books/all', [BookController::class, 'showAll'])->name('books.all');

Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

Route::get('/books/results', [BookController::class, 'searchResults'])->name('books.searchResults');

Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Form tambah buku
Route::get('/books', [BookController::class, 'create'])->name('books.create');

// Simpan buku baru
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Tampilkan detail buku tertentu
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Form edit buku
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Update data buku
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Hapus buku
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


