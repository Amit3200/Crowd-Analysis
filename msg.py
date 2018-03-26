import os
from time import sleep
from twilio.rest import Client
msg="According to our analysis the place is crowded and you should not move to that place in current timeslot."
account_sid = "AC5adda6db593a0f369a427283c8436959"
auth_token = "fc647306d1cd37646ac0f1f23c55e612"
client = Client(account_sid, auth_token)
client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg)
msg2="We recommend you to move in some other time slot. Message by Crowd Analysis"
sleep(1)
client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg2)
print("Message Sent")
                
