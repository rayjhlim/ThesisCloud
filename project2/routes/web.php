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

Route::post('goToCloud', array('as' => 'goToCloud', 'uses'=>'PagesController@postResearcherNameToCloudPage'));

Route::post('refreshCloud', array('as' => 'refreshCloud', 'uses'=>'PagesController@postResearcherNameToCloudPage'));

// Route::get('cloud/{search_term}/{num_pages}', array('as' => 'cloud', 'uses' => 'PagesController@getSearchTerm'));

Route::get('{isAuthor}/{author}/{numPapers}', array('as' => 'cloud', 'uses' => 'PagesController@getAuthor'));

Route::get('/{isAuthor}/{author}/{numPapers}/{word}', array('as' => 'list', 'uses' => 'PagesController@getInfoFromWord'));

Route::get('{var0}/{author}/{numPapers}/{word}/{title}', array('as' => 'list', 'uses' => 'PagesController@getInfoFromTitle'));

Route::get('/{var0}/{var1}/{var2}/{var3}/{isAuthor}/{confName}', array('as' => 'list', 'uses' => 'PagesController@getInfoFromConf'));

Route::get('/{var0}/{var1}/{var2}/{var3}/{var4}/{var5}/{title}', array('as' => 'conflist', 'uses' => 'PagesController@getInfoFromOnlyTitle'));

// Route::get('/{var}', 'PagesController@diverge')->where('var', 'title|confName');