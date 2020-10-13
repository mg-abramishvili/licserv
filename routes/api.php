<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clients', [App\Http\Controllers\Api\ClientController::class, 'index']);
Route::get('keys', [App\Http\Controllers\Api\KeyController::class, 'index']);