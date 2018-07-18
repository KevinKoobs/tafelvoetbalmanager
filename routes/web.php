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

Route::get('/', 'PagesController@index');
Route::get('/standings', 'PagesController@standings');

Route::resource('players', 'PlayersController');
Route::resource('results', 'ResultsController');
Route::resource('classifications', 'ClassificationsController');