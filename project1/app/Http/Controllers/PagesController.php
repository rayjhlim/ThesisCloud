<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller {

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

    public function getTrackBody($track_id) {
        $musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
        $musixmatch = new Musixmatch($musixmatch_api_key);
        $result = $musixmatch->method('track.lyrics.get', array(
            'track_id'  => $track_id
        ));

        $track_body = $result['message']['body']['lyrics']['lyrics_body'];
            
            //echo $track_body for test purposes
            echo('###ECHO OF $track_body:');
            echo('track_body:' . $track_body);
            echo('###END OF ECHO###');

            //To access $track_body in blade files
            //{{ $track_body }}
        return view('cloud')->with('track_body', $track_body);
    }


    public function getArtistId($artist_name) {
        $musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
        $musixmatch = new Musixmatch($musixmatch_api_key);

        $result = $musixmatch->method('artist.search', array(
            'q_artist'  => $artist_name
        ));
        $artist_id = 
            $result['message']['body']['artist_list'][0]['artist']['artist_id'];

            //echo $artist_id for test purposes
            echo('###ECHO OF $artist_id:');
            echo($artist_id);
            echo('###END OF ECHO###');

            //To access $artist_id in the blade files:
            // {{ $artist_id }}

        return view('cloud')->with('artist_id', $artist_id);
    }


    public function getAlbumIdArray($artist_id) {
        $musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
        $musixmatch = new Musixmatch($musixmatch_api_key);

        $result = $musixmatch->method('artist.albums.get', array(
            'artist_id'  => $artist_id
        ));
        $album_id_array = $result['message']['body']['album_list'];

        //echo $album_id_array for test purposes
        echo('###ECHO OF $ALBUM_ID_ARRAY###');
        foreach($album_id_array as $album_list) {
            echo($album_list['album']['album_id'] . ',');
        }
        echo('###END OF ECHO###');

        //To access the elements of $album_id_array in the blade files:
        // @foreach($album_id_array as $album_list) {
        //     {{ $album_list['album']['album_id'] }}
        // }
        // @endforeach

        return view('welcome')->with('album_id_array', $album_id_array);
    }    

    public function getTracksIdArray($album_id) {
        $musixmatch_api_key = "a97ea319e25d4f8ba70a6119ce2532d2";
        $musixmatch = new Musixmatch($musixmatch_api_key);

        $result = $musixmatch->method('album.tracks.get', array(
            'album_id'  => $album_id
        ));
        $track_id_array = 
            $result['message']['body']['track_list'];
            
            //echo $track_id_array for test purposes
            echo('###ECHO OF $tracks_id_array###');
            foreach($track_id_array as $track_list) {
                echo($track_list['track']['track_id'] . ",");
            }
            echo('###END OF ECHO###');

            //To access the elements of $album_id_array in the blade files:
            // @foreach($track_id_array as $track) {
            //     {{ $track['track']['track_id'] }}
            // }
            // @endforeach
        return view('welcome')->with('track_id_array', $track_id_array);
    }

    public function startPage()
    {
        return view('welcome');
    }

    public function postView1()
    {
        return Redirect::route('cloud', ['artist_name' => Input::get('artist_name')]);
    }

    public function view2($artist_name)
    {
        // return View::make('view2')->with('name',$name);
        echo "hello";
        return view('cloud')->with('artist_name', $artist_name);
    }
}