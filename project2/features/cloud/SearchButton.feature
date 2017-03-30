Feature: Search Button
	In order to prove that the search button works
	on the cloud page, we need to test that each of its
	features work as intended. 

Scenario: Cloud page should contain a search button
    Given I am on the cloud page for Budiman
    Then I should see a "submit" element

Scenario: Search button directs user to CloudPage
	Given I am on the Cloud Page for Budiman
	And I fill in "researcher_name" with "Halfond"
	And I press "submit" 
	Then I should be on Cloud Page for Halfond