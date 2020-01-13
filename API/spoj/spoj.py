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
	url = "https://www.spoj.com/status/iammarajul/nonhidden/start="+page_nb
	cnt=cnt+20
	driver.get(url)
	ab = driver.find_elements_by_tag_name("tbody")
	# print(ab[0].text)
	quotes = ab[0].find_elements_by_tag_name("tr")
	
	for quote in quotes:
		row=quote.find_elements_by_tag_name("td")
		sid=row[0].text
		ver=row[3].text
		tie=(int)(time.mktime(datetime.datetime.strptime(row[1].text, "%Y-%m-%d %H:%M:%S").timetuple()))
		pname=row[2].text
		lk=row[2].find_elements_by_tag_name("a")
		link=lk[0].get_attribute('href')
		print(tie)
		sql1="SELECT * FROM submission WHERE id=%s AND oj='spoj'"
		val1 = (sid,)
		mycursor.execute(sql1,val1)
		myresult = mycursor.fetchall()
		if(len(myresult)==0):
			sql="INSERT INTO submission (id,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'spoj')"
			val=(sid,tie,link,pname,ver)
			mycursor.execute(sql, val)
			mydb.commit()
		else:
			break
	if(cnt==80):
		break

print("successfull")
driver.close()
sys.exit()

