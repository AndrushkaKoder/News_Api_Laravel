<?php

use App\Http\Controllers\Api\NewsController;
use Illuminate\Support\Facades\Route;

Route::resource('news', NewsController::class);
Route::post('news/{news}/comments', [NewsController::class, 'comments']);
