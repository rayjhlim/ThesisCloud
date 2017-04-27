Feature: Author name
	Clicking on an author in the paper's authors list will do a new search 

	Scenario: Going to word cloud after clicking an author from list 
		Given I click on Sonal Mahajan from list for focuses and Halfond 
		Then I should be on the word cloud page for Sonal Mahajan