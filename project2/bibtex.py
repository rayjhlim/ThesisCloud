import sys
import json
import time
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException

 
from selenium import webdriver

def main():
	article_number = str(sys.argv[1])
	article_number.encode('utf-8')
	url = "http://ieeexplore.ieee.org/document/" + article_number

	driver = webdriver.Firefox()
	driver.get(url)
	driver.find_element_by_link_text('Download Citations').click()

	time.sleep(1)
	driver.find_element_by_xpath("//input[@value='download-bibtex']").click()
	time.sleep(1)
	driver.find_element_by_xpath("//button[contains(text(), 'Download')]").click()
	#driver.switch_to_window(driver.window_handles[1])
	time.sleep(1)
	print(driver.page_source)



	#print(driver.page_source)

	# authors = driver.find_elements_by_xpath('//div[@class="authors"]')
	# titles = driver.find_elements_by_xpath('//div[@class="title"]')
	# publicationDates = driver.find_elements_by_xpath('//span[@class="publicationDate"]')
	# sources = driver.find_elements_by_xpath('//div[@class="source"]')
	
	# minSize = min(len(abstracts), len(titles), len(publicationDates), len(sources), len(authors))
	# print("size(abstract):" + str(len(abstracts)) + ",size(titles):" + str(len(titles)) + ",size(publicationDates):" + str(len(publicationDates)) + 
	# 	",size(sources):" + str(len(sources)) + ",minSize:" + str(minSize))

	# jsonResponse = []

	# counter = 0
	# while counter < minSize:
	# 	jsonResponse.append({'inputWord' : inputWord.encode('utf-8'), 
	# 		'publicationDate' : str(publicationDates[counter].text.encode('utf-8')),
	# 		'source' : str(sources[counter].text.encode('utf-8')),	
	# 		'author' : str(authors[counter].text.encode('utf-8')),					
	# 		'title' : str(titles[counter].text.encode('utf-8')), 
	# 		'abstract' : str(abstracts[counter].text.encode('utf-8'))
	# 		})
	# 	counter += 1

	# json_data = json.dumps(jsonResponse)

	driver.close()

main()