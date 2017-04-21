Feature: Paper list subset
	Generate word cloud from subset in a paperlist 

	Scenario: Subset contains one paper 
		Given I am on paper list for term and Bengio
		And I select the first paper
		Then I will be on word cloud page after clicking generate wordcloud

	Scenario: Subset contains two papers 
		Given I am on paper list for term and Bengio
		And I select the first two paper
		Then I will be on word cloud page after clicking generate wordcloud

	Scenario: Subset contains three paper 
		Given I am on paper list for term and Bengio
		And I select the first three paper
		Then I will be on word cloud page after clicking generate wordcloud