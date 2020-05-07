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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function() {
        return redirect()->route('questionnaire.index');
    })->name('home');

    Route::get('/questionnaire', 'QuestionnaireController@index')->name('questionnaire.index');
    Route::get('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');
    Route::post('/questionnaire/create', 'QuestionnaireController@store')->name('questionnaire.create');
    Route::get('/questionnaire/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');

    Route::get('/questionnaire/{questionnaire}/questions/create', 'QuestionController@create')->name('questionnaire.questions.create');
    Route::post('/questionnaire/{questionnaire}/questions/create', 'QuestionController@store')->name('questionnaire.questions.create');

    Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show')->name('surveys.show');
    Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store')->name('surveys.store');
});
