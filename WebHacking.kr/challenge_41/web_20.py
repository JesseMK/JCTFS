import zipfile

zf = zipfile.ZipFile('test.zip')
i = 0
while 1:
    try:
        data = zf.read("readme.txt", str(i))
    except:
        print '[*] Password is not - [' + str(i) + ']'
    else:
        print '[*] Find It!!! Password is  - [' + str(i) + ']'
        print repr(data)
        break
    i += 1
