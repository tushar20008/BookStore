# Requirements : Username and book already exist and book already issued
# Test : Delete already issued book
# Result : Unable to delete book and see error message

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

bookCode = 'issuedBook'
title = 'issuedTitle'
author = 'issuedAuthor'

def runTest():
	driver.get(siteUrl)
	driver.find_element_by_id("admin").click()
	driver.find_element_by_id("username").send_keys(username)
	driver.find_element_by_id("password").send_keys(password)
	driver.find_element_by_id("login").click()
	driver.find_element_by_id("searchLink").click()
	driver.find_element_by_id("booksTab").click()
	driver.find_element_by_id("bookCode").send_keys(bookCode)
	driver.find_element_by_id("title").send_keys(title)
	driver.find_element_by_id("author").send_keys(author)
	driver.find_element_by_id("searchBook").click()
	driver.find_element_by_id("delete").click()

	try:
		element_present = EC.presence_of_element_located((By.ID,'errorMsg deleteMsg'))
		WebDriverWait(driver, 1).until(element_present)
		return 'Pass'
	except TimeoutException:
		return 'Fail'

if runTest() == 'Pass' :
	print testName, '	:	Success'
else	:
	print testName, '	:	Fail'

driver.close()
