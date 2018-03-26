import os
from time import sleep
from twilio.rest import Client
msg="The place is vacant you are ready to go. Go an enjoy your day at that place"
account_sid = "AC5adda6db593a0f369a427283c8436959"
auth_token = "fc647306d1cd37646ac0f1f23c55e612"
client = Client(account_sid, auth_token)
client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg)
print("Message Sent")
                
