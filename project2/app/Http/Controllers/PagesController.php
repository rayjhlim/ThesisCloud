<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller {

    public function startPage()
    {
        return view('welcome');
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getSearchTerm($search_term, $num_pages)  {
        $term = trim($search_term);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext=$term&hc=$num_pages";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        return view('cloud')->with('search_data', $search_data);
    }

    /*
    * function used to get author 
    * returns json data of author
    */
    public function getAuthor($author, $num_pages) {
        $author = trim($author);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&hc=$num_pages";
        $xml = simplexml_load_file($url, 'SimpleXMLElement',
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);
        $all_abstracts = "";

        for ($x = 0; $x <= 5; $x++) {
            $all_abstracts .= $search_data['document'][$x]['abstract'];
        } 

        return view('cloud')->with(['search_data'=> $all_abstracts, 'author' => $author]);
    }

    /*
    * function used to get papers from same conference
    * returns json data of other papers
    */
    public function getConferenceObject($publication_number) {
        $pub_number = trim($publication_number);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?pn=$pub_number&hc=10";
        $xml = simplexml_load_file($url, 'SimpleXMLElement',
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $conference_json = json_decode($json, TRUE);

        return view('welcome');
    }

    public function goToCloudPage($search_term)
    {
        return view('cloud')->with('search_term', $search_term);
    }

    public function postResearcherNameToCloudPage()
    {
        // redirect to cloud page using form input
        return Redirect::route('cloud', ['author' => Input::get('search_term'), 'num_pages' => 10]);
    }

}