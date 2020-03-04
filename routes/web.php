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

//Route::get('/', 'PagesController@index');
Route::get('/', 'CoursesController@index');
Route::get('/admin', 'PagesController@admin')->name('admin');
//Route::get('/courses', 'AdminsController@show_courses');
Route::get('/admin/educators', 'AdminsController@showEducators')->name('adminShowEducators');
Route::get('/admin/educators/{id}/view', 'AdminsController@showEducator')->name('adminShowEducator');
Route::get('/admin/educators/{id}/edit', 'AdminsController@editEducator')->name('adminEditEducator');
Route::put('/admin/educators/{id}/submit', 'AdminsController@updateEducator');
Route::delete('/admin/educators/{id}/delete', 'AdminsController@destroyEducator');

Route::get('/admin/students', 'AdminsController@showStudents')->name('adminShowStudents');
Route::get('/admin/students/{id}/view', 'AdminsController@showStudent')->name('adminShowStudent');
Route::get('/admin/students/{id}/edit', 'AdminsController@editStudent')->name('adminEditStudent');
Route::put('/admin/students/{id}/submit', 'AdminsController@updateStudent');
Route::delete('/admin/students/{id}/delete', 'AdminsController@destroyStudent');

Route::get('/admin/users', 'AdminsController@showAll')->name('adminShowAll');
Route::get('/admin/users/{id}/view', 'AdminsController@showUser')->name('adminShowUser');

Route::get('/courses', 'CoursesController@showAllWithCategories');
Route::get('/courses/{id}/view', 'CoursesController@showSingle');
Route::get('/category/{id}/view', 'CoursesController@showByCategory');
Route::get('/courses/{id}/edit', 'CoursesController@edit');
Route::put('/courses/{id}/submit', 'CoursesController@update');
Route::get('/courses/new', 'CoursesController@create');
Route::post('/courses/new/submit', 'CoursesController@store');

Route::get('/educators', 'PagesController@educators');

Auth::routes();

Route::get('register/educator', 'Auth\RegisterController@createEducator')->name('educatorRegistration');
Route::post('register/educator/submit', 'Auth\RegisterController@storeEducator');

Route::get('register/student', 'Auth\RegisterController@createStudent')->name('studentRegistration');
Route::post('register/student/submit', 'Auth\RegisterController@storeStudent');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}/edit', 'UsersController@editProfile');
Route::put('/profile/{id}/submit', 'UsersController@updateProfile');

Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/educators/{id}/view', 'PagesController@showEducator');
