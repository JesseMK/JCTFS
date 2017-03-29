c = 'sjoyuxzr'
m = ''

for j in range(len(c)):
    for i in range(26):
        ci = (11 * i + 8) % 26;
        if (chr(ci + ord('a')) == c[j]):
            m = m + chr(i + ord('a'))

print m
# itksuzlp
