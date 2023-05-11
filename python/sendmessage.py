import pywhatkit as whatsapp
import sys as system
from datetime import datetime as dt

hour = 0
minute = 0
# function for getting the hour and minute to send the message
# def gettime():
#     # get the current time
#     now = dt.now()

#     # get the hours and minutes
#     hour = now.hour
#     minute = now.minute + 1

#     # check if the minute is exceeds the next hour
#     if(minute == 60):
#         minute = 0
#         hour = hour + 1

#         # check if the hour exceeds the next day
#         if(hour == 24):
#             hour = 00



# get the current time
now = dt.now()

# get the hours and minutes
hour = now.hour
minute = now.minute + 1

# check if the minute is exceeds the next hour
if(minute == 60):
    minute = 0
    hour = hour + 1

    # check if the hour exceeds the next day
    if(hour == 24):
        hour = 00


# function to send message
def sendmessage(mobile_number, message, hour = 0, minute = 0, senddelay = 10, close = True, closetime = 10):
    whatsapp.sendwhatmsg(mobile_number, message, hour, minute, 10, True, closetime)

# this is the main function gets the argument from the terminal
if __name__ == "__main__":
    my_list = system.argv[1:]
    # if(my_list[1]):
    #     my_list[1] = my_list[1].replace("_"," ")



mobile_number = "+916382868122"
message = "Welocme buddy"
# print(hour," ",minute)
# gettime()
# print(hour)
# print(minute)
whatsapp.sendwhatmsg(mobile_number, message, hour, minute, 10, True, 10)

