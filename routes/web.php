<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/admin', 'PagesController@admin');
//Route::get('/courses', 'AdminsController@show_courses');
Route::get('/admin/educators', 'AdminsController@showEducators');
Route::put('/admin/educators/edit/{$id}', 'AdminsController@editEducators');
