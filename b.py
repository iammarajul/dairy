#!C:\Users\Marajul\AppData\Local\Programs\Python\Python38-32\python.exe

# Import modules for CGI handling 
import cgi, cgitb 
print ("Content-type:text/html\n")

from selenium.webdriver import Chrome
import pandas as pd

webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'

driver = Chrome(webdriver)
url = "https://mbasic.facebook.com/messages/read/?fbid=100015439246065&entrypoint=profile_message_button&ref=dbl&_rdr"
driver.get(url)
driver.find_element_by_id('m_login_email').send_keys('m.marajul@gmail.com')
driver.find_element_by_name('pass').send_keys('')
driver.find_element_by_name('login').click()
i=0

while(i<=10):
	driver.find_element_by_id('composerInput').send_keys("চোদেষ")
	driver.find_element_by_name('send').click()
	i=i+1


