Feature: Conference paper list 
	Once clicking on a conference name, a new list is generated 

	Scenario: Header of page should be conference name clicked 
		Given I am on the list for IEEE Transactions on Software Engineering
		Then the header should contain IEEE Transactions on Software Engineering

	Scenario: Paper should contain the following titles
		Given I am on the list for focuses and Halfond
		Then the page should contain: 
			| title |

	Scenario: Page should contain the author names
		Given I am on the list for focuses and Halfond 
		Then the page should contain: 
			| author |
