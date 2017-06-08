<?php


Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', "DashboardController@index");
    Route::resource('notes', "NotesController");
});


Route::get('/', "HomeController@index");
