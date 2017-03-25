Feature: Search Button
	In order to prove that the search button works
	on the home page, we need to test that each of its
	features work as intentended. 

Scenario: Home page should contain a search button
    Given I am on the homepage
    I should see a "submit" element

Scenario: Click the search button when search bar is empty
	Given I am on the homepage
    And the "text" element is not filled
	Then the "submit" element is not clickable

Scenario: Search button is clickable if and only if the Search Bar is filled
	Given I am on the homepage
    And the "text" element is filled
	Then the "submit" element is clickable

Scenario: If search name exists, navigate to cloud page
	Given I am on the homepage
    And the "text" element is filled
    And I click the "submit" element
	Then I should see the "cloud" page