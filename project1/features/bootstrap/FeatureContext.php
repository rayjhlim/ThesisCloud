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
}
