Feature: Search Button
	In order to prove that the search button works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: Home page should contain a search button
    Given I am on the homepage
    Then I should see a button called "submitButton"

Scenario: If search name exists, navigate to cloud page
	Given I am on the homepage
    And I fill in researcher name with "Halfond"
    And I click the "submit" element
    And the "text" element is filled
    And I press the "Generate word cloud"
	Then I should see the "cloud" page