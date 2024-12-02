<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('upload');
});

Route::post('/upload', [FileController::class, 'upload']);

// Route::get('/', function () {
//     return view('welcome');
// });
