<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesControllerTest extends TestCase
{
    
    public function testGetStartView() 
    {
        $controller = new PagesController();
        $func = "startPage";
        $response = $controller->$func();
        $stringResponse = strval($response);
        $this->assertContains('Welcome', $stringResponse); // string only found in start
    }

    // test get search term

    public function testGetAuthor()
    {
        $controller = new PagesController();
        $func = "getAuthor";
        $is_author = "1";
        $num_pages = "1";
        $author_name = "Bengio";
        $response = $controller->$func($is_author, $author_name, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Bengio', $stringResponse); // method only found in cloud
    }

    public function testGetInfoFromWord()
    {
        $controller = new PagesController();
        $func = "getInfoFromWord";
        $is_author = "1";
        $author_name = "Lupu";
        $word = "raw";
        $num_papers = "10";
        $response = $controller->$func($is_author, $author_name, $num_papers, $word);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse); // test that tag data has been filled in
    }
        
    public function testGetInfoFromConf()
    {
        $controller = new PagesController();
        $func = "getInfoFromConf";
        $author = "Man";
        $num_papers = "3";
        $word = "dipoles";
        $title = "A Multibeam End-Fire Magnetoelectric Dipole Antenna Array for Millimeter-Wave Applications";
        $conference = "IEEE Transactions on Antennas and Propagation";
        $is_author = "1";
        $response = $controller->$func($author, $num_papers, $word, $title, $is_author, $conference);
        $string_response = strval($response);
        $this->assertContains('IEEE Transactions', $string_response);
    }

    // get info from only title
    public function testGetInfoFromOnlyTitle()
    {
        $controller = new PagesController();
        $func = "getInfoFromOnlyTitle";
        $temp_var = "1";
        $word = "dipoles";
        $title = "A Multibeam End-Fire Magnetoelectric Dipole Antenna Array for Millimeter-Wave Applications";
        $response = $controller->$func($temp_var, $temp_var, $temp_var, $temp_var, $temp_var, $word, $title);
        $string_response = strval($response);
        $this->assertContains('A Multibeam', $string_response);
    }

    // public function testGetInfoFromTitle()
    // {
    //     $controller = new PagesController();
    //     $func = "getInfoFromTitle";
    //     $var0 = "1";
    //     $author = "Man";
    //     $num_papers = "3";
    //     $word = "dipoles";
    //     $title = "A Multibeam End-Fire Magnetoelectric Dipole Antenna Array for Millimeter-Wave Applications";
    //     $response = $controller->$func($var0, $author, $num_papers, $word, $title);
    //     $string_response = strval($response);
    //     $this->assertContains('A Multibeam', $string_response);
    // }

    public function testSliderValue()
    {
        $controller = new PagesController();
        $func = "getAuthor";
        $is_author = "1";
        $author = "Lupu";
        $num_pages = "2";
        $response = $controller->$func($is_author, $author, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse);
    }

    // public function testGetConferenceListView()
    // {
    //     $controller = new PagesController();
    //     $func = "getConferenceObject";
    //     $conference_name = "4222553";
    //     $response = $controller->$func($conference_name);
    //     $stringResponse = strval($response);
    //     $this->assertContains('Welcome', $stringResponse); // test that tag data has been filled in
    // }

    // get bib tex - BLOCKED

    // go to cloud page
    // public function testGoToCloudPage()
    // {
    //     $controller = new PagesController();
    //     $func = "goToCloudPage";
    //     $search_term = "Halfond";
    //     $num_papers = "5";
    //     $response = $controller->$func($search_term, $num_papers);
    //     $stringResponse = strval($response);
    //     $this->assertContains('Halfond', $stringResponse);
    // }

    // post research name to cloud page


}
