<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function() {
    Route::controller(ToDoController::class)->group(function () {
        Route::get('/home', 'index');
        Route::get('/home/create', 'create');
        Route::get('/home/{todo}/edit', 'edit')->can('edit_todo', 'todo');
        Route::post('/home', 'store');
        Route::patch('/home/{todo}', 'update');
        Route::patch('/home/{todo}/complete', 'complete');
        Route::patch('/home/{todo}/unfinish', 'unfinish');
        Route::delete('/home/{todo}', 'destroy');
    });
});
