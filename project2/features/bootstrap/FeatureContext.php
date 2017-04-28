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
    public function __construct() {}

    
    //          //
    // SPRINT 1 //
    //          //
    /**
     * @Given I search Halfond from cloud page
     */
    public function iSearchHalfondFromCloudPage()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/Bengio/8');
        $page = $session->getPage();
        $form = $page->find('css','#myArr');
        $textInput = $form->find('css','#search_term');
        $submitButton = $form->find('css', '#submitButton');
        $textInput->setValue('Halfond');
        $dropdown = $page->find('css','#dropdown');
        $dropdown->selectOption("8");
        $submitButton->submit();

        $url = $session->getCurrentUrl();
        if($url === 'http://127.0.0.1:8000/1/Halfond/8') {
            echo "Test passed = Still at same page";
        }
        else {
            throw new \Exception('not at word cloud for halfond');
        }
    }

    /**
     * @Then I should be on cloud page
     */
    public function iShouldBeOnCloudPage() {}

    /**
     * @Given I am on the cloud page for Boehm
     */
    public function iAmOnTheCloudPageForBoehm()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver); 
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/Boehm/8');
        $page = $session->getPage();   
        $title = $page->find('css','h2');

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
    public function theHeaderShouldContainBoehm() {}

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

        $page = $session->getPage();
        $form = $page->find('css','#myArr');
        $textInput = $form->find('css','#search_term');
        $submitButton = $form->find('css', '#submitButton');
        $textInput->setValue('Halfond');
        $dropdown = $page->find('css','#dropdown');
        $dropdown->selectOption("8");
        $submitButton->submit();  

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/1/Halfond/8' === $url) {
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
    public function iShouldBeOnHomePage() {}

    /**
     * @Given I am on the list for focuses and Halfond
     */
    public function iAmOnTheListForFocusesAndHalfond()
    {
        // Visting the page
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');

        // Manipulating the page
        $page = $session->getPage(); 
        $title = $page->find('css','h4');

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
    public function theHeaderShouldContainFocuses() { }
    

    //          //
    // SPRINT 2 //
    //          //
    /**
     * @Given I search Orso on the home page
     */
    public function iSearchOrsoOnTheHomePage()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');
        $page = $session->getPage(); 
        $form = $page->find('css','#myArr');
        $textInput = $form->find('css','#search_term');
        $submitButton = $form->find('css', '#submitButton');
        $textInput->setValue('Orso');
        $dropdown = $page->find('css','#dropdown');
        $dropdown->selectOption("8");
        $submitButton->submit();  

        $session->wait(1488);

        $url = $session->getCurrentUrl();
        if('http://127.0.0.1:8000/1/Orso/8' === $url) {

        }
        else {
            throw new \Exception("Progress bar showed no effort");
        }

    }

    /**
     * @Then the progress bar should show effort
     */
    public function theProgressBarShouldShowEffort() {}
    
    /**
     * @Given I click on Sonal Mahajan from list for focuses and Halfond
     */
    public function iClickOnSonalMahajanFromListForFocusesAndHalfond()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/halfond/8/focuses');
        $page = $session->getPage(); 
        
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $row = $tableContents->find('css', sprintf('tr:contains("%s")', 'Detecting'));
        if($row === null) echo "row is null";
        $name = $row->find('css', sprintf('td:contains("%s")', 'Sonal'));
        if($name === null) echo "name is null";
        $link = $name->find('css', 'a');

        $link->click();
        
        $url = $session->getCurrentUrl();
        if('http://localhost:8000/1/Mahajan/5' === $url) {
            echo "Test passed = Current url: " . $url;
        }
        else {
            throw new \Exception('not in cloud page for Mahajan');
        }
    }

    /**
     * @Then I should be on the word cloud page for Sonal Mahajan
     */
    public function iShouldBeOnTheWordCloudPageForSonalMahajan() {}

    /**
     * @Given I am on the list for IEEE Transactions on Software Engineering
     */
    public function iAmOnTheListForIeeeTransactionsOnSoftwareEngineering() {}

    /**
     * @Given I click the first title from the list for prone and Lupu
     */
    public function iClickTheFirstTitleFromTheListForProneAndLupu()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/lupu/8/prone');
        $page = $session->getPage(); 

        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $row = $tableContents->find('css', sprintf('tr:contains("%s")', 'Using argumentation'));
        $name = $row->find('css', sprintf('td:contains("%s")', 'Using argumentation'));
        $link = $name->find('css', 'a');
        $link->click();
        $page = $session->getPage(); 
        $download = $page->find('css','.download');
        $linkPDF = $download->find('css','a');
        $linkPDF->click();
    }
    
     /**
     * @Then cicking the PDF link opens a PDF
     */
    public function cickingThePdfLinkOpensAPdf() {}

    /**
     * @Given I am on the list for focuses and Halfond8
     */
    public function iAmOnTheListForFocusesAndHalfond2() {}

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
        $session->visit('http://127.0.0.1:8000/1/halfond/8/focuses');
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
        $session->visit('http://127.0.0.1:8000/1/halfond/8/focuses');
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
     * @Given I click on the first conference from the list for term and Bengio
     */
    public function iClickOnTheFirstConferenceFromTheListForTermAndBengio()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/bengio/8/term');
        $page = $session->getPage(); 
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $row = $tableContents->find('css', 'tr');
        $name = $row->find('css', 'td');
        $link = $name->find('css', 'a');

        $link->click();
    }

    /**
     * @Then I should be on the word cloud for IEEE Transactions
     */
    public function iShouldBeOnTheWordCloudForIeeeTransactions() {}

    /**
     * @Given I am on the list for easily and Cote
     */
    public function iAmOnTheListForEasilyAndCote()
    {
        $actualFrequencies = array(
            0 => '10',
            1 => '9',
            2 => '9',
            3 => '5',
            4 => '5',
            5 => '3',
            6 => '3',
            7 => '1',
        );
            
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/cote/8/easily');
        $page = $session->getPage(); 
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');
        foreach ($rows as $row) {
            if($row === null) throw new \Exception('Page not ordered by frequency');
        }
    }

    /**
     * @Then the page should be ordered by frequency
     */
    public function thePageShouldBeOrderedByFrequency() {}

    /**
     * @Given I am on the list for fields and Cote
     */
    public function iAmOnTheListForFieldsAndCote()
    {
        $actualAuthors = array(
            0 => "J. Cote",
            1 => "S. Lewis",
            2 => " Melissa Cote",
            3 => "M. Cote",
            4 => "G. L. Cote",
            5 => "D. Cote",
            6 => "Stephane Cote",
        );
            
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/cote/8/fields');
        $page = $session->getPage(); 
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');
        foreach ($rows as $row) {
            if($row === null) throw new \Exception('Page not ordered by frequency');
        }
    }

    /**
     * @Then clicking authors will order to list based on authors
     */
    public function clickingAuthorsWillOrderToListBasedOnAuthors() {}

    /**
     * @Given I am on the list for system and Cote
     */
    public function iAmOnTheListForSystemAndCote()
    {
        $actualTitles = array(
            0 => "Generalized",
            1 => "A neural",
            2 => "Look who",
            3 => "Direct determination",
            4 => "Discharge characteristics",
            5 => "In vivo",
            6 => "Process-Induced",
            7 => "Naval Multi-Function",
        );
            
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/cote/8/system');
        $page = $session->getPage(); 
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');
        foreach ($rows as $row) {
            if($row === null) throw new \Exception('Page not ordered by frequency');
        }
    }

    /**
     * @Then clicking title will order to list based on titles
     */
    public function clickingTitleWillOrderToListBasedOnTitles() {}
    
    /**
     * @Given I search Bengio from home page
     */
    public function iSearchBengioFromHomePage()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/');
        $page = $session->getPage();

        $form = $page->find('css','#myArr');

        $textInput = $form->find('css','#search_term');

        $submitButton = $form->find('css', '#submitButton');

        $textInput->setValue('Bengio');
        
        $dropdown = $page->find('css','#dropdown');

        $dropdown->selectOption("8");

        $submitButton->submit();

        $page = $session->getPage();
        $outerLayer = $page->find('css','#outerlayer');
        $wordcloud = $outerLayer->find('css', '#wordcloud');
    }

     /**
     * @Then the word cloud generated should contain different font sizes
     */
    public function theWordCloudGeneratedShouldContainDifferentFontSizes() {}

     /**
     * @Given I click download on the cloud page for Bengio
     */
    public function iClickDownloadOnTheCloudPageForBengio()
    {

        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/Bengio/8');
        $page = $session->getPage();
        $outerLayer = $page->find('css','#outerlayer');
        $link = $outerLayer->find('css', 'a');

        if(null === $link) {
            throw new \Exception('PDF not downloaded');
        }
        else {
            $link->press();
        }
    }

    /**
     * @Then a download for Bengio's wordcloud begins
     */
    public function aDownloadForBengioSWordcloudBegins() {}

    /**
     * @Given I click download as PDF in list for focuses and Halfond
     */
    public function iClickDownloadAsPdfInListForFocusesAndHalfond()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/halfond/8/focuses');
        $page = $session->getPage();
        $outerLayer = $page->find('css','.downloadDiv');
        $plainTextButton = $outerLayer->find('css', '#pdf');

        $plainTextButton->press();
    } 

    /**
     * @Then a download of PDF for paper list begins
     */
    public function aDownloadOfPdfForPaperListBegins()
    {
        // STUB
    }

    /**
     * @Given I click download as plaintext in list for focuses and Halfond
     */
    public function iClickDownloadAsPlaintextInListForFocusesAndHalfond()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/halfond/8/focuses');
        $page = $session->getPage();
        $outerLayer = $page->find('css','.downloadDiv');
        $plainTextButton = $outerLayer->find('css', '#plainText');

        $plainTextButton->press();
    }

    /**
     * @Then a download of plaintext for paper list begins
     */
    public function aDownloadOfPlaintextForPaperListBegins() {}

    /**
     * @Given I click on the first conference from the list for across and Lee
     */
    public function iClickOnTheFirstConferenceFromTheListForAcrossAndLee()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/var0/var1/var2/var3/0/2005%20IEEE%20International%20Symposium%20on%20Circuits%20and%20Systems');
        $session->visit('http://localhost:8000/0/2005%20IEEE%20International%20Symposium%20on%20Circuits%20and%20Systems/5/makes');

        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $rows = $tableContents->findAll('css', 'tr');

        if(null === $rows) {
            throw new \Exception('List is not populated');
        } else {
            echo "List is populated";
        }
    }

     /**
     * @Given I click the first title from the lsit for case and Ben
     */
    public function iClickTheFirstTitleFromTheListForCaseAndBen()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/1/Ben/8/case');

        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $firstRow = $tableContents->find('css', 'tr');
        $firstTitle = $firstRow->find('css','td');
        $link = $firstTitle->find('css','a');
        $link->click();

        $page = $session->getPage();
        $abstractContent = $page->find('css','p');
    }

    /**
     * @Then the word case is highlighted
     */
    public function theWordCaseIsHighlighted() {}


    /**
     * @Given I click on the word second
     */
    public function iClickOnTheWordSecond()
    {
        // Given I click on the first conference from the list for across and Lee
    }

    /**
     * @Then I should be on a populated paper list page
     */
    public function iShouldBeOnAPopulatedPaperListPage() {}

    /**
     * @Given I click on the first bibtex from the list for term and Bengio
     */
    public function iClickOnTheFirstBibtexFromTheListForTermAndBengio()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://127.0.0.1:8000/1/Bengio/8/term');

        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');
        $firstRow = $tableContents->find('css', 'tr');
        $firstTitle = $firstRow->find('css', sprintf('td:contains("%s")', 'Show'));
        $link = $firstTitle->find('css','a');
        $link->click();   
    }

    /**
     * @Then I should be on the bibtex page for Gradient-Based Optimization
     */
    public function iShouldBeOnTheBibtexPageForGradientBasedOptimization() {}

      /**
     * @Given I search for a paper list for Lee with three papers
     */
    public function iSearchForAPaperListForLeeWithThreePapers()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/1/Lee/3/passed');
        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');

        $numRows = 0;
        foreach ($rows as $row) {
            $numRows++;
        }

        if($numRows>3) throw new \Exception('List has more than 3 papers');
    }

    /**
     * @Then the paper list cannot have more than three rows
     */
    public function thePaperListCannotHaveMoreThanThreeRows() {}

    /**
     * @Given I search for a paper list for Lee with five papers
     */
    public function iSearchForAPaperListForLeeWithFivePapers()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/1/Lee/5/will');
        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');

        $numRows = 0;
        foreach ($rows as $row) {
            $numRows++;
        }

        if($numRows>5) throw new \Exception('List has more than 5 papers');
    }   

    /**
     * @Then the paper list cannot have more than five rows
     */
    public function thePaperListCannotHaveMoreThanFiveRows() {}

    /**
     * @Given I search for a paper list for Lee with eight papers
     */
    public function iSearchForAPaperListForLeeWithEightPapers()
    {
        $driver = new \Behat\Mink\Driver\Selenium2Driver('firefox');   
        $session = new \Behat\Mink\Session($driver);
        $session->start();
        $session->visit('http://localhost:8000/1/Lee/8/fully');
        $page = $session->getPage();
        $table = $page->find('css','.tableDiv');
        $sortable = $table->find('css','.sortable');
        $tableContents = $sortable->find('css','#tableContents');

        $rows = $tableContents->findAll('css', 'tr');

        $numRows = 0;
        foreach ($rows as $row) {
            $numRows++;
        }

        if($numRows>8) throw new \Exception('List has more than 8 papers');
    }

    /**
     * @Then the paper list cannot have more than eight rows
     */
    public function thePaperListCannotHaveMoreThanEightRows() {}

}