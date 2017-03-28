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

    public function getSearchTerm($search_term)  {
        $term = trim($search_term);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?querytext=$term";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        return view('cloud')->with('json_object', $array);

    }

    public function goToCloudPage($researcher_name)
    {
        return view('cloud')->with('researcher_name', 
            $researcher_name);
    }

    public function postResearcherNameToCloudPage()
    {
        // redirect to cloud page using form input
        return Redirect::route('cloud', ['view' => 'cloud', 'researcher_name' => Input::get('researcher_name')]);
    }

}