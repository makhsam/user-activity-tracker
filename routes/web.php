<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/users', 'UserController@index');
Route::get('/users/{user}/sites', 'SiteController@index');
// Route::get('/users/{user}/sites/create', 'SiteController@create');
Route::post('/users/{user}/sites', 'SiteController@store');
Route::get('/users/{user}/sites/{site}/clients', 'ClientController@index');


Route::get('/mail', function () {
    $user = \App\User::find(1);
    Mail::to($user)->send(new \App\Mail\NewClient());
    // return view('welcome');
    echo 'Message sent!';
});