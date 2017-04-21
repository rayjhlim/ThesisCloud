Feature: Bibtex
	Provide links to access each paper's bibtex

	Scenario: Accessing bibtex
		Given I click on the first bibtex from the list for term and Bengio
		Then I should be on the bibtex page for Gradient-Based Optimization 

	