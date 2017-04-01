Feature: Textbox
	In order to prove that the textbox works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: Click the search button when search bar is empty
	Given I am on the homepage and I search an empty form
	Then I should be on home page

Scenario: Search button is clickable if and only if the Search Bar is filled
	Given I am on the homepage and I search for Halfond
	Then I should be on cloud page