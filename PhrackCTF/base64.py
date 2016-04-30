import math

def base64table(char):
    # print ord('1')
    # print ord('A')

    if (char == '='):
        return 0

    if (ord(char) >= ord('A')):
        return ord(char) - ord('A')

    return ord(char) - ord('1') + 53

def dec2bin(num):
    mid = []
    bin = ''

    for i in range(8):
        mid = num % 2
        num = num / 2
        bin = bin + str(mid)

    # return bin[0:6]
    return bin[:-2]

def  restructure(code4):
    code3 = []
    code = ''

    for i in code4:
        code = code + i

    for i in range(3):
        code3.append(code[i*8:i*8+8])

    print code4, code, code3

    return code3

def decode(word):
    ascii = 0
    for i in range(len(word)):
        ascii = ascii + int(word[i])*pow(2, 7 - i)
    return chr(ascii)


str1 = 'GUYDIMZVGQ2DMN3CGRQTONJXGM3TINLGG42DGMZXGM3TINLGGY4DGNBXGYZTGNLGGY3DGNBWMU3WI'
# value = []
valuebin = []
wordhex = []
str2 = ''

for ch in str1:
    valuebin.append( dec2bin( base64table( ch ) ) )

# print valuebin

for i in range(len(valuebin) / 4):
    wordhex.append( restructure(valuebin[i:i+4])[0] )
    wordhex.append( restructure(valuebin[i:i+4])[1] )
    wordhex.append( restructure(valuebin[i:i+4])[2] )

# print wordhex

for word in wordhex:
    str2 = str2 + decode(word)

print str2
