from selenium.webdriver import Chrome
import pandas as pd
import mysql.connector
import sys



webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'

driver = Chrome(webdriver)



url = "https://mbasic.facebook.com/messages/read/?fbid=100006540432459&entrypoint=profile_message_button&_rdr"
driver.get(url)
driver.find_element_by_id('m_login_email').send_keys('m.marajul@gmail.com')
driver.find_element_by_name('pass').send_keys('MARAJULLOL')
driver.find_element_by_name('login').click()
cnt=0
while cnt<=50:
	try:
		driver.find_element_by_id('composerInput').send_keys('Hi, KU :P')
		driver.find_element_by_name('send').click()
		cnt+=1
	except :
		drive.close()
		sys.exit()
	

# for quote in quotes:
# 	print(quote.text)
# 	print("OK")

# if(len(quotes)==0):
# 	break
# 	time=time1[0].get_attribute('data-time')
# 	urlp=""
# 	if(link):
# 		urlp=link[0].get_attribute('href')
# 	sql1="SELECT * FROM submission WHERE id=%s AND oj='toph'"
# 	val1 = (row[0].text,)
# 	mycursor.execute(sql1,val1)
# 	myresult = mycursor.fetchall()
# 	if(len(myresult)==0):
# 		sql="INSERT INTO submission (id,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'toph')"
# 		val=(row[0].text,time,urlp,row[2].text,row[7].text)
# 		mycursor.execute(sql, val)
# 		mydb.commit()

print("successfull")
# driver.close()
# sys.exit()

