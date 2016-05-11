s1 = 'jbluwewnz'
for i in range(26):
    s2 = ''
    for j in range( len(s1) ):
        s2 = s2 + chr((ord(s1[j]) + i - ord('a') ) % 29 + ord('a') )
        # s2 = s2 + chr((ord(s1[j]) + i - ord('a') ) % 26 + ord('a') )
    # if ('{' in s2) & ('}' in s2):
    #     print s2
    print s2

# yq{giti}l
# {s}ikvkbn
