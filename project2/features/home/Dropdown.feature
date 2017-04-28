Feature: Dropdown Paper Amount
	Controlling amount of paper used

	Scenario: Three papers
		Given I search for a paper list for Lee with three papers
		Then the paper list cannot have more than three rows

	Scenario: Five papers
		Given I search for a paper list for Lee with five papers
		Then the paper list cannot have more than five rows

	Scenario: Eight papers
		Given I search for a paper list for Lee with eight papers
		Then the paper list cannot have more than eight rows