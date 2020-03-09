<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'PageController@index');
Route::get('/admin', 'PageController@admin');
Route::get('/admin/educators', 'AdminEducatorController@showAll');
Route::get('/admin/educators/{id}', 'AdminEducatorController@showSingle');
Route::get('/admin/educators/{id}/edit', 'AdminEducatorController@edit');
Route::put('/admin/educators/{id}/submit', 'AdminEducatorController@update');
Route::delete('/admin/educators/{id}/delete', 'AdminEducatorController@destroy');

Route::get('/admin/students', 'AdminStudentController@showAll');
Route::get('/admin/students/{id}', 'AdminStudentController@showSingle');
Route::get('/admin/students/{id}/edit', 'AdminStudentController@edit');
Route::put('/admin/students/{id}/submit', 'AdminStudentController@update');
Route::delete('/admin/students/{id}/delete', 'AdminStudentController@destroy');

Route::get('/admin/users', 'AdminUserController@showAll');
Route::get('/admin/users/{id}', 'AdminUserController@showUser');

Route::get('/courses', 'CourseController@showAllWithCategories');
Route::get('/courses/{id}', 'CourseController@showSingle');
Route::get('/category/{name}', 'CourseController@showByCategory');
Route::get('/courses/{id}/edit', 'CourseController@edit');
Route::put('/courses/{id}/submit', 'CourseController@update');
Route::get('/courses/new', 'EducatorController@create');
Route::post('/courses/new/submit', 'EducatorController@store');

Route::get('/educators', 'PageController@educators');
Route::get('/educators/{id}', 'PageController@showEducator');

Auth::routes();

Route::get('register/educator', 'Auth\RegisterController@createEducator');
Route::post('register/educator/submit', 'Auth\RegisterController@storeEducator');

Route::get('register/student', 'Auth\RegisterController@createStudent');
Route::post('register/student/submit', 'Auth\RegisterController@storeStudent');

Route::get('/profiles/{id}', 'ProfileController@show');
Route::get('/profiles/{id}/edit', 'ProfileController@edit')->middleware('role:educator');
Route::put('/profiles/{id}/submit', 'ProfileController@update');
Route::get('/profiles/{id}/fill', 'ProfileController@fill')->middleware('auth:educator');
Route::put('/profiles/{id}/fill/submit', 'ProfileController@store');

Route::get('/dashboard', 'HomeController@index');
