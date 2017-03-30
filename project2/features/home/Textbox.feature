Feature: Textbox
	In order to prove that the textbox works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: Home page should contain a welcome message
    Given I am on the homepage
    Then I should see an "h1" element

Scenario: Home page should contain a textbox
    Given I am on the homepage
    Then I should see a "researcher_name" element

Scenario: Click the search button when search bar is empty
	Given I am on the homepage
    And the "text" element is not filled
	Then the "submit" element is not clickable

Scenario: Search button is clickable if and only if the Search Bar is filled
	Given I am on the homepage
    Then I fill in "researcher_name" with "Teodora"
	And I press the "Generate word cloud"
	Then I should be on cloud