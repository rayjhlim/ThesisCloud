Feature: Search button (cloud page)
	In order to prove that the search button works
	on the cloud page, we need to test that each of its
	features work as intended. 

Scenario: Search button directs user to CloudPage
	Given I search Halfond from cloud page
	Then I should be on cloud page