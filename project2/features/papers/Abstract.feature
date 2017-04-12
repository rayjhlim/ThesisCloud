Feature: Abstract page
	Once clicking a paper title, the abstract page should appear 

	Scenario: Going to the abstract page
		Given I click the first title from the list for focuses and Halfond 
		Then I should be on the abstract page for that paper 

	Scenario: Abstract page PDF link
		Given I click the first title from the list for prone and Lupu
		Then there should be a PDF download link 