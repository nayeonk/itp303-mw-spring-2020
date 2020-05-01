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

// Route::get('/', function () {
// 	return view('search_form');
// });

// Route::get('/search-results', function () {
// 	return view('search_results');
// });

Route::get('/', 'SongController@searchForm');

Route::get('/search-results', 'SongController@search');













