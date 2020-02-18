from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys
import time
import datetime

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="dairy"
)

mycursor = mydb.cursor()

webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'

driver = Chrome(webdriver)
cnt=0

while 1:
	page_nb=(str)(cnt)
	url = "https://codeforces.com/submissions/.MARAJUL./page/"+page_nb
	cnt=cnt+1
	driver.get(url)
	ab = driver.find_elements_by_tag_name("tbody")
	# print(ab[0].text)
	quotes = ab[0].find_elements_by_tag_name("tr")
	
	for quote in quotes:
		row=quote.find_elements_by_tag_name("td")
		if(row[5].text=='Accepted'):
			row[0].click()
			code=driver.find_elements_by_class_name('linenums')
			ab=(str)(code[0].text)
			name=row[3].text
			name=name+".cpp"
			f= open(name,"w+")
			f.write(ab)
			f.close()
			driver.find_elements_by_class_name('close').click()
	if(cnt==9):
		break


print("successfull")
driver.close()
sys.exit()

