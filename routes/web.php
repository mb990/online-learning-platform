<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/educators/{id}/view', 'AdminsController@showEducator');
Route::get('/admin/educators/{id}/edit', 'AdminsController@editEducator')->name('editEducator');
Route::put('admin/educators/{id}/submit', 'AdminsController@updateEducator')->name('updateEducator');
Route::delete('admin/educators/{id}/delete', 'AdminsController@destroyEducator')->name('deleteEducator');

Route::get('/admin/students', 'AdminsController@showStudents');
Route::get('admin/students/{id}/view', 'AdminsController@showStudent');
Route::get('/admin/students/{id}/edit', 'AdminsController@editStudent')->name('editStudent');
Route::put('admin/students/{id}/submit', 'AdminsController@updateStudent')->name('updateStudent');
Route::delete('admin/students/{id}/delete', 'AdminsController@destroyStudent')->name('deleteStudent');
