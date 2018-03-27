# Requirements : Username and book already exist with qty more than 0
# Test : Search and Checkout Book
# Result : Able to issue the book

import sys 

from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By

siteUrl = str(sys.argv[1])
testName = str(sys.argv[0])
testName = testName[0:len(testName)-3]

webdriverPath = './chromedriver_win32/chromedriver.exe'
driver = webdriver.Chrome(executable_path=webdriverPath)

username = 'tushar'
password = 'tushar'
bookCode = '123'

def runTest():
	driver.get(siteUrl)
	driver.find_element_by_id("username").send_keys(username)
	driver.find_element_by_id("password").send_keys(password)
	driver.find_element_by_id("login").click()
	driver.find_element_by_id("searchLink").click()
	driver.find_element_by_id("bookCode").send_keys(bookCode)
	driver.find_element_by_id("search").click()
	driver.find_element_by_id("checkout").click()
	driver.find_element_by_id("checkout").click()
	try:
		element_present = EC.presence_of_element_located((By.ID,'successMsg'))
		WebDriverWait(driver, 1).until(element_present)
		return 'Pass'
	except TimeoutException:
		return 'Fail'

if runTest() == 'Pass' :
	print testName, '	:	Success'
else	:
	print testName, '	:	Fail'

driver.close()
