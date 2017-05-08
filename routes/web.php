<?php


Auth::routes();

Route::get('/dashboard', "DashboardController@index");

Route::get('/', function() {
    return "Home";
});
