#!C:\Users\Marajul\AppData\Local\Programs\Python\Python38-32\python.exe

# Import modules for CGI handling 
import cgi, cgitb 
import cf
import loj
import spoj
import toph
import uva
import mysql.connector
from selenium.webdriver import Chrome
import pandas as pd
print ("Content-type:text/html\n")
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="dairy"
)
webdriver = 'C:/xampp/htdocs/Dairy/API/toph/python/chromedriver3.exe'	
driver = Chrome(webdriver)
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM user")
myresult = mycursor.fetchall()

for x in myresult:
 	name="p"+x[0]
 	loj.driver=driver;
 	spoj.driver=driver;
 	toph.driver=driver;
 	if(x[3]):
 		uva.uva(name,x[3])
 	if(x[4]):
 		cf.codeforces(name,x[4])
 	if(x[5]):
 		spoj.spoj(name,x[5])
 	if(x[6]):
 		toph.toph(name,x[6])
 	if(x[7] and x[8]):
 		loj.lightoj(name,x[7],x[8])

print("successful")
driver.quit()
