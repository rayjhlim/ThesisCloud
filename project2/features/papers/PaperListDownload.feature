Feature: Download paper list 
	Paper list page should be downloadable 

	Scenario: Download paper list as PDF
		Given I click download as PDF in list for focuses and Halfond
		Then a download of PDF for paper list begins 

	Scenario: Download paper list as Plaintext
		Given I click download as plaintext in list for focuses and Halfond 
		Then a download of plaintext for paper list begins