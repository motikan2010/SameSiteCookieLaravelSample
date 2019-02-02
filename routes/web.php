<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/anon', 'AnonymousBbsController@index')->name('anon');
Route::post('/anon/create', 'AnonymousBbsController@create');

Route::get('/auth', 'AuthBbsController@index')->name('auth');
Route::post('/auth/create', 'AuthBbsController@create');

