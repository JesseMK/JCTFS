# collision
- Re
- Key login:
    - `hashcode == check_password( argv[1] )`
    - `int* ip = (int*)p;`
- Things to know:
    - 4 bytes = 1 int (20 bytes = 5 int)
- EXP:
    - ``` ./col `python -c "print '\xc8\xce\xc5\x06' * 4 + '\xcc\xce\xc5\x06'"` ```
    - `./col $(python -c 'print "\xE8\x05\xD9\x1D" + 16*"\x01"')`
