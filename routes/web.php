<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'index'])->name('todoview.index');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todoview.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todoview.store');