total = 2147483647
price = [1999, 6990, 6088, 6988, 14288, 9288]
# for a in range(1, 1 + (total) / price[0]):
#     for b in range(1, 1 + (total - a * price[0]) / price[1]):
#         for c in range(1, 1 + (total - a * price[0] - b * price[1]) / price[2]):
#             for d in range(1, 1 + (total - a * price[0] - b * price[1] - c * price[2]) / price[3]):
#                 for e in range(1, 1 + (total - a * price[0] - b * price[1] - c * price[2] - d * price[3]) / price[4]):
#                     for f in range(1, 1 + (total - a * price[0] - b * price[1] - c * price[2] - d * price[3] - e * price[4]) / price[5]):
#                         if (total - a * price[0] - b * price[1] - c * price[2] - d * price[3] - e * price[4] - f * price[5] == 1):
#                             print a, b, c, d, e, f

num = 0
for p in price:
    num += p
print num
print total - num*
