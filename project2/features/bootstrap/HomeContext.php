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
class HomeContext extends MinkContext implements Context, SnippetAcceptingContext
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
     * @When I press the :arg1
     */
    public function iPressThe($arg1)
    {
        $element=$this->getSession()->getPage()->find('named', array('id_or_name', $arg1));
        $element->press();
    }

    /**
    * @Then I should see a button called :arg1
    */
    public function iShouldSeeAButtonCalled($arg1)
    {
        $string = '#' + $arg1;
        $this->assertSession()->elementExists('css', $string);
    }
}