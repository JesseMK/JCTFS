import requests
import urllib
import re

# _1=0&_2=0&_3=0&_4=0&_5=0&_6=1&_7=1&_8=0&_9=0&_10=0&_11=0&_12=0&_13=0&_14=0&_15=0&_16=0&_17=0&_18=0&_19=0&_20=0&_21=0&_22=0&_23=0&_24=0&_25=0&_answer=0000011000000000000000000

url = 'http://webhacking.kr/challenge/web/web-03/index.php?'
payload = {}
MAXBIN = ''

for i in range(1, 26):
    MAXBIN = MAXBIN + '1'
    # payload['_' + str(i)] = 0

# payload['_answer'] = 0

# print payload

answer = ''

for i in range(1, 26):
    payload['_' + str(i)] = 0
    answer = answer + 0

for i in range(1, 26):
    payload['_' + str(i)] = 1
    answer[i - 1] = '1'

# for i in range( int( MAXBIN, 2 ) ):
#
#     num = i
#     answer = ''
#
#     for j in range(1, 26):
#         payload['_' + str(j)] = num % 2
#         answer += num % 2
#         num = num / 2
#
#     payload['_answer'] = bin(answer)
#
#     # print payload

    try:
        r = requests.get(url, params=payload, cookies={'PHPSESSID': ''})
        # print i, ': ', r.text
        if r.text.find('No!') == 0:
            print 'Succeed @ ', i
            print payload
            break
        print 'No @ ', i

    except Exception as e:
        print e
