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
    public function getAuthor($isAuthor, $author, $numPapers) {

        $filler_words = [
            "IT" => 1,
            "SHE" => 1,
            "HE"=> 1,
            "THEY"=> 1,
            "ABOUT" => 1,
            "\0" => 1,
            "BELOW" => 1,
            "EXCEPTING" => 1,
            "OFF" => 1,
            "TOWARD" => 1,
            "ABOVE" => 1,
            "BENEATH" => 1,
            "FOR" => 1,   
            "ON" => 1,
            "UNDER" => 1,
            "ACROSS" => 1,
            "BESIDES" => 1,
            "FROM" => 1,
            "ONTO" => 1,    
            "UNDERNEATH" => 1,
            "AFTER" => 1,
            "BETWEEN" => 1,    
            "IN" => 1,
            "OUT" => 1,
            "UNTIL" => 1,
            "AGAINST" => 1,    
            "BEYOND" => 1,    
            "OUTSIDE" => 1,
            "UP" => 1,
            "ALONG" => 1,
            "BUT" => 1,
            "INSIDE" => 1,
            "OVER" => 1,
            "UPON" => 1,
            "AMONG" => 1,
            "BY" => 1,    
            "PAST" => 1,
            "AROUND" => 1,
            "CONCERNING" => 1,
            "INSTEAD" => 1,
            "REGARDING" => 1,
            "WITH" => 1,
            "AT" => 1,
            "DESPITE" => 1,
            "INTO" => 1,
            "SINCE" => 1,
            "WITHIN" => 1,
            "BECAUSE" => 1,
            "DOWN" => 1,
            "LIKE" => 1,
            "THROUGH" => 1,
            "WITHOUT" => 1,
            "BEFORE" => 1,
            "DURING" => 1,
            "NEAR" => 1,
            "THROUGHOUT" => 1,
            "BEHIND" => 1,
            "EXCEPT" => 1,
            "OF" => 1,
            "TO" => 1,
            "OR" => 1,
            "IF" =>1,
            'THE' => 1,
            'A' => 1,
            'AS' => 1,
            '...' => 1,
            'WE' => 1,
            'AND' => 1,
            'HAS' => 1,
            'IS' => 1,
            'THIS' => 1,
            'THAT' => 1,
            'AN' => 1,
            'CAN' => 1,
            'WAS' => 1,
            'WHICH' => 1,
            'BE' => 1
        ];



        //shell_exec('python ~/csci310-project2/project2/bibtex.py ' . '337334');

        $author = trim($author);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&hc=$numPapers";
        $xml = simplexml_load_file($url, 'SimpleXMLElement',
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);
        $all_abstracts = "";


        // //Script to run the python code for ACM
        // //Only works if the project folder is in ~/
        // $jsonResponse = shell_exec('python ~/csci310-project2/project2/scrape.py ' . $author);
        // $map = json_decode($jsonResponse, true);
        // // print_r($map);


        //         $acm_word_map = array();

        // foreach ($map as $paper) {
        //     $author = strtoupper($paper['author']);
        //     $source = $paper['source'];
        //     $abstract = $paper['abstract'];
        //     $publicationDate = $paper['publicationDate'];
        //     $title = strtoupper($paper['title']);

        //     $token_array = preg_split('/\s+/', $paper['abstract']);

        //     foreach ($token_array as $token) {
        //         $token = trim($token);
        //         $token = strtoupper($token);

        //         if(!array_key_exists($token, $filler_words)) {
        //             //print($token . '#');
        //             if(array_key_exists($token, $acm_word_map)) {
        //                 $acm_word_map[$token]['count'] += 1;
        //                 if(array_key_exists($author, $acm_word_map[$token])) {
        //                     if(array_key_exists($title, $acm_word_map[$token][$author])) {
        //                         $acm_word_map[$token][$author][$title]['count'] += 1;
        //                     } else {
        //                         $acm_word_map[$token][$author][$title] = array();
        //                         $acm_word_map[$token][$author][$title]['title'] = $title;
        //                         $acm_word_map[$token][$author][$title]['count'] = 1;
        //                         $acm_word_map[$token][$author][$title]['abstract'] = $abstract;
        //                         $acm_word_map[$token][$author][$title]['source'] = $source;
        //                         $acm_word_map[$token][$author][$title]['publicationDate'] = $publicationDate;                        
        //                     }
        //                 } else {
        //                     $acm_word_map[$token][$author] = array();
        //                     $acm_word_map[$token][$author]['author'] = $author;
        //                     $acm_word_map[$token][$author][$title] = array();
        //                     $acm_word_map[$token][$author][$title]['title'] = $title;
        //                     $acm_word_map[$token][$author][$title]['count'] = 1;
        //                     $acm_word_map[$token][$author][$title]['abstract'] = $abstract;
        //                     $acm_word_map[$token][$author][$title]['source'] = $source;
        //                     $acm_word_map[$token][$author][$title]['publicationDate'] = $publicationDate;                        
        //                 }
        //             } else {
        //                 $acm_word_map[$token]['count'] = 1;
        //                 $acm_word_map[$token]['word'] = $token;
        //                 $acm_word_map[$token][$author] = array();
        //                 $acm_word_map[$token][$author]['author'] = $author;
        //                 $acm_word_map[$token][$author][$title] = array();
        //                 $acm_word_map[$token][$author][$title]['title'] = $title;
        //                 $acm_word_map[$token][$author][$title]['count'] = 1;
        //                 $acm_word_map[$token][$author][$title]['abstract'] = $abstract;
        //                 $acm_word_map[$token][$author][$title]['source'] = $source;
        //                 $acm_word_map[$token][$author][$title]['publicationDate'] = $publicationDate;                        
        //             }
        //         }
        //     }
        //     // foreach ($acm_word_map as $word) {
        //     //     print_r($word);
        //     // }
        // }


        if (count($search_data['document']) > 10) {
            $all_abstracts .= $search_data['document']['abstract'];
        }
        else {
            foreach($search_data['document'] as $document) {
                $all_abstracts .= $document['abstract'];
            }
        }
        // echo $all_abstracts;
        return view('cloud')->with(['search_data'=> $all_abstracts, 'author' => $author, 'numPapers' => $numPapers, 'isAuthor' => 1]);
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getInfoFromWord($isAuthor, $author, $numPapers, $word)  {
        $author = trim($author);
        $word = trim($word);
        $isAuthor = trim($isAuthor);

        // it is a conference
        if ($isAuthor == 0) {
            $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?jn=$author&querytext=$word&hc=$numPapers";
        }
        // it is an author
        else {
            $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&querytext=$word&hc=$numPapers";
        }
        
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        return view('list')->with(['search_data'=> $search_data, 'author' => $author, 'isAuthor' => $isAuthor, 'word' => $word, 'numPapers' => $numPapers]);
    }

    // author}/{numPapers}/{word}/{title}/{confName
    public function getInfoFromConf($var0, $var1, $var2, $var3, $isAuthor, $confName) {
        $confName = trim($confName);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?jn=$confName";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        $all_abstracts = "";

        // $jsonResponse = shell_exec('python ~/hw-lupu/csci310-project2/project2/scrape.py ' . $author);
        // $map = json_decode($jsonResponse, true);
        // print_r(count($search_data['document']));

        // echo "you are in getInfoFromConf";
        // print_r($search_data);

        // if (count($search_data['document']) > 10) {
        //     $all_abstracts .= $search_data['document']['abstract'];
        // }
        foreach($search_data['document'] as $document) {
            $all_abstracts .= $document['abstract'];
        }

        return view('cloud')->with(['author' => $confName, 'search_data' => $all_abstracts, 'numPapers' => 5, 'isAuthor' => $isAuthor]);
    }

    // /{author}/{numPapers}/{word}/{title}/{confName}/{title}
    public function getInfoFromOnlyTitle($var0, $var1, $var2, $var3, $var4, $word, $title) {
        $title = trim($title);
        // $word = trim($word);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?ti=$title";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        // echo "get info only from title";

        return view('abstract')->with(['search_data'=> $search_data, 'word' => $word]);
    }

    /*
    * function used for Welcome page
    * returns json data of search result
    */
    public function getInfoFromTitle($var0, $author, $numPapers, $word, $title)  {
        $author = trim($author);
        $word = trim($word);
        $title = trim($title);
        $url = "http://ieeexplore.ieee.org/gateway/ipsSearch.jsp?au=$author&querytext=$word&hc=$numPapers&ti=$title";
        $xml = simplexml_load_file($url, 'SimpleXMLElement', 
            LIBXML_NOCDATA);
        $json = json_encode($xml);
        $search_data = json_decode($json, TRUE);

        return view('abstract')->with('search_data', $search_data);
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

    /*
    * function used to get IEEE bibtex
    */

    public function getBibTex($article_number) {
        shell_exec('python ~/csci310-project2/project2/bibtex.py ' . $article_number);
    }

    public function goToCloudPage($search_term, $numPapers)
    {
        return view('cloud')->with(['search_term' => $search_term, 'numPapers' => $numPapers, 'isAuthor' => 1]);
    }

    public function postResearcherNameToCloudPage()
    {
        // redirect to cloud page using form input
        return Redirect::route('cloud', ['author' => Input::get('search_term'), 'numPapers' => Input::get('numPapers'), 'isAuthor' => 1]);
    }

}