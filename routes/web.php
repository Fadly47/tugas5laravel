<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/authors', [AuthorController::class, 'view']);

Route::get('/', function () {
    return view('welcome');
});