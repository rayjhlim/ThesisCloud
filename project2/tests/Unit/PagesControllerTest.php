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
        $num_pages = "10";
        $view = "cloud";
        $author_name = "Lupu";
        $response = $controller->$func($author_name, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse); // method only found in cloud
    }

    public function testGetWordInfo()
    {
        $controller = new PagesController();
        $func = "getInfoFromWord";
        $author_name = "Lupu";
        $word = "raw";
        $num_papers = "10";
        $response = $controller->$func($author_name, $num_papers, $word);
        $this->assertContains('Lupu', $stringResponse); // test that tag data has been filled in
    }
    
    public function testGetAbstractFromTitle()
    {
        $controller = new PagesController();
        $func = "getAbstractFromTitle";
        $title = "Mobile PAES: Demonstrating Authority Devolution for Policy Evaluation in Crisis Management Scenarios";
        $response = $controller->$func();
        $stringResponse = strval($response);
        $this->assertContains('Mobile PAES', $stringResponse); // method only found in song
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

    public function testSliderValue()
    {
        $controller = new PagesController();
        $func = "getAuthor";
        $author = "Lupu";
        $num_pages = "2";
        $response = $controller->func($author, $num_pages);
        $stringResponse = strval($response);
        $this->assertContains('Lupu', $stringResponse);
    }
}
