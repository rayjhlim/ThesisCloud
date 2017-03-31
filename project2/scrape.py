import sys
import json
from selenium import webdriver


# import time
# from selenium.webdriver.common.by import By
# from selenium.webdriver.support.ui import WebDriverWait
# from selenium.webdriver.support import expected_conditions as EC
# from selenium.common.exceptions import TimeoutException
 
 
from selenium import webdriver

def main():
	inputWord = str(sys.argv[1])
	inputWord.encode('utf-8')
	url = "http://dl.acm.org/results.cfm?query=(%252B" + inputWord + ")&within=owners.owner=HOSTED&filtered=&dte=&bfr="

	driver = webdriver.Firefox()
	driver.get(url)
	abstracts = driver.find_elements_by_xpath('//div[@class="abstract"]')
	authors = driver.find_elements_by_xpath('//div[@class="authors"]')
	titles = driver.find_elements_by_xpath('//div[@class="title"]')
	publicationDates = driver.find_elements_by_xpath('//span[@class="publicationDate"]')
	sources = driver.find_elements_by_xpath('//div[@class="source"]')
	
	minSize = min(len(abstracts), len(titles), len(publicationDates), len(sources), len(authors))
	# print("size(abstract):" + str(len(abstracts)) + ",size(titles):" + str(len(titles)) + ",size(publicationDates):" + str(len(publicationDates)) + 
	# 	",size(sources):" + str(len(sources)) + ",minSize:" + str(minSize))

	jsonResponse = []

	counter = 0
	while counter < minSize:
		jsonResponse.append({'inputWord' : inputWord.encode('utf-8'), 
			'publicationDate' : str(publicationDates[counter].text.encode('utf-8')),
			'source' : str(sources[counter].text.encode('utf-8')),	
			'author' : str(authors[counter].text.encode('utf-8')),					
			'title' : str(titles[counter].text.encode('utf-8')), 
			'abstract' : str(abstracts[counter].text.encode('utf-8'))
			})
		counter += 1

	json_data = json.dumps(jsonResponse)
	print(json_data)

	driver.close()

main()