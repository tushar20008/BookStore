# Requirements : Username already exist and bookCode exist
# Test : Add Book with already existing bookCode
# Result : Unable to add book and see error message

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

username = 'admin'
password = 'admin'

bookCode = 'testCode'
title = 'testTitle'
author = 'testAuthor'
qty = '100'

def runTest():
	driver.get(siteUrl)
	driver.find_element_by_id("admin").click()
	driver.find_element_by_id("username").send_keys(username)
	driver.find_element_by_id("password").send_keys(password)
	driver.find_element_by_id("login").click()
	driver.find_element_by_id("bookLink").click()
	driver.find_element_by_id("addTab").click()
	driver.find_element_by_id("bookCode").send_keys(bookCode)
	driver.find_element_by_id("title").send_keys(title)
	driver.find_element_by_id("author").send_keys(author)
	driver.find_element_by_id("qty").send_keys(qty)
	driver.find_element_by_id("edit").click()

	try:
		element_present = EC.presence_of_element_located((By.ID,'errorMsg addMsg'))
		WebDriverWait(driver, 1).until(element_present)
		return 'Pass'
	except TimeoutException:
		return 'Fail'

if runTest() == 'Pass' :
	print testName, '	:	Success'
else	:
	print testName, '	:	Fail'

driver.close()
