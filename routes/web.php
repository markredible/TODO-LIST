<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('todo.index');
});

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
Route::delete('/todo/{todo}/destroy', [TodoController::class, 'destroy'])->name('todo.destroy');