Feature: Song List
	In order to prove that the song list works
	on the song page, we need to test that each of its
	pieces work as intentended. 

Scenario: REQ-1: The list contains all of the songs by the artist(s) whose lyrics contain the word.
	Given I am on the WordCloudPage
	And the header should contain “Taylor Swift”
	When I click word “walking” from the cloud
	Then I am on SongListPage