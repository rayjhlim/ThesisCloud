<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PagesController extends Controller {
    $musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
    $musixmatch = new Musixmatch($musixmatch_api_key);

    public function createCloudFrequencyMap($artist)
    {

        //TODO

        return view('cloud');
    }

    /**
     * Create the frequency of word in all of artist's songs
     * Used when clicking a word in the word cloud
     *
     */
    public function createSongFrequency()
    {
        $songFrequency = new SplObjectStorage();

        //TODO

        return $songFrequency;
    }

    /**
     * Create an array with all the words of a song
     * Will need to pass in the selected word to this function
     * The first index will be the selected word
     */
    public function createLyricsArray($mSelectedWord)
    {
        //TODO

        $array = array(
            0 => $mSelectedWord
            );
        return $array;
    }

    public function startPage() {
        return view('welcome');
    }

    public function getArtistId($artist_name) {
        $result = $musixmatch->method('artist.search', array(
            'q_artist'  => $artist_name
        ));
        var_dump($artist_name);
        $artist_id = 
            $result['message']['body']['artist_list'][0]['artist']['artist_name'];
        return view('welcome')->with('artist_id', $artist_id);
    }

    public function getAlbumIdArray($artist_id) {
        $result = $musixmatch->method('artist.albums.get', array(
            'artist_id'  => $artist_id
        ));
        var_dump($artist_id);
        $album_id_array = 
            $result['message']['body']['artist_list'];
        return view('welcome')->with('album_id_array', $album_id_array);
    }    

    public function getTracksIdArray($album_id) {
        $result = $musixmatch->method('album.tracks.get', array(
            'album_id'  => $album_id
        ));
        var_dump($album_id);
        $track_id_array = 
            $result['message']['body']['track_list'];
        return view('welcome')->with('track_id_array', $track_id_array);
    }    

	public function getAbout() {
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
}