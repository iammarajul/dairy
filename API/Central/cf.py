import urllib.request, json
import mysql.connector

def codeforces(name,handel):
	
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="",
	  database="dairy"
	)
	verdict= dict()
	
	verdict['OK']='Accepted'
	verdict['PARTIAL']='Partial'
	verdict['TIME_LIMIT_EXCEEDED']='Time Limit Exceeded'
	verdict['WRONG_ANSWER']='Wrong Answer'
	verdict['RUNTIME_ERROR']='Runtime Error'
	verdict['COMPILATION_ERROR']='Compilation Error'
	verdict['MEMORY_LIMIT_EXCEEDED']='Memory Limit Exceeded'
	verdict['CHALLENGED']='Hacked'
	verdict['SKIPPED']='Skipped'
	verdict['PARTIAL']='Partial'
	
	
	mycursor = mydb.cursor()
	url="https://codeforces.com/api/user.status?handle="+handel
	json_url = urllib.request.urlopen(url)
	json_data = json.loads(json_url.read())
	if(json_data['status']!="OK"):
		return
	a = json_data["result"]
	cnt=0
	for row in a:
		vid=row['id']
		cnt+=1;
		ver=verdict[(str)(row['verdict'])]
		time=row['creationTimeSeconds']
		pname=row['problem']['name']
		conid=row['problem']['contestId']
		pindex=row['problem']['index']
		link="https://codeforces.com/contest/"+(str)(conid)+"/problem/"+(str)(pindex)
		sql1="SELECT * FROM "+(str)(name)+" WHERE subid="+(str)(vid)+" AND oj='cf'"
		mycursor.execute(sql1)
		myresult = mycursor.fetchall()
		if(len(myresult)==0):
			sql="INSERT INTO "+name+" (subid,dt,link,name,ver,oj) VALUES (%s,%s,%s,%s,%s,'cf')"
			val=(vid,time,link,pname,ver)
			mycursor.execute(sql, val)
			mydb.commit()
		else:
			break
	print(handel)
	return
