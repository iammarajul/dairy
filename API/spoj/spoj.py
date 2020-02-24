from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys
import time
import datetime
def sopj(name,handel):
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="",
	  database="dairy"
	)
	
	mycursor = mydb.cursor()
	
	
	verdict= dict()
	
	verdict['100']='Accepted'
	verdict['accepted']='Accepted'
	verdict['time limit exceeded']='Time Limit Exceeded'
	verdict['wrong answer']='Wrong Answer'
	verdict['runtime error (SIGSEGV)']='Runtime Error'
	verdict['runtime error (NZEC)']='Runtime Error'
	verdict['runtime error (SIGABRT)']='Runtime Error'
	verdict['compilation error']='Compilation Error'
	verdict['memory limit exceeded']='Memory Limit Exceeded'
	verdict['CHALLENGED']='Hacked'
	verdict['SKIPPED']='Skipped'
	
	webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'
	
	driver = Chrome(webdriver)
	cnt=0
	
	while 1:
		page_nb=(str)(cnt)
		url = "https://www.spoj.com/status/"+handel+"/nonhidden/start="+page_nb
		cnt=cnt+20
		driver.get(url)
		ab = driver.find_elements_by_tag_name("tbody")
		if(ab==null):
			return
		quotes = ab[0].find_elements_by_tag_name("tr")
		
		for quote in quotes:
			row=quote.find_elements_by_tag_name("td")
			sid=row[0].text
			ver=row[3].text
			ver=verdict[ver]
			tie=(int)(time.mktime(datetime.datetime.strptime(row[1].text, "%Y-%m-%d %H:%M:%S").timetuple()))
			pname=row[2].text
			lk=row[2].find_elements_by_tag_name("a")
			link=lk[0].get_attribute('href')
			print(tie)
			sql1="SELECT * FROM %s WHERE subid=%s AND oj='spoj'"
			val1 = (name,sid,)
			mycursor.execute(sql1,val1)
			myresult = mycursor.fetchall()
			if(len(myresult)==0):
				sql="INSERT INTO %s (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'spoj')"
				val=(name,sid,tie,link,pname,ver)
				mycursor.execute(sql, val)
				mydb.commit()
			else:
				break
		if(cnt==80):
			break
	
	print("successfull")
	driver.quit()
	return

