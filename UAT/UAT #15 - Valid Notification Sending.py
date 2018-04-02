# Requirements : Username and admin already exist 
# Test : Send notification to user
# Result : Able to send notification and see success message

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

selectUserQuery = "$('select').prop('value','tushar');"
title = 'some title'
msg = 'some msg'

def runTest():
	driver.get(siteUrl)
	driver.find_element_by_id("admin").click()
	driver.find_element_by_id("username").send_keys(username)
	driver.find_element_by_id("password").send_keys(password)
	driver.find_element_by_id("login").click()
	driver.find_element_by_id("notificationLink").click()
	driver.execute_script(selectUserQuery)
	driver.find_element_by_id("title").send_keys(title)
	driver.find_element_by_id("message").send_keys(msg)
	driver.find_element_by_id("send").click()

	try:
		element_present = EC.presence_of_element_located((By.ID,'successMsg'))
		return 'Pass'
	except TimeoutException:
		return 'Fail'

if runTest() == 'Pass' :
	print testName, '	:	Success'
else	:
	print testName, '	:	Fail'

driver.close()
