Feature: Progress bar 
	Show progress bar for cloud generation, should be a rectangle, should show effort over time

	Scenario: Check progress bar functionality
		Given I search Orso on the home page
		Then the progress bar should show effort