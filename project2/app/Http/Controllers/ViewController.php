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
     * returns search of author/key word
     * @return json
     */
    public function getStartView($search_term)
    {
        $url = 'http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext={trim($search_term)}';
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        print_r($array);
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