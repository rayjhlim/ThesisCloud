Feature: Progress bar 
	Show progress bar for cloud generation, should be a rectangle, should show effort over time

	Scenario: Check existence of progress bar 
		Given I am on the cloud page for Alessandro Orso
		Then there should be a progress bar

	Scenario: Check progress bar functionality
		Given I search Boehm on the cloud page for Alessandro Orso
		Then the progress bar should show effort