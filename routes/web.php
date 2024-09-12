<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view("auth.login");
});
Route::post('/login', function () {
    dd('Login Post');
});

Route::get('/register', function() {
    return view("auth.register");
});
Route::post('/register', function () {
    dd('Register Post');
});

Route::get('/home', function() {
    return view('home.index');
});
Route::delete('/home', function() {
    dd("delete to do");
});

Route::get('/home/create', function() {
    return view('home.create');
});
Route::post('/home', function() {
    dd("Submit new to do post");
});

Route::get('/home/edit', function () {
    return view('home.edit');
});
Route::patch('/home', function() {
    dd('Update to do');
});
