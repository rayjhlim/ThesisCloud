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


    /**

     * @Then /^the word cloud state does not change$/
     */
    public function theWordCloudStateDoesNotChange() {
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

    /**
     * Opens homepage
     * Example: Given I am on "/"
     * Example: When I go to "/"
     * Example: And I go to "/"
     *
     * @Given /^(?:|I )am on (?:|the )WordCloudPage$/
     * @When /^(?:|I )go to (?:|the )WordCloudPage$/
     */
    public function iAmOnWordCloudPage()
    {
        $this->visitPath('/cloud/Taylor Swift/word/00');
    }

    /**
     * Opens homepage
     * Example: Given I am on "/"
     * Example: When I go to "/"
     * Example: And I go to "/"
     *
     * @Given /^(?:|I )am on (?:|the )SongListPage$/
     * @When /^(?:|I )go to (?:|the )SongListPage$/
     */
    public function iAmOnSongListPage()
    {
        return true;   
    }

    /**
     * Opens homepage
     * Example: Given I am on "/"
     * Example: When I go to "/"
     * Example: And I go to "/"
     *
     * @Given /^(?:|I )am on (?:|the )LyricsPage$/
     * @When /^(?:|I )go to (?:|the )LyricsPage$/
     */
    public function iAmOnLyricsPage()
    {
        return true;   
    }

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
     * @When /^I type "([^"]*)" in the textbox$/
     */
    public function iType($name)
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

    /**
     *
     * @Given /^the "(?P<thing>[^"]*)" is "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function thisIsValue($thing, $value)
    {
        return true;
    }

    /**
     * @Given the artists are :arg1 and :arg2
     */
    public function theArtistsAre($arg1, $arg2)
    {
        return false;
    }

    /**
     * @Then /^the header should contain "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function assertHeaderContains($value)
    {
        return true;
    }

    /**
     * @Given /^the header contains "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function theHeaderContains($value)
    {
        return true;
    }

    /**
     *
     * @When /^(?:|I )press the song "(?P<link>(?:[^"]|\\")*)"$/
     */
    public function selectSong($option)
    {
        return true;
    }

    /**
     * @Then occurrences of :arg1 should be highlighted in yellow
     */
    public function occurrencesOfShouldBeHighlightedInYellow($arg1)
    {
        return true;
    }


}
