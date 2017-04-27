Feature: Textbox
	In order to prove that the textbox works
	on the home page, we need to test that each of its
	features work as intended. 

	Scenario: Click the search button when search bar is empty
		Given I am on the homepage and I search an empty form
		Then I should be on home page