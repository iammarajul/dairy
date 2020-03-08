import urllib.request, json
import mysql.connector
def uva(name,handel):
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="",
	  database="dairy"
	)
	verdict= dict()
	
	verdict['90']='Accepted'
	verdict['50']='Time Limit Exceeded'
	verdict['70']='Wrong Answer'
	verdict['40']='Runtime Error'
	verdict['30']='Compilation Error'
	verdict['35']='Restricted function'
	verdict['60']='Memory Limit Exceeded'
	verdict['45']='Output Limit'
	verdict['80']='Presentation Error'
	verdict['10']='Submission Error'
	verdict['15']="can not judged"
	verdict['20']='In queue'
	
	mycursor = mydb.cursor()
	url="https://uhunt.onlinejudge.org/api/subs-user/"+handel
	json_url = urllib.request.urlopen('https://uhunt.onlinejudge.org/api/subs-user/888032')
	json_data = json.loads(json_url.read())
	a = json_data["subs"]
	cnt=0
	for row in a:
		vid=row[0]
		cnt+=1;
		ver=verdict[(str)(row[2])]
		time=row[4]
		pid=row[1]
		link="https://onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=24&page=show_problem&problem="+(str)(pid)
	
		mycursor.execute("SELECT * FROM uva WHERE id=%s",(pid,));
		pname=(mycursor.fetchall())[0][2]
		sql1="SELECT * FROM piammarajul WHERE subid=%s AND oj='uva'"
		val1 = (vid,)
		mycursor.execute(sql1,val1)
		myresult = mycursor.fetchall()
		if(len(myresult)==0):
			sql="INSERT INTO piammarajul (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'uva')"
			val=(vid,time,link,pname,ver)
			mycursor.execute(sql, val)
			mydb.commit()
		else:
			break
	
	print(cnt)	