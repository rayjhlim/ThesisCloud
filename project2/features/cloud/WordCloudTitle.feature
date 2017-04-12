Feature: Word cloud title 
	Users should be able to
	see the searched text that
	are initialized to the word cloud

	Scenario: The label's text lists the searched text of the Word Cloud Title is initialized for
		Given I am on the cloud page for Boehm
		Then the header should contain Boehm