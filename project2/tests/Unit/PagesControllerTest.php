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

    public function testGetAuthor()
    {
        $controller = new PagesController();
        $func = "getAuthor";
        $num_pages = "1";
        $view = "cloud";
        $author_name = "Lupu";
        $response = $controller->$func($author_name, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse); // method only found in cloud
    }

    public function testGetInfoFromWord()
    {
        $controller = new PagesController();
        $func = "getInfoFromWord";
        $author_name = "Lupu";
        $word = "raw";
        $num_papers = "10";
        $response = $controller->$func($author_name, $num_papers, $word);
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
        $response = $controller->$func($author, $num_papers, $word, $title, $conference);
        $string_response = strval($response);
        $this->assertContains('IEEE Transactions', $string_response);
    }

    public function testGetInfoFromTitle()
    {
        $controller = new PagesController();
        $func = "getInfoFromTitle";
        $author = "Man";
        $num_papers = "3";
        $word = "dipoles";
        $title = "A Multibeam End-Fire Magnetoelectric Dipole Antenna Array for Millimeter-Wave Applications";
        $response = $controller->$func($author, $num_papers, $word, $title);
        $string_response = strval($response);
        $this->assertContains('A Multibeam', $string_response);
    }

    public function testSliderValue()
    {
        $controller = new PagesController();
        $func = "getAuthor";
        $author = "Lupu";
        $num_pages = "2";
        $response = $controller->$func($author, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse);
    }

    public function testGetConferenceListView()
    {
        $controller = new PagesController();
        $func = "getConferenceObject";
        $conference_name = "4222553";
        $response = $controller->$func($conference_name);
        $stringResponse = strval($response);
        $this->assertContains('Welcome', $stringResponse); // test that tag data has been filled in
    }
}
