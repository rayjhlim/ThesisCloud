Feature: Paper list 
	Paper list page should contain the things needed 

	Scenario: Header of page should be word clicked 
		Given I am on the list for areas and Orso
		Then the header should contain focuses

	Scenario: Page should contain the following titles
		Given I am on the list for focuses and Halfond8 
		Then the page should contain the titles: 
			| title                                                                                           |
			| Command-Form Coverage for Testing Database Applications                                         |
			| Detection and Localization of HTML Presentation Failures Using Computer Vision-Based Techniques |
			| Penetration Testing with Improved Input Vector Identification                                   |
			| Estimating Android applications's CPU energy usage via bytecode profiling                       |
			| Detecting Display Energy Hotspots in Android Apps                                               |
			| Detecting and Localizing Visual Inconsistencies in Web Applications                             |
			| WASP: Protecting Web Applications Using Positive Tainting and Syntax-Aware Evaluation           |
			| Randomizing regression tests using game theory                                                  |
			| WebSee: A Tool for Debugging HTML Presentation Failures                                         |

	Scenario: Page should contain the following conference names 
		Given I am on the list for focuses and Halfond8
		Then the page should contain the conference names: 
			| conference name                                                                                 |
			| 21st IEEE/ACM International Conference on Automated Software Engineering (ASE'06)               |	
			| 2015 IEEE 8th International Conference on Software Testing, Verification and Validation (ICST)  |
			| 2009 International Conferene on Software Testing Verification and Validation                    |
			| 2012 First International Workshop on Green and Sustainable Software (GREENS)                    |
			| 2016 23rd Asia-Pacific Software Engineering Conference (APSEC)                                  |
			| IEEE Transactions on Software Engineering                                                       |
			| 2013 28th IEEE/ACM International Conference on Automated Software Engineering (ASE)             |