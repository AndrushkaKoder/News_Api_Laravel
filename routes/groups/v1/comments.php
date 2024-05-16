<?php

use App\Http\Controllers\Api\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/news/{news}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/news/{news}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::patch('/news/{news}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/news/{news}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');

