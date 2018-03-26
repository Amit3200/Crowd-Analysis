import matplotlib.pyplot as plt
import MySQLdb
import matplotlib
import datetime
import time
import pandas as pd
fig = plt.figure()
db=MySQLdb.connect(host="localhost",user="root",password="amit",db="piathon")
cur=db.cursor()
query="select RequestedDate,people,Status from requestsf";
cur.execute(query)
x=[]
y=[]
z=[]
for row in cur:
    print(row)
    x.append(row[0])
    y.append(row[1])
    z.append(row[2])
d=[]
now = datetime.datetime.now()
for i in x:
    seconds = time.mktime(now.timetuple())
    d.append(seconds//(60**4))
t=range(0,len(y))
create={'Time':d,'People':y,'Slots':z}
plt.bar(t,y)
plt.xlabel("Hours")
plt.ylabel("Crowd")
plt.title("Crowd v/s Time")
df=pd.DataFrame(create)
ax=df.plot(kind='line',title="Crowd v/s Time")
ax.set_xlabel("Time")
ax.set_ylabel("Crowd")
fig = ax.get_figure()
fig.savefig("output.png")
print(d)
plt.plot(z,d)
plt.draw()
plt.savefig('data1.png')
plt.show()
