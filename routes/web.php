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
Route::get('/', 'PagesController@home');
Route::get('/whats-on', 'EventbriteController@whatson');

Route::get('apply', 'ApplyController@index')->name('apply.index');
Route::post('apply', 'ApplyController@store')->name('apply.store');
Route::get('apply/back', 'ApplyController@back')->name('apply.back');
Route::get('apply/skip', 'ApplyController@skip')->name('apply.skip');
Route::get('apply/clear', 'ApplyController@clear')->name('apply.clear');

Route::post('eventbrite/webhook', 'EventbriteController@webhook');

Route::get('/forecast', 'ForecastController@forecast');
Route::get('/apartments/{apartment}', 'PagesController@apartment'); 
Route::get('/{page}', 'PagesController@page');
Route::get('/about/{page}', 'PagesController@page');
Route::get('/living-here/{page}', 'PagesController@page');