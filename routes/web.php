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
// Route::resource('groups','App\Http\Controllers\GroupsController');
Route::post('/groups','App\Http\Controllers\GroupsController@store')->middleware('auth');
Route::get('/groups','App\Http\Controllers\GroupsController@index')->middleware('auth');
Route::get('/groups/create','App\Http\Controllers\GroupsController@create')->middleware('auth');


Route::get('/groups/{group}','App\Http\Controllers\GroupsController@show')->middleware('auth');
Route::patch('/groups/{group}','App\Http\Controllers\GroupsController@update')->middleware('auth');
Route::delete('/groups/{group}','App\Http\Controllers\GroupsController@destroy')->middleware('auth');
Route::get('/groups/{group}/edit','App\Http\Controllers\GroupsController@edit')->middleware('auth');

Route::post('/groups/{group}/topics','App\Http\Controllers\TopicsController@store')->middleware('auth');
Route::get('/groups/{group}/topics/create','App\Http\Controllers\TopicsController@create')->middleware('auth');
Route::get('/groups/{group}/topics','App\Http\Controllers\TopicsController@index')->middleware('auth');

Route::patch('/groups/{group}/topics/{topic}','App\Http\Controllers\TopicsController@update')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
