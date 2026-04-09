<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show');
Route::get('/authors/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');
Route::get('/publishers/create', [PublisherController::class, 'create'])->name('publishers.create');
Route::post('/publishers', [PublisherController::class, 'store'])->name('publishers.store');
Route::get('/publishers/{id}', [PublisherController::class, 'show'])->name('publishers.show');
Route::get('/publishers/{id}/edit', [PublisherController::class, 'edit'])->name('publishers.edit');
Route::put('/publishers/{id}', [PublisherController::class, 'update'])->name('publishers.update');
Route::delete('/publishers/{id}', [PublisherController::class, 'destroy'])->name('publishers.destroy');