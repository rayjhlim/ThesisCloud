Feature: Conference word cloud
	Once clicking on a conference name, a new list is generated 

	Scenario: Paper should contain the following titles
		Given I click on the first conference from the list for term and Bengio
		Then I should be on the word cloud for IEEE Transactions
