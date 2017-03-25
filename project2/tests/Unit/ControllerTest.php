<?php

namespace app\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerTest extends TestCase
{
    
    public function testGetStartView() 
    {
        $controller = new ViewController();
        $func = "getStartView";
        $response = $controller->$func();
        $stringResponse = strval($response);
        $this->assertContains('Welcome', $stringResponse); // string only found in start
    }

    public function testGetCloudView()
    {
        $controller = new ViewController();
        $func = "getCloudView";
        $view = "cloud";
        $author_name = "Halfond";
        $response = $controller->$func($view, $author_name);
        $stringResponse = strval($response);
        $this->assertContains('downloadCloudImage(', $stringResponse); // method only found in cloud
    }

    public function testGetWordListView()
    {
        $controller = new ViewController();
        $func = "getWordListView";
        $author_name = "Halfond";
        $word = "software";
        $num_papers = "5";
        $response = $controller->$func($author_name, $word, $num_papers);
        $stringResponse = strval($response);
        $this->assertNotContains('<h2>{{$data', $stringResponse); // test that tag data has been filled in
    }
    
    public function testGetAbstractView()
    {
        $controller = new ViewController();
        $func = "getAbstractView";
        $response = $controller->$func();
        $stringResponse = strval($response);
        $this->assertContains('highlightText()', $stringResponse); // method only found in song
    }

    public function testGetConferenceListView()
    {
        $controller = new ViewController();
        $func = "getConferenceListView";
        $conference_name = "2007 15th IEEE-NPSS Real-Time Conference";
        $word = "software";
        $num_papers = "5";
        $response = $controller->$func($conference_name, $word, $num_papers);
        $stringResponse = strval($response);
        $this->assertNotContains('<h2>{{$data', $stringResponse); // test that tag data has been filled in
    }
}
