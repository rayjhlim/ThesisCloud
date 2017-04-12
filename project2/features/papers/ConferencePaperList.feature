Feature: Conference paper list 
	Once clicking on a conference name, a new list is generated 

	Scenario: Paper should contain the following titles
		Given I am on the list for IEEE Transactions on Software Engineering
		Then the page should contain: 
			| title | author |                                                          