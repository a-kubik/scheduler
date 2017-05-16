<?php


Auth::routes();

Route::get('/dashboard', "DashboardController@index");

Route::resource('notes', "NotesController");

Route::get('/', function() {
    return "Home";
});
