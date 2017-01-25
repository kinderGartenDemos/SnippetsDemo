<?php

// Auth
$user = App\User::find(1);
Auth::login($user);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/snippets', 'SnippetsController@index')->name('snippets-home');
Route::get('/snippets/create', 'SnippetsController@create');
Route::get('/snippets/{snippet}', 'SnippetsController@show');
Route::post('/snippets', 'SnippetsController@store');
Route::get('snippets/{snippet}/fork', 'SnippetsController@create');
Route::get('snippets/{snippet}/like', 'SnippetsController@like');
Route::get('snippets/{snippet}/dislike', 'SnippetsController@dislike');
