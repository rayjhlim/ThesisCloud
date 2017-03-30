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
     * Opens cloudpage
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
        $this->visitPath('/cloud/Aaron Cote');
        //$this->visitPath('/cloud/Budiman');
    }

    /**
     * @Given the header should contain “Aaron Cote”
     * @Then the header should contain Aaron Cote
     */
    public function theHeaderShouldContainAaronCote()
    {
        $this->assertSession()->responseContains("Aaron Cote");
    }

    /**
    * @Given I press shareToFBButton
    */
    public function iPressShareToFBButton()
    {
        return true;
    }

    /**
    * @Then I should see Facebook Page
    */
    public function iShouldSeeFacebookPage()
    {
        return true;
    }
    
    /**
     * @Then the image of the cloud shared to my Facebook profile
     */
    public function theImageOfTheCloudSharedToMyFacebookProfile()
    {
        // this function should check the image
        return true;
    }

    /**
     * @Then I should be logged in to my Facebook profile
     */
    public function iShouldBeLoggedInToMyFacebookProfile()
    {
       // checks if logs you in to facebook profile
       return true;
    }

    /**
     * @When I select :arg1
     */
    public function iSelect($arg1)
    {
        return true; 
    }

    /**
     * @When I press Search
     */
    public function iPressSearch()
    {
        return true; 
    }

    public function theWordCloudIsForBudiman()
    {
        return true;
    }

}