import hashpumpy
import requests
import re
from urllib import quote

original_data = 's%3A5%3A%22guest%22%3B'
original_hash = '3a4727d57463f122833d9e732f94e4e0'
append_data = 's%3A5%3A%22admin%22%3B'

for i in range(32):
    hexdigest = original_hash.encode('hex')    # hexdigest(str):      Hex-encoded result of hashing key + original_data.
    original_data = original_data              # original_data(str):  Known data used to get the hash result hexdigest.
    data_to_add = append_data                  # data_to_add(str):    Data to append
    key_length = i                             # key_length(int):     Length of unknown data prepended to the hash
    # hashpump(hexdigest, original_data, data_to_add, key_length) -> (digest, message)
