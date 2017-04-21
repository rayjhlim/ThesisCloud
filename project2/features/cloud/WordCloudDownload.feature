Feature: Word cloud download
	User can download the generated word cloud

	Scenario: Download begins after clicking download
		Given I click download on the cloud page for Bengio
		Then a download for Bengio's wordcloud begins