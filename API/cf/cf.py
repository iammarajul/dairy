import urllib.request, json

verdict= dict()

verdict['OK']='Accepted'
verdict['TIME_LIMIT_EXCEEDED']='Time Limit Exceeded'
verdict['WRONG_ANSWER']='Wrong Answer'
verdict['RUNTIME_ERROR']='Runtime Error'
verdict['COMPILATION_ERROR']='Compilation Error'
verdict['MEMORY_LIMIT_EXCEEDED']='Memory Limit Exceeded'
verdict['CHALLENGED']='Hacked'
verdict['SKIPPED']='Skipped'

handle='.marajul.'
url="https://codeforces.com/api/user.status?handle="+handle
json_url = urllib.request.urlopen(url)
json_data = json.loads(json_url.read())

a = json_data["result"]
cnt=0
for row in a:
	vid=row['id']
	cnt+=1;
	ver=verdict[(str)(row['verdict'])]
	time=row['creationTimeSeconds']
	# print(ver)
	pname=row['problem']['name']
	# print(pname)
	conid=row['problem']['contestId']
	pindex=row['problem']['index']
	print(pname)
	print(ver)
print(cnt)