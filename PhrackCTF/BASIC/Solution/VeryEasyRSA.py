import math

p = 3487583947589437589237958723892346254777
q = 8767867843568934765983476584376578389
e = 65537

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
