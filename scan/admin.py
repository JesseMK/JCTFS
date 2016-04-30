import requests

dictadmin = open('MyDictAdmin.txt','r')
site='http://infosec.sjtu.edu.cn'
for line in dictadmin:
    line=line[0:-1]
    r=requests.get(site+'/'+line)
    break
html=r.text
print html
for line in dictadmin:
    line=line[0:-1]
    url=site+'/'+line
    r=requests.get(url)
    htm=r.text
    if htm<>html:
        print url
        #print htm
dictadmin = open('phpdict.txt','r')
for line in dictadmin:
    line=line[0:-1]
    url=site+'/'+line
    r=requests.get(url)
    htm=r.text
    if htm<>html:
        print url
        #print htm
dictadmin = open('SearchPage.txt','r')
for line in dictadmin:
    line=line[0:-1]
    url=site+'/'+line
    r=requests.get(url)
    htm=r.text
    if htm<>html:
        print url
        #print htm
print 'Done'