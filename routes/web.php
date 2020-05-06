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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');
    Route::post('/questionnaire/create', 'QuestionnaireController@store')->name('questionnaire.create');
    Route::get('/questionnaire/show/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');
});
