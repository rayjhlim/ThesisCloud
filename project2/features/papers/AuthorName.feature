Feature: Author name
	Clicking on an author in the paper's authors list will do a new search 

	Scenario: If search name exists, navigate to cloud page
		Given I click on Alessandro Orso from list for focuses and Halfond 
		Then I should be on the word cloud page for Alessandro Orso