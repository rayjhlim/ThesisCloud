Feature: Abstract page
	Once clicking a paper title, the abstract page should appear 

	Scenario: Abstract page PDF link
		Given I click the first title from the list for prone and Lupu
		Then cicking the PDF link opens a PDF

	Scenario: Words highlighted in yellow
		Given I click the first title from the lsit for case and Ben
		Then the word case is highlighted 