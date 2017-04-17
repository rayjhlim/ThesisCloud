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
			| 21st IEEE/ACM                                                                                   |	
			| 2015 IEEE 8th                                                                                   |
			| 2009 International                                                                              |
			| 2012 First International                                                                        |
			| 2016 23rd Asia-Pacific                                                                          |