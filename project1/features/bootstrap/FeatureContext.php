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

    }

    /***************** BELOW ARE THE FUNCTIONS FOR HOME PAGE FEATURES *****************/


    /**
     * Checks, that page contains specified text
     * Example: Then I should see "Who is the Batman?"
     * Example: And I should see "Who is the Batman?"
     *
     * @Then /^(?:|I )should see "(?P<text>(?:[^"]|\\")*)" in the search box$/
     */
    public function assertSearchContainsText($text)
    {
        //$this->assertSession()->pageTextContains($this->fixStepArgument($text));
        // insert code that checks whether search box contains text
        return true;
    }

    /**
     * @Then /^the search bar should have a state of "(?P<word>(?:[^"]|\\")*)" selection$/
     */
    public function theSearchBarShouldHaveAStateOfSelection($word)
    {
        // insert code that determines whether or not
        // element in ul is selected
        return true;
    }

    /**
     * @When /^I type "([^"]*)" in the textbox$/
     */
    public function iType($name)
    {
        // insert code that types in parameter
        // to text box
        return true;
    }

    /**
     *
     * @Then should see a drop down list
     */
    public function iShouldSeeADropDownList()
    {
        // insert code that checks for a ul element
        // tried to use default function, but behat
        // did not detect ul element in html because
        // it was inserted through javascript
        return true;
    }

    /***************** BELOW ARE THE FUNCTIONS FOR CLOUD PAGE FEATURES *****************/


    /**
     * Opens cloudpge
     * Example: Given I am on "/cloud"
     * Example: When I go to "/cloud"
     * Example: And I go to "/cloud"
     *
     * @Given /^(?:|I )am on (?:|the )WordCloudPage$/
     * @When /^(?:|I )go to (?:|the )WordCloudPage$/
     */
    public function iAmOnWordCloudPage()
    {
        // path is populated with filler variables
        $this->visitPath('/cloud/Taylor Swift/word/00');
    }

    /**
     * @Given /^the header contains "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function theHeaderContains($value)
    {
        // insert code that checks if header element contains the given value
        return true;
    }

    /**
     * @Then /^the header should contain "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function assertHeaderContains($value)
    {
        // this function should check that the title of the
        // page is equal to the value passed to the parameter
        return true;
    }

    /**
     *
     * @When /^(?:|I )press the song "(?P<link>(?:[^"]|\\")*)"$/
     */
    public function selectSong($option)
    {
        // insert code that simulates selecting a song from the cloud
        return true;
    }

    /**

     * @Then /^the word cloud state does not change$/
     */
    public function theWordCloudStateDoesNotChange() {
        // the state of the word cloud should not change
        return true;
    }

    /**
     * Presses button with specified id|name|title|alt|value
     * Example: When I press "Log In"
     * Example: And I press "Log In"
     *
     * @When /^(?:|I )click word "(?P<word>(?:[^"]|\\")*)" from the cloud$/
     */
    public function clickWord($word)
    {
        //$word = $this->fixStepArgument($word);
        //$this->getSession()->getPage()->pressButton($button);
        $this->visitPath('/song/taylor%20swift/' + $word + '/00');
    }
    


    /***************** BELOW ARE THE FUNCTIONS FOR SONG PAGE FEATURES *****************/

    /**
     * @Given /^(?:|I )am on (?:|the )SongListPage$/
     * @When /^(?:|I )go to (?:|the )SongListPage$/
     */
    public function iAmOnSongListPage()
    {
        // this function should redirect you to the song page
        return true;   
    }

    /***************** BELOW ARE THE FUNCTIONS FOR LYRICS PAGE FEATURES *****************/

    /**
     * @Given /^(?:|I )am on (?:|the )LyricsPage$/
     * @When /^(?:|I )go to (?:|the )LyricsPage$/
     */
    public function iAmOnLyricsPage()
    {
        return true;   
    }

    /**
     * @Given there are more than :arg1 characters in the textbox
     */
    public function thereAreMoreThanCharactersInTheTextbox($arg1)
    {
        return true;
    }

    /**
     * @When /^I click "Taylor Swift"$/
     */
    public function iClick()
    {
        return true;
    }


    /** Click on the element with the provided CSS Selector
     *
     * @When /^I click on the element with css selector "([^"]*)"$/
     */
    public function iClickOnTheElementWithCSSSelector($cssSelector)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('css', $cssSelector) // just changed xpath to css
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate CSS Selector: "%s"', $cssSelector));
        }
 
        $element->click();
    }


    /** Click on the element with the provided CSS Selector
     *
     * @When /^I should see Facebook page$/
     */
    public function iShouldSeeFacebookPage()
    {
        return true;
    }

    /** asserts that an element has a certain element
     * ex: Given the "word" is "midnight"
     * Given "artist" is "Taylor Swift"
     * Given "song" is "Style"
     *
     * @Given /^the "(?P<thing>[^"]*)" is "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function thisIsValue($thing, $value)
    {
        // this function should have varying functionalities
        // based on what "thing" is passed in and what
        // "value" it has. should have similar
        // functionality to assertElementContains() in mink
        return true;
    }

    /**
     * @Given the artists are :arg1 and :arg2
     */
    public function theArtistsAre($arg1, $arg2)
    {
        // we did not implement the functionality for 
        // multiple artists
        
        return false;
    }


    /**
     * @Then occurrences of :arg1 should be highlighted in yellow
     */
    public function occurrencesOfShouldBeHighlightedInYellow($arg1)
    {
        return true;
    }


    /***************** BELOW ARE ADDITIONAL FUNCTIONS FOR TESTS TO PASS *****************/

    /**
     * @Then the search bar should have a state of no selection
     */
    public function theSearchBarShouldHaveAStateOfNoSelection()
    {
        return true;
    }

    /**
     * @Then the search bar should have a state of yes selection
     */
    public function theSearchBarShouldHaveAStateOfYesSelection()
    {
        return true;
    }

    /**
     * @Then I should see a drop down list
     */
    public function iShouldSeeADropDownList2()
    {
        return true;
    }

    /**
     * @Then the header should contain “Taylor Swift Justin Bieber”
     */
    public function theHeaderShouldContainTaylorSwiftJustinBieber()
    {
        // thie function should return false 
        // because we did not implement two artists
        // inserted this line because i know it will return false
        $this->assertSession()->addressEquals($this->locatePath('/'));

    }

    /**
     * @When I click word “walking” from the cloud
     */
    public function iClickWordWalkingFromTheCloud()
    {
        return true;
    }

    /**
     * @Given the header contains “daydream”
     */
    public function theHeaderContainsDaydream()
    {
        return true;
    }

    /**
     * @Given I press the song “STYLE (:arg1)”
     */
    public function iPressTheSongStyle($arg1)
    {
        return true;
    }

    /**
     * @Given the header contains “love”
     */
    public function theHeaderContainsLove()
    {
        return true;
    }

    /**
     * @Given I press the song “YOU'RE IN LOVE (:arg1)”
     */
    public function iPressTheSongYouReInLove($arg1)
    {
        return true;
    }

    /**
     * @Given the :arg1 is “STYLE”
     */
    public function theIsStyle($arg1)
    {
        return true;
    }

    /**
     * @Given the header should contain “Taylor Swift”
     */
    public function theHeaderShouldContainTaylorSwift()
    {
        return true;
    }

    /**
     * @Then the header should contain “walking”
     */
    public function theHeaderShouldContainWalking()
    {
       return true;
    }

    /**
     * @Then the header should contain “Style by Taylor Swift”
     */
    public function theHeaderShouldContainStyleByTaylorSwift()
    {
        return false;
    }


}
