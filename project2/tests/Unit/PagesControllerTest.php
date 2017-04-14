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

    // public function testGetSearchTerm()
    // {
    //     $controller = new PagesController();
    //     $func = "getSearchTerm";
    //     $search_term = "java";
    //     $num_papers = "2";
    //     $response = $controller->$func($search_term, $num_papers);
    //     $string_response = strval($response);
    //     $this->assertContains('Man', $string_response);
    // }

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
        
    // public function testGetInfoFromConf()
    // {
    //     $controller = new PagesController();
    //     $func = "getInfoFromConf";
    //     $author = "Lupu";
    //     $num_papers = "10";
    //     $word = "raw";

    // }

    // public function testGetInfoFromTitle()
    // {
    //     $controller = new PagesController();
    //     $func = "getInfoFromTitle";
    //     $author = "Lupu";
    //     $num_papers = "10";
    //     $word = "raw";
    //     $title = "Mobile PAES: Demonstrating Authority Devolution for Policy Evaluation in Crisis Management Scenarios";
    //     $response = $controller->$func($author, $num_papers, $word, $title);
    //     $string_response = strval($response);
    //     $this->assertContains('Mobile PAES', $string_response);
    // }

    public function testGetConferenceListView()
    {
        $controller = new PagesController();
        $func = "getConferenceObject";
        $conference_name = "4222553";
        $response = $controller->$func($conference_name);
        $stringResponse = strval($response);
        $this->assertContains('Welcome', $stringResponse); // test that tag data has been filled in
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
}
