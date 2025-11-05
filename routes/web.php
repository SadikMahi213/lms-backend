<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login'); // your login Blade file
})->name('login');

Route::post('/login', function () {
    $email = request('email');
    $password = request('password');
    $role = request('role');

    // handle login logic here manually
    return redirect('/dashboard');
});