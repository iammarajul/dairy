from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys

def toph(name,handel):	
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="",
	  database="dairy"
	)
	
	mycursor = mydb.cursor()
	
	# webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'
	
	# driver = Chrome(webdriver)
	cnt=0
	
	while 1:
		page_nb=(str)(cnt);
		url = "https://toph.co/submissions/filter?author="+handel+"&start="+page_nb+"&verdict="
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
			verdict1=row[7].text
			if(verdict1=="CPU Limit Exceeded"):
			 	verdict1="Time Limit Exceeded"
			if(link):
				urlp=link[0].get_attribute('href')
			sql1="SELECT * FROM "+(str)(name)+" WHERE subid="+(str)(row[0].text)+" AND oj='toph'"
			# val1 = (name,t,)
			mycursor.execute(sql1)
			myresult = mycursor.fetchall()
			if(len(myresult)==0):
				sql="INSERT INTO "+name+" (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'toph')"
				val=(row[0].text,time,urlp,row[2].text,verdict1)
				mycursor.execute(sql, val)
				mydb.commit()
			else:
				print("successfull")
				return
	
	print("successfull")
	# driver.quit()
	return
	