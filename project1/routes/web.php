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

Route::get('/cloud', function () {
    return view('cloud');
});

Route::get('/song', function () {
    return view('song');
});

Route::get('/lyrics', function () {
    return view('lyrics');
});

Route::get('/', array('as' => 'welcome', 'uses' => 'PagesController@startPage'));

Route::post('form', array('as' => 'form', 'uses'=>'PagesController@postView1'));

Route::get('cloud/{artist_name}', array('as' => 'cloud', 'uses' => 'PagesController@view2'));


Route::get('/cloudSongFrequency', 'PagesController@createSongFrequency');

Route::get('/lyricsArray', 
	'PagesController@createSongFrequency');