Feature: Abstract page
	Once clicking a paper title, the abstract page should appear 

	Scenario: Abstract page PDF link
		Given I click the first title from the list for prone and Lupu
		Then there should be a PDF download link 