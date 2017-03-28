<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Cloud Controller
|--------------------------------------------------------------------------
| Main controller that will process all data. All views
| will call the routers corresponding to the view they are moving onto.
| Each route will call the corresponding function in the cloud controller
*/

class CloudController extends Controller
{
    /**
	 * Create the frequency map    
	 * @return map
     */
    public function createCloudFrequencyMap()
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
}