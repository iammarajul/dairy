from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys
import datetime
import time

 

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="dairy"
)

mycursor = mydb.cursor()



webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'

driver = Chrome(webdriver)



url = "http://lightoj.com/volume_usersubmissions.php"
driver.get(url)
driver.find_element_by_id('myuserid').send_keys('m.marajul@gmail.com')
driver.find_element_by_id('mypassword').send_keys('M.mokos')
driver.find_element_by_name('Submit').click();
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

		sql1="SELECT * FROM piammarajul WHERE subid=%s AND oj='loj'"
		val1 = (sid,)
		mycursor.execute(sql1,val1)
		myresult = mycursor.fetchall()
		if(len(myresult)==0):
			sql="INSERT INTO piammarajul (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'loj')"
			val=(sid,tt,link,name,row[5].text)
			mycursor.execute(sql, val)
			mydb.commit()
		else:
		 break
	cnt+=1


print("successfull")
driver.close()
# sys.exit()

