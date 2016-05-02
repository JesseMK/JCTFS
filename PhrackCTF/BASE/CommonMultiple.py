import math

MaxNum = 1000000000
MaxTre = MaxNum / 3 + 1
MaxFiv = MaxNum / 5

ans = 0

for i in xrange(MaxFiv):
    ans += 5*i
    # print 5*i

print "part 1 done"

for i in xrange(MaxTre):
    if (i % 5 != 0):
        ans += 3*i
        # print 3*i
        # print i

print ans
# 233333333166666668
