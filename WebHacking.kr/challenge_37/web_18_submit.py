import requests

url = 'http://webhacking.kr/index.php?mode=auth'

payload = 'answer=8ae39d3a32c9d3c03efd93a544e11974'
header = {'Host': 'webhacking.kr',
          'Content-Length': '11',
          'Cache-Control': 'max-age=0',
          'Origin': 'http://webhacking.kr',
          'Upgrade-Insecure-Requests': '1',
          'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36',
          'Content-Type': 'application/x-www-form-urlencoded',
          'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
          'Referer': 'http://webhacking.kr/index.php?mode=auth',
          'Accept-Encoding': 'gzip, deflate',
          'Accept-Language': '/'}
cookie = {'oldzombie': '1',
          'PHPSESSID': 'j6k6d9kk796b64bh43ng6mtej5'}

try:
    r = requests.post(url, data=payload, headers=header, cookies=cookie)
    print r.content
    print 'Wrong!' in r.content
except Exception as e:
    print e
#    return e
