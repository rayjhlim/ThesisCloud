Feature: Paper List Page
	Testing whether the Paper List Page functions as intended

	Scenario: Initializing the Paper List Page with "Budiman" as the last name, and "abstract" as the word that's clicked
		Given I am on "WordCloudPage"
		And the word cloud is for "Budiman"
		When I press "abstract"
		Then I am on "PaperListPage"
		And the tabel should contain:
		| author       | title                                                                                     |
		| M.Budiman    | The influence of hydrogen plasma and annealing on GaN film grown by plasma-assisted MOCVD |
		| Harry Budiman| A Nonparametric Stochastic Optimizer for TDMA-Based Neuronal Signaling                    |
		| Gelar Budiman| p-Value based cooperative multiband spectrum sensing for cognitive radio                  |
		| Arif Budiman | Pose-based 3D human motion analysis using Extreme Learning Machine                        |