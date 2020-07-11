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

Route::get('/', function () {
    return view('layouts.welcome');
});

Route::get('blank', function () {
    return view('pages.blank');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/question','QuestionController@index');

Route::get('/question/create','QuestionController@create');

Route::POST('/question', 'QuestionController@store');

Route::get('/question/{id}' ,'QuestionController@show');
