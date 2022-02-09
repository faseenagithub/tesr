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

    Route::get('/', function () { return view('home'); });

    //routes for student CRUD
    Route::get('students-list', 'StudentController@index');
    Route::post('add-user', 'StudentController@store');
    Route::get('edit-student/{id}', 'StudentController@edit');
    Route::post('update-student/{id}', 'StudentController@update');
    Route::get('delete-student/{id}', 'StudentController@destroy');

    //routes for Marks CRUD
    Route::get('mark-list','MarkController@index');
    Route::post('add-mark', 'MarkController@store');
    Route::get('edit-mark/{id}', 'MarkController@edit');
    Route::post('update-mark/{id}', 'MarkController@update');
    Route::get('delete-mark/{id}', 'MarkController@destroy');



