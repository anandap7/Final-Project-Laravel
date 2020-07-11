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

use App\Http\Controllers\QuestionController;

Route::redirect('/', 'question', 301);

Route::get('blank', function () {
    return view('pages.blank');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/question/my', 'QuestionController@mine');
Route::resource('/question','QuestionController');

Route::get('/answer/my', 'AnswerController@mine');
Route::resource('/answer','AnswerController');
