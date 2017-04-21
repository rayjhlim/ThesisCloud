Feature: Word cloud font sizes
	Word cloud should have different font sizes according to the word frequencies

	Scenario: Generate word cloud from home page 
		Given I search Bengio from home page
		Then the word cloud generated should contain different font sizes

	Scenario: Generate word cloud from paper list
		Given I click on an author from list for focuses and Halfond 
		Then the word cloud generated should contain different font sizes