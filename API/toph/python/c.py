from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector

webdriver = 'chromedriver3.exe'

driver = Chrome(webdriver)

url = "https://www.codechef.com/submissions?sort_by=All&sorting_order=asc&language=All&status=All&year=2019&handle=marajul&pcode=&ccode=&Submit=GO"
driver.get(url)
table = driver.find_elements_by_class_name("dataTable")
if(len(table)==0):
	print("FUCK")
st=(str)(chr(92)+chr(34)+"kol"+chr(92)+chr(34))
quotes=table.find_elements_by_class_name(st)
for quote in quotes:
	print(quote.text)
	print("OK")
	
