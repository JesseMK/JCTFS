import requests

url = 'http://webhacking.kr/challenge/codeing/code5.html'
payload = 'hit=JesseMK'


def vote():
    try:
        r = requests.get(url, params=payload, cookies={
                         'PHPSESSID': ''})

    except Exception as e:
        print e
        # return e

for i in range(100):
    vote()
