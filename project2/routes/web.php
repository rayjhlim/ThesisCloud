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

Route::get('/', function() {
	return view('home');
});

// Route::get('/', 'ViewController@getStartView');

Route::get('/cloud', function() {
	return view('cloud');
});

Route::get('/list', function() {
	return view('list');
});

Route::get('/abstract', function() {
	return view('abstract');
});

Route::post('form', array('as' => 'form', 'uses'=>'PagesController@postResearcherNameToCloudPage'));

// Route::get('cloud/{search_term}/{num_pages}', array('as' => 'cloud', 'uses' => 'PagesController@getSearchTerm'));

Route::get('cloud/{author}/{num_pages}', array('as' => 'cloud', 'uses' => 'PagesController@getAuthor'));