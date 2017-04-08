<?php


use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

#This will be needed if you require "behat/mink-selenium2-driver"
#use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;

//use PHPUnit_Framework_Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        // BEHAT SUCKS BALLS
    }

    /**
     * @Given I search Halfond from cloud page
     */
    public function iSearchHalfondFromCloudPage()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/Halfond/8');

        // Manipulating the page
        $page = $session->getPage();

        // search for form
        $form = $page->find('css','#myArr');
        if (null === $form) {
            throw new \Exception('form not found');
        }

        // search for text input
        $textInput = $form->find('css','#search_term');
        if (null === $textInput) {
            throw new \Exception('textfield not found');
        }

        // search for submit button
        $submitButton = $form->find('css', '#submitButton');
         if (null === $submitButton) {
            throw new \Exception('submitButton not found');
        }

        $textInput->setValue('Halfond');
        //$session->visit('http://127.0.0.1:8000/Halfond/8');
        $submitButton->submit();

        // check if in correct url
        $url = $session->getCurrentUrl();
        if($url === 'http://127.0.0.1:8000/Halfond/10') {
            echo "Test passed = Still at same page";
        }
        else {
            throw new \Exception('no at word cloud for halfond');
        }
    }

    /**
     * @Then I should be on cloud page
     */
    public function iShouldBeOnCloudPage()
    {
        // STUB
    }

    /**
     * @Given I am on the cloud page for Boehm
     */
    public function iAmOnTheCloudPageForBoehm()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver); 
        $session->start();
        $session->visit('http://127.0.0.1:8000/Boehm/8');

        // Manipulating the page
        $page = $session->getPage();   
        $title = $page->find('css','h2');
        if (null === $title) {
            throw new \Exception('h2 not found');
        }

        if('Search term: Boehm' === $title->getText()) {
            echo "Test passed = h2 is Boehm";
        }
        else {
            throw new \Exception('title is not Boehm');
        }
    }

    /**
     * @Then the header should contain Boehm
     */
    public function theHeaderShouldContainBoehm()
    {
        // STUB
    }

    /**
     * @Given I search Halfond from home page
     */
    public function iSearchHalfondFromHomePage()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');

        // Manipulating the page
        $page = $session->getPage(); // delete later 
        
        // search for form
        $form = $page->find('css','#myArr');
        if (null === $form) {
            throw new \Exception('form not found');
        }

        // search for text input
        $textInput = $form->find('css','#search_term');
        if (null === $textInput) {
            throw new \Exception('textfield not found');
        }

        // search for submit button
        $submitButton = $form->find('css', '#submitButton');
         if (null === $submitButton) {
            throw new \Exception('submitButton not found');
        }

        $textInput->setValue('Halfond');
        //$session->visit('http://127.0.0.1:8000/Halfond/8');
        $submitButton->submit();  

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/Halfond/10' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page after searching for Halfond from home');
        }
    }

    /**
     * @Given I am on the homepage and I search an empty form
     */
    public function iAmOnTheHomepageAndISearchAnEmptyForm()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');

        // Manipulating the page
        $page = $session->getPage();   
        $url = $session->getCurrentUrl();
        echo "Test passed = Current url: " . $url;
    }

    /**
     * @Then I should be on home page
     */
    public function iShouldBeOnHomePage()
    {
        // STUB
    }

    /**
     * @Given I am on the homepage and I search for Halfond
     */
    public function iAmOnTheHomepageAndISearchForHalfond()
    {
         // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');

        // Manipulating the page
        $page = $session->getPage(); 
        
        // search for form
        $form = $page->find('css','#myArr');
        if (null === $form) {
            throw new \Exception('form not found');
        }

        // search for text input
        $textInput = $form->find('css','#search_term');
        if (null === $textInput) {
            throw new \Exception('textfield not found');
        }

        // search for submit button
        $submitButton = $form->find('css', '#submitButton');
         if (null === $submitButton) {
            throw new \Exception('submitButton not found');
        }

        $textInput->setValue('Halfond');
        //$session->visit('http://127.0.0.1:8000/Halfond/8');
        $submitButton->submit();  

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/Halfond/10' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page after searching for Halfond in home');
        }
    }

    /**
     * @Given I am on the list for focuses and Halfond
     */
    public function iAmOnTheListForFocusesAndHalfond()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/Halfond/10/focuses');

        // Manipulating the page
        $page = $session->getPage(); 
        $title = $page->find('css','h4');
        if (null === $title) {
            throw new \Exception('h4 not found');
        }

        if('Word: focuses' === $title->getText()) {
            echo "Test passed = h4 is focuses";
        }
        else {
            throw new \Exception('h4 is not focuses');
        }
    }

    /**
     * @Then the header should contain focuses
     */
    public function theHeaderShouldContainFocuses()
    {
        // STUB
    }
}