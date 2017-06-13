<?php


Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', "DashboardController@index");
    Route::get('/settings', "SettingsController@index");
    Route::resource('notes', "NotesController");
    Route::resource('tasks', "TasksController");
});


Route::get('/', "HomeController@index");
