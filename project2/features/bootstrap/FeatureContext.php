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

    
    //          //
    // SPRINT 1 //
    //          //
    /**
     * @Given I search Halfond from cloud page
     */
    public function iSearchHalfondFromCloudPage()
    {
        /*

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
        
        // search for dropdown
        $dropdown = $page->find('css','#dropdown');
        if(null === $dropdown) {
            throw new \Exception('dropdown not found');
        }

        $dropdown->selectOption("8");


        $submitButton->submit();

        // check if in correct url
        $url = $session->getCurrentUrl();
        if($url === 'http://127.0.0.1:8000/Halfond/8') {
            echo "Test passed = Still at same page";
        }
        else {
            throw new \Exception('no at word cloud for halfond');
        }

        */
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
        /*

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

        */
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
        /*

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
        
        // search for dropdown
        $dropdown = $page->find('css','#dropdown');
        if(null === $dropdown) {
            throw new \Exception('dropdown not found');
        }

        $dropdown->selectOption("8");

        $submitButton->submit();  

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/Halfond/8' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page after searching for Halfond from home');
        }

        */
    }

    /**
     * @Given I am on the homepage and I search an empty form
     */
    public function iAmOnTheHomepageAndISearchAnEmptyForm()
    {
       /*

        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');

        // Manipulating the page
        $page = $session->getPage();   
        $url = $session->getCurrentUrl();
        echo "Test passed = Current url: " . $url;

        */
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
        /*

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
        
        // search for dropdown
        $dropdown = $page->find('css','#dropdown');
        if(null === $dropdown) {
            throw new \Exception('dropdown not found');
        }

        $dropdown->selectOption("8");

        $submitButton->submit();  

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/Halfond/8' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page after searching for Halfond in home');
        }

        */
    }

    /**
     * @Given I am on the list for focuses and Halfond
     */
    public function iAmOnTheListForFocusesAndHalfond()
    {
        /*

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

        */
    }

    /**
     * @Then the header should contain focuses
     */
    public function theHeaderShouldContainFocuses()
    {
        // STUB
    }
    

    //          //
    // SPRINT 2 //
    //          //

    /**
     * @Given I search Orso on the home page
     */
    public function iSearchOrsoOnTheHomePage()
    {
        // Then the progress bar should show effort
    }

    /**
     * @Then the progress bar should show effort
     */
    public function theProgressBarShouldShowEffort()
    {
        // STUB
    }
    
    /**
     * @Given I click on Alessandro Orso from list for focuses and Halfond
     */
    public function iClickOnAlessandroOrsoFromListForFocusesAndHalfond()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/Halfond/8/focuses');
        $page = $session->getPage(); 
        
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $row = $tableContents->find('css', sprintf('tr:contains("%s")', 'Command-Form'));
        $name = $row->find('css', sprintf('td:contains("%s")', 'William'));
        $link = $name->find('css', 'a');

        $link->click();
        /*
        $url = $session->getCurrentUrl();
        if('http://localhost:8000/Orso/5' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page for Orso');
        }
        */
    }

    /**
     * @Then I should be on the word cloud page for Alessandro Orso
     */
    public function iShouldBeOnTheWordCloudPageForAlessandroOrso()
    {
        // STUB
    }

    /**
     * @Given I click on a bibtex on the list for testers and Halfond
     */
    public function iClickOnABibtexOnTheListForTestersAndHalfond()
    {
        // Then I should access the paper's bibtex
    }

    /**
     * @Then I should access the paper's bibtex
     */
    public function iShouldAccessThePaperSBibtex()
    {
        // STUB
    }

    /**
     * @Given I am on the list for IEEE Transactions on Software Engineering
     */
    public function iAmOnTheListForIeeeTransactionsOnSoftwareEngineering()
    {
        // STUB
    }

    /**
     * @Then the page should contain:
     */
    public function thePageShouldContain(TableNode $table)
    {
        $actualValues = array();

        foreach ($table as $row) {
            $actualValues[] = $row['title'];
        }

        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/var0/var1/var2/var3/IEEE%20Transactions%20on%20Software%20Engineering');
        $page = $session->getPage(); 

        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
   
        foreach ($actualValues as $name) {
            $check = $tableContents->find('css', sprintf('tr:contains("%s")', $name));
            if (null === $check) {
                throw new \Exception('names do not match: test failed');
            }
        }
    }

    /**
     * @Given I click the first title from the list for prone and Lupu
     */
    public function iClickTheFirstTitleFromTheListForProneAndLupu()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/Lupu/8/prone');
        $page = $session->getPage(); 

        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $row = $tableContents->find('css', sprintf('tr:contains("%s")', 'On efficient'));
        $name = $row->find('css', sprintf('td:contains("%s")', 'On efficient'));
        $link = $name->find('css', 'a');

        $link->click();
    }

    /**
     * @Then there should be a PDF download link
     */
    public function thereShouldBeAPdfDownloadLink()
    {
        // STUB
    }

    /**
     * @Given I am on the list for focuses and Halfond8
     */
    public function iAmOnTheListForFocusesAndHalfond2()
    {
        // STUB
    }

    /**
     * @Then the page should contain the titles:
     */
    public function thePageShouldContainTheTitles(TableNode $table)
    {
        $actualValues = array();
        foreach ($table as $row) {
            $actualValues[] = $row['title'];
        }

        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/Halfond/8/focuses');
        $page = $session->getPage(); 

        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
   
        foreach ($actualValues as $name) {
            $check = $tableContents->find('css', sprintf('tr:contains("%s")', $name));
            if (null === $check) {
                throw new \Exception('names do not match: test failed');
            }
        }
    }

    /**
     * @Then the page should contain the conference names:
     */
    public function thePageShouldContainTheConferenceNames(TableNode $table)
    {
        $actualValues = array();
        foreach ($table as $row) {
            $actualValues[] = $row['conference'];
        }

        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/Halfond/8/focuses');
        $page = $session->getPage(); 

        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
   
        foreach ($actualValues as $name) {
            $check = $tableContents->find('css', sprintf('tr:contains("%s")', $name));
            if (null === $check) {
                throw new \Exception('names do not match: test failed');
            }
        }
    }

}