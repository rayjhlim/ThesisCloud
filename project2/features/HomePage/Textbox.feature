Feature: Textbox
	In order to prove that the textbox works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: Home page should contain a textbox
    Given I am on the homepage
    I should see a "text" element

Scenario: Click the search button when search bar is empty
	Given I am on the homepage
    And the "text" element is not filled
	Then the "submit" element is not clickable

Scenario: Search button is clickable if and only if the Search Bar is filled
	Given I am on the homepage
    And the "text" element is filled
	Then the "submit" element is clickable