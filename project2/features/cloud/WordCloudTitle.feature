Feature: Word cloud title 
	Users should be able to
	see the searched text that
	are initialized to the word cloud

	Scenario: REQ-1: Upon initialization, the label's text lists the searched text of the Word Cloud Title is initialized for
		Given I am on the homepage
		When I select "Aaron Cote"
		And I press Search
		Then I am on the WordCloudPage
		And the header should contain Aaron Cote