import math
'''
number = int(raw_input("Enter a number: "))

list = []

def getChildren(num):
    print '*'*30
    isZhishu = True
    for i in range(2, int(math.sqrt(1 + num)) + 1):
        if num % i == 0 and i != num :
            list.append(i)
            isZhishu = False
            getChildren(num / i)
            break

    if isZhishu:
        list.append(num)

getChildren(number)
print list

'''
p = 23781539
q = 13574881
e = 23
n = 322831561921859
'''
n =p*q
thn = (p-1)*(q-1)

x = 1
while(1>0):
    m = (x*thn + 1) % e
    if (m == 0):
        d = (x*thn + 1) / e
        print 'd=', d
        break
    else:
        # print x
        x += 1

'''
d = 42108459725927

encrypt = 242094131279916

print (encrypt * d) % n
