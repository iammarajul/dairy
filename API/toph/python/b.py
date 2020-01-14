from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys

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
	page_nb=(str)(cnt);
	url = "https://toph.co/submissions/filter?author=5ced179a1f0bdd00013e978e&start="+page_nb+"&verdict="
	cnt=cnt+64
	driver.get(url)
	quotes = driver.find_elements_by_class_name("syncer")
	if(len(quotes)==0):
		break
	for quote in quotes:
		row=quote.find_elements_by_tag_name("td")
		link=row[2].find_elements_by_tag_name('a')
		time1=row[3].find_elements_by_class_name('timestamp')
		time=time1[0].get_attribute('data-time')
		print(row[0].text)
		print(time)
		print(row[2].text)
		print(row[7].text)

print("successfull")
driver.close()
sys.exit()

