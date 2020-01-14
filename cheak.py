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
url = "https://www.codechef.com/submissions?sort_by=All&sorting_order=asc&language=All&status=All&year=2020&handle=marajul&pcode=&ccode=&Submit=GO"
driver.get(url)
aa=driver.find_element_by_tag_name('tbody')

bb=aa.find_element_by_tag_name('tr')
print(bb.text)
# for b in bb:
# 	print(b.text)



print("successfull")
driver.close()
sys.exit()

