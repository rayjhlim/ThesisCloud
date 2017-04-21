Feature: Paper list 
	Paper list page should contain the things needed 

	Scenario: Page should contain the following titles
		Given I am on the list for focuses and Halfond8 
		Then the page should contain the titles: 
			| title                                                                                           |
			| Command-Form                                                                                    |
			| Detection and Localization                                                                      |
			| Penetration Testing                                                                             |
			| Estimating Android                                                                              |
			| Detecting Display                                                                               |

	Scenario: Page should contain the following conference names 
		Given I am on the list for focuses and Halfond8
		Then the page should contain the conference names: 
			| conference                                                                                      |
			| 2009 International                                                                              |	
			| 2015 IEEE 8th                                                                                   |
			| 2013 28th                                                                                       |
			| 2012 First International                                                                        |
			| 21st IEEE/ACM                                                                                   |

	Scenario: Page should contain the following conference names 
		Given I am on the list for easily and Cote
		Then the page should be ordered by frequency

	Scenario: Page should contain the following conference names 
		Given I am on the list for fields and Cote
		Then clicking authors will order to list based on authors

	Scenario: Page should contain the following conference names 
		Given I am on the list for system and Cote
		Then clicking title will order to list based on titles
