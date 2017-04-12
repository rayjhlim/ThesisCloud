Feature: Dropdown  
	Test configuring number of paper parsed 

	Scenario: Parse one paper 
		Given I search Lupu from home page for one paper 
		Then I should be on cloud page for Lupu

	Scenario: Parse eight papers 
		Given I search Lupu from home page for three papers
		Then I should be on cloud page for Lupu

	Scenario: Parse ten papers
		Given I search Lupu from home page for ten papers
		Then I should be on cloud page for Lupu