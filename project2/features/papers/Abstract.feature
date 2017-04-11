Feature: Abstract page
	Once clicking a paper title, the abstract page should appear 

	Scenario: Going to the abstract page
		Given I am on the list for focuses and Halfond
		And I click on Command-Form Coverage 
		Then I should be on the abstract page for that paper 

	Scenario: Yellow highlight 
		Given I am on the list for focuses and Halfond
		And I click on Command-Form Coverage 
		Then the word focuses is highlighted in yellow

	Scenario: Abstract page PDF link
		Given I am on the list for focuses and Halfond
		And I click on Command-Form Coverage 
		Then there should be download link for that paper's PDF