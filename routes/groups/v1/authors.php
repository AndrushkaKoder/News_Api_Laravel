<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;

Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');
Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.delete');
