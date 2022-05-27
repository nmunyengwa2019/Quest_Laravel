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
//.................................................................................
Route::post('/imports','App\Http\Controllers\ImportsController@store')->middleware('auth');
//..............................................GROUPS........................................................

Route::post('/groups','App\Http\Controllers\GroupsController@store')->middleware('auth');
Route::get('/groups','App\Http\Controllers\GroupsController@index')->middleware('auth');
Route::get('/groups/create','App\Http\Controllers\GroupsController@create')->middleware('auth');


Route::get('/groups/{group}','App\Http\Controllers\GroupsController@show')->middleware('auth');
Route::patch('/groups/{group}','App\Http\Controllers\GroupsController@update')->middleware('auth');
Route::delete('/groups/{group}','App\Http\Controllers\GroupsController@destroy')->middleware('auth');
Route::get('/groups/{group}/edit','App\Http\Controllers\GroupsController@edit')->middleware('auth');
//..........................................................................................................
//....................TOPICS.............................................Topics.............................

Route::post('/groups/{group}/topics','App\Http\Controllers\TopicsController@store')->middleware('auth');
Route::get('/groups/{group}/topics/create','App\Http\Controllers\TopicsController@create')->middleware('auth');
Route::get('/groups/{group}/topics','App\Http\Controllers\TopicsController@index')->middleware('auth');

Route::patch('/groups/{group}/topics/{topic}','App\Http\Controllers\TopicsController@update')->middleware('auth');
Route::get('/groups/{group}/topics/{topic}/edit','App\Http\Controllers\TopicsController@edit')->middleware('auth');
Route::delete('/groups/{group}/topics/{topic}','App\Http\Controllers\TopicsController@destroy')->middleware('auth');
//............................................................................................................
//..........................QUESTIONS.......................................................Questions.........

Route::post('/groups/{group}/topics/{topic}/questions','App\Http\Controllers\TopicQuestionsController@store')->middleware('auth');
Route::get('/groups/{group}/topics/{topic}/questions','App\Http\Controllers\TopicQuestionsController@index')->middleware('auth');

Route::get('/groups/{group}/topics/{topic}/questions/create','App\Http\Controllers\TopicQuestionsController@create')->middleware('auth');

Route::delete('/groups/{group}/topics/{topic}/questions/{question}','App\Http\Controllers\TopicQuestionsController@destroy')->middleware('auth');

Route::patch('/groups/{group}/topics/{topic}/questions/{question}','App\Http\Controllers\TopicQuestionsController@update')->middleware('auth');

Route::get('/groups/{group}/topics/{topic}/questions/{question}','App\Http\Controllers\TopicQuestionsController@edit')->middleware('auth');

//...........................................................................................................
//...............................ANSWERS............................................Answers..................
Route::post('/groups/{group}/topics/{topic}/questions/{question}/answers','App\Http\Controllers\QuestionAnswersController@store')->middleware('auth');

Route::get('/groups/{group}/topics/{topic}/questions/{question}/answers','App\Http\Controllers\QuestionAnswersController@index')->middleware('auth');

Route::get('/groups/{group}/topics/{topic}/questions/{question}/answers/create','App\Http\Controllers\QuestionAnswersController@create')->middleware('auth');

Route::patch('/groups/{group}/topics/{topic}/questions/{question}/answers/{answer}','App\Http\Controllers\QuestionAnswersController@update')->middleware('auth');

Route::get('/groups/{group}/topics/{topic}/questions/{question}/answers/{answer}/update','App\Http\Controllers\QuestionAnswersController@edit')->middleware('auth');

Route::delete('/groups/{group}/topics/{topic}/questions/{question}/answers/{answer}','App\Http\Controllers\QuestionAnswersController@destroy')->middleware('auth');
//............................................................................................................

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
