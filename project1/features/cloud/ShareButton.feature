Feature: Share Button
	In order to prove that the share button works
	on the cloud page, we need to test that each of its
	pieces work as intentended. 

Scenario: REQ-1: Upon clicking the Share Button, the user is redirected to the Facebook website with the action of creating a new post.
	Given I am on the WordCloudPage
	And the header should contain “Taylor Swift”
	And I press "shareToFBButton"
	Then I should see Facebook page

Scenario: REQ-1: Upon clicking the Share Button, the user is redirected to the Facebook website with the action of creating a new post.
	Given I am on the WordCloudPage
	And the header should contain “Taylor Swift Justin Bieber”
	And I press "shareToFBButton"
	Then I should see Facebook page
