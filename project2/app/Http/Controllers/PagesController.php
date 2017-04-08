<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller {

    public function startPage()
    {
        return view('home');
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getSearchTerm($search_term, $numPapers)  {
        $term = trim($search_term);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext=$term&hc=$numPapers";
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
    public function getAuthor($author, $numPapers) {
        $author = trim($author);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&hc=$numPapers";
        $xml = simplexml_load_file($url, 'SimpleXMLElement',
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);
        $all_abstracts = "";

        // $jsonResponse = shell_exec('python ~/hw-lupu/csci310-project2/project2/scrape.py ' . $author);
        // $map = json_decode($jsonResponse, true);
        // print_r($map);

        for ($x = 0; $x < $numPapers; $x++) {
            $all_abstracts .= $search_data['document'][$x]['abstract'];
            // $all_abstracts .= $map[$x]['abstract'];
        } 

        return view('cloud')->with(['search_data'=> $all_abstracts, 'author' => $author, 
            'numPapers' => $numPapers]);
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getInfoFromWord($author, $numPapers, $word)  {
        $author = trim($author);
        $word = trim($word);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&querytext=$word&hc=$numPapers";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        return view('list')->with(['search_data'=> $search_data, 'author' => $author, 'word' => $word, 'numPapers' => $numPapers]);
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getInfoFromTitle($author, $numPapers, $word, $title)  {
        $author = trim($author);
        $word = trim($word);
        $title = trim($title);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&querytext=$word&hc=$numPapers&ti=$title";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        return view('abstract')->with(['search_data'=> $search_data, 'author' => $author, 'word' => $word, 'title' => $title]);
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

        return view('home');
    }

    public function goToCloudPage($search_term, $numPapers)
    {
        return view('cloud')->with(['search_term' => $search_term, 'numPapers' => $numPapers]);
    }

    public function postResearcherNameToCloudPage()
    {
        // redirect to cloud page using form input
        return Redirect::route('cloud', ['author' => Input::get('search_term'), 'numPapers' => Input::get('numPapers')]);
    }

}