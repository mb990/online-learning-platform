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


Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', 'PageController@admin');
    Route::get('/admin/admins/{slug}', 'AdminUserController@showAdmin');

    Route::get('/admin/educators', 'AdminEducatorController@showAll');
    Route::get('/admin/educators/{slug}', 'AdminEducatorController@showSingle');
    Route::put('/admin/educators/{slug}/submit', 'AdminEducatorController@update');
    Route::put('/admin/educators/{slug}/deactivate', 'AdminEducatorController@deactivate');
    Route::put('admin/educators/{slug}/activate', 'AdminEducatorController@activate');
    Route::delete('admin/educators/{slug}/delete', 'AdminEducatorController@destroy');

    Route::get('/admin/students', 'AdminStudentController@showAll');
    Route::get('/admin/students/{id}', 'AdminStudentController@showSingle');
    Route::get('/admin/students/{id}/edit', 'AdminStudentController@edit');
    Route::put('/admin/students/{id}/submit', 'AdminStudentController@update');
    Route::put('/admin/students/{id}/deactivate', 'AdminStudentController@deactivate');
    Route::put('/admin/students/{id}/activate', 'AdminStudentController@activate');
    Route::delete('/admin/students/{id}/delete', 'AdminStudentController@destroy');

    Route::get('/admin/users', 'AdminUserController@showAll');
    Route::get('/admin/users/{slug}', 'AdminUserController@showUser');
    Route::get('/admin/new', 'AdminUserController@createAdmin');
    Route::post('/admin/new/submit', 'AdminUserController@storeAdmin');

    Route::get('/admin/courses', 'AdminCourseController@index');
    Route::put('/admin/courses/{slug}/deactivate', 'AdminCourseController@deactivate');
    Route::put('/admin/courses/{slug}/activate', 'AdminCourseController@activate');
    Route::delete('/admin/courses/{slug}/delete', 'AdminCourseController@destroy');
});

Route::middleware(['role:educator'])->group(function () {
    Route::get('/courses/{slug}/edit', 'CourseController@edit');
    Route::put('/courses/{slug}/submit', 'CourseController@update');
    Route::get('/courses/new', 'CourseController@create');
    Route::post('/courses/new/submit', 'CourseController@store');
    Route::delete('/courses/{slug}/delete', 'CourseController@destroy');
    Route::get('/profiles/{slug}/edit', 'EducatorProfileController@edit');
    Route::put('/profiles/{slug}/submit', 'EducatorProfileController@update');
    Route::get('/profiles/{slug}/fill', 'EducatorProfileController@fill');
    Route::put('/profiles/{slug}/fill/submit', 'EducatorProfileController@store');
});

Route::middleware(['role:student'])->group(function () {
    Route::post('/courses/{slug}/follow', 'StudentController@followCourse');
    Route::delete('/courses/{slug}/unfollow', 'StudentController@unfollowCourse');
});

Route::get('/', 'PageController@index');

Route::get('/courses', 'CourseController@showAllWithCategories');
Route::get('/courses/{slug}', 'CourseController@showSingle');
Route::get('/category/{slug}', 'CourseController@showByCategory');

Route::get('/educators', 'PageController@educators');
Route::get('/educators/{slug}', 'PageController@showEducator');

Auth::routes();

Route::get('register/educator', 'Auth\RegisterController@createEducator');
Route::post('register/educator/submit', 'Auth\RegisterController@storeEducator');

Route::get('register/student', 'Auth\RegisterController@createStudent');
Route::post('register/student/submit', 'Auth\RegisterController@storeStudent');

Route::get('/profiles/{slug}', 'EducatorProfileController@show');

Route::get('/my-courses', 'PageController@myCourses');
