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

// this is for testing
Route::get('/example', 'PagesController@example');

Route::get('/song', function () {
    return view('song');
});

Route::get('/lyrics', function () {
    return view('lyrics');
});

Route::get('/cloud', function () {
    return view('cloud');
});

Route::get('/', array('as' => 'welcome', 'uses' => 'PagesController@startPage'));

Route::get('form', array('as' => 'form', 'uses'=>'PagesController@postArtistNameToCloudPage'));

//Route::get('/{view}/{artist_name}/{word}', array('as' => 'cloud', 'uses' => 'PagesController@getCloudFrequencyMap'));

Route::get('lyrics/{song}/{word}', array('as' => 'lyrics', 'uses' => 'PagesController@getSongLyrics'));

// Route::get('form', array('as' => 'form', 'uses'=>'PagesController@postWordToCloudPage'));

Route::get('/{view}/{artist_name}/{word}', array('as' => 'song', 'uses' => 'PagesController@getCloudFrequencyMap'));

Route::get('/{view}/{artist_name}/{word}', array('as' => 'lyrics', 'uses' => 'PagesController@getCloudFrequencyMap'));