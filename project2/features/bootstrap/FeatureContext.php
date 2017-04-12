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




    //          //
    // SPRINT 2 //
    //          //
     /**
     * @Given I search Lupu from home page for one paper
     */
    public function iSearchLupuFromHomePageForOnePaper()
    {
        // Then I should be on cloud page for Lupu
    }

    /**
     * @Then I should be on cloud page for Lupu
     */
    public function iShouldBeOnCloudPageForLupu()
    {
        // STUB
    }

    /**
     * @Given I search Lupu from home page for three papers
     */
    public function iSearchLupuFromHomePageForThreePapers()
    {
        // Then I should be on cloud page for Lupu
    }

    /**
     * @Given I search Lupu from home page for ten papers
     */
    public function iSearchLupuFromHomePageForTenPapers()
    {
        // Then I should be on cloud page for Lupu
    }

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
     * @Given I click on Command-Form Coverage
     */
    public function iClickOnCommandFormCoverage()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be on the abstract page for that paper
     */
    public function iShouldBeOnTheAbstractPageForThatPaper()
    {
        // STUB
    }

    /**
     * @Then the word focuses is highlighted in yellow
     */
    public function theWordFocusesIsHighlightedInYellow()
    {
        // STUB
    }

    /**
     * @Then there should be download link for that paper's PDF
     */
    public function thereShouldBeDownloadLinkForThatPaperSPdf()
    {
        // STUB
    }

    /**
     * @Given I click on Alessandro Orso from list for focuses and Halfond
     */
    public function iClickOnAlessandroOrsoFromListForFocusesAndHalfond()
    {
        // Then I should be on the word cloud page for Alessandro Orso
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
        // Given I am on the list for IEEE Transactions on Software Engineering
    }

    /**
     * @Given I am on the list for areas and Orso
     */
    public function iAmOnTheListForAreasAndOrso()
    {
        // Then the header should contain focuses
    }

     /**
     * @Given I click the first title from the list for focuses and Halfond
     */
    public function iClickTheFirstTitleFromTheListForFocusesAndHalfond()
    {
        // iShouldBeOnTheAbstractPageForThatPaper
    }

    /**
     * @Given I click the first title from the list for prone and Lupu
     */
    public function iClickTheFirstTitleFromTheListForProneAndLupu()
    {
        // Then there should be a PDF download link
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
        // Given I am on the list for focuses and Halfond8
    }

    /**
     * @Then the page should contain the conference names:
     */
    public function thePageShouldContainTheConferenceNames(TableNode $table)
    {
        // Given I am on the list for focuses and Halfond8
    }

}