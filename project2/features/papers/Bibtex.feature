Feature: Bibtex
	Provide links to access each paper's bibtex

	Scenario: Check clicking link to paper's bibtex
		Given I click on a bibtex on the list for testers and Halfond
		Then I should access the paper's bibtex