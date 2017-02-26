<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PagesController extends Controller {
	public function getIndex() {
		return view('pages/welcome');
	}

	public function getAbout() {
	   	$musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
	    $musixmatch = new Musixmatch($musixmatch_api_key);
        $result = $musixmatch->method('album.tracks.get', array(
            'album_id'  => '13750844'
        ));
        $track_list = $result['message']['body']['track_list'];

        //album.tracks.get
        // foreach($result['message']['body']['track_list'] as $track_list) {
        // 	var_dump($track_list['track']['track_name']);
        // }

        //artist.albums.get
        // foreach($result['message']['body']['album_list'] as $album_list) {
        // 	var_dump($album_list['album']['album_id']);
        // }

        //artist.search
        //var_dump($result['message']['body']['album_list'][0]['album']['artist_id']);


		return view('about')->with('track_list', $track_list);
	}

	public function getData() {
		$number = '12345';
		return $number;
	}
}