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

// Route::get('/cloud', function () {
//     return view('cloud');
// });

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

Route::get('cloud/{artist_name}', array('as' => 'cloud', 'uses' => 'PagesController@getCloudFrequencyMap'));

Route::get('lyrics/{song}', array('as' => 'lyrics', 'uses' => 'PagesController@getSongLyrics'));

// Route::get('form', array('as' => 'form', 'uses'=>'PagesController@postWordToCloudPage'));

Route::get('song/{artist_name}/{word}', array('as' => 'song', 'uses' => 'PagesController@getTracksNameArrayFromWord'));


// Route::get('/cloudSongFrequency', 'PagesController@createSongFrequency');

// Route::get('/lyricsArray', 
// 	'PagesController@createSongFrequency');