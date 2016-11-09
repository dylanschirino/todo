<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','TasklistsController@index');
Route::get('tasklists/{tasklist}/confirm','TasklistsController@confirm');
Route::get('tasks/{task}/confirm','TasksController@confirm');
Route::resource('tasks', 'TasksController');
Route::resource('tasklists', 'TasklistsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
