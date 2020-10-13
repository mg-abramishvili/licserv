<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::view('/home', 'home')->middleware('auth');