<?php

// Auth
$user = App\User::find(2);
Auth::login($user);

Route::get('/', function () {
    return view('welcome');
});
// snippets crud
Route::get('/snippets', 'SnippetsController@index')->name('snippets-home');
Route::get('/snippets/create', 'SnippetsController@create');
Route::get('/snippets/{snippet}', 'SnippetsController@show');
Route::post('/snippets', 'SnippetsController@store');
// fork
Route::get('snippets/{snippet}/fork', 'SnippetsController@create');
// like && dislike
Route::get('snippets/{snippet}/like', 'SnippetsController@like');
Route::get('snippets/{snippet}/dislike', 'SnippetsController@dislike');
// language filter
Route::get('snippets/language/{language}', 'SnippetsController@index');
