Feature: Search button (home page) 
	In order to prove that the search button works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: If search name exists, navigate to cloud page
	Given I search Halfond from home page
	Then I should be on cloud page

Scenario: Configurable paper parsing 
	Given I am on the home page
	Then there should be a dropdown