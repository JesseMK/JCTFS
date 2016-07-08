import socket
# import sys

HOST = '192.168.3.228'
PORT = 10050
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((HOST, PORT))
s.listen(1)
conn, addr = s.accept()
print 'Connected by', addr
while 1:
    data = conn.recv(1024)
    if not data:
        break
    print data
conn.close()
