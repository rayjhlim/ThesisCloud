<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;

class ViewController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | View Controller
    |--------------------------------------------------------------------------
    |
    | Main controller that will process all data. All views
    | will call the routers corresponding to the view they are moving onto.
    | Each route will call the corresponding function in the cloud controller
    */

    /**
	 * Create the frequency map    
	 * Retrieve artist's id, then albums, then songs, then lyrics
	 * Process lyrics and store words into frequency map
	 * Use for generating word cloud (welcome and cloud page)
	 *
	 * @return map
     */
    public function getStartView()
    {

    	//TODO

    	return view('home');
    }

    /**
     * Get JSON object containing the inputted search
     *
     */
    public function createSongFrequency($searchInput)
    {
    	$URL_template = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?";
        

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