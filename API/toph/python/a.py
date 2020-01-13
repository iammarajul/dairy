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
	url = "https://toph.co/submissions/filter?author=590d7d60de14194eb555201c&start="+page_nb+"&verdict="
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
		urlp=""
		if(link):
			urlp=link[0].get_attribute('href')
		sql1="SELECT * FROM submission WHERE id=%s AND oj='toph'"
		val1 = (row[0].text,)
		mycursor.execute(sql1,val1)
		myresult = mycursor.fetchall()
		if(len(myresult)==0):
			sql="INSERT INTO submission (id,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'toph')"
			val=(row[0].text,time,urlp,row[2].text,row[7].text)
			mycursor.execute(sql, val)
			mydb.commit()
		else:
			break

print("successfull")
driver.close()
sys.exit()

