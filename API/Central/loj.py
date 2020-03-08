from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys
import datetime
import time

def lightoj(name1,handel,passwd): 
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="",
	  database="dairy"
	)
	
	mycursor = mydb.cursor()
	
	# webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'
	
	# driver = Chrome(webdriver)
	
	url = "http://lightoj.com/volume_usersubmissions.php"
	driver.get(url)
	driver.find_element_by_id('myuserid').send_keys(handel)
	driver.find_element_by_id('mypassword').send_keys(passwd)
	driver.find_element_by_name('Submit').click();
	# if(driver.find_element_by_name('user_password')==null):
		# return
	driver.find_element_by_name('user_password').send_keys('M.mokos')
	driver.find_element_by_name('submit').click();
	pk = driver.find_elements_by_id("mytable3")
	quotes= pk[0].find_elements_by_tag_name("tr")
	
	cnt =0;
	for quote in quotes:
		if cnt>0:
			row=quote.find_elements_by_tag_name("td")
			sid=(quote.find_elements_by_tag_name("th"))[0].text
			tt =(int) (time.mktime(datetime.datetime.strptime((str)(row[0].text), "%Y-%m-%d %H:%M:%S").timetuple()))
			name= row[1].text
			link=(row[1].find_elements_by_tag_name("a"))[0].get_attribute('href')
			# print(sid)
			sql1="SELECT * FROM "+(str)(name1)+" WHERE subid="+(str)(sid)+" AND oj='loj'"
			# print(sql1)
			mycursor.execute(sql1)
			myresult = mycursor.fetchall()
			if(len(myresult)==0):
				sql="INSERT INTO "+name1+" (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'loj')"
				val=(sid,tt,link,name,row[5].text)
				mycursor.execute(sql, val)
				mydb.commit()
			else:
			 break
		cnt+=1
	
	
	print("successfull")
	driver.get('http://lightoj.com/login_logout.php')
	# driver.quit()
	return
