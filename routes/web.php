<?php


Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', "DashboardController@index");
    Route::get('/settings', "SettingsController@index");
    Route::put('/settings', "SettingsController@saveSettings");
    Route::resource('notes', "NotesController");
    Route::resource('tasks', "TasksController");
});

Route::middleware('admin')->group(function() {
    Route::get('/admin', "AdminController@index");
});


Route::get('/', "HomeController@index");
Route::get('locale/{locale}', "HomeController@setLocale");
