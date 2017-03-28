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

    public function view2($researcher_name)
    {
        return view('cloud')->with('researcher_name', $researcher_name);
    }

    public function postResearcherNameToCloudPage()
    {
        // redirect to cloud page using form input
        return Redirect::route('cloud', ['view' => 'cloud', 'researcher_name' => Input::get('researcher_name')]);
    }

}