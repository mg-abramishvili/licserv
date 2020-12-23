<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KeyController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('keys', 'App\Http\Controllers\KeyController@index');
Route::group(['prefix' => 'key'], function () {
    Route::post('add', 'App\Http\Controllers\KeyController@add');
    Route::get('edit/{id}', 'App\Http\Controllers\KeyController@edit');
    Route::post('update/{id}', 'App\Http\Controllers\KeyController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\KeyController@delete');

    Route::get('view/{key}', 'App\Http\Controllers\KeyController@view');
    Route::post('activate/{key}', 'App\Http\Controllers\KeyController@activate');
});