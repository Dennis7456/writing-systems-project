<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
// Route::post('/books', 'App\Http\Controller\BooksController@store');
Route::post('/books', [BooksController::class, 'store']);
Route::patch('/books/{book}', [BooksController::class, 'update']);