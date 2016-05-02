# Phrack CTF BASE
[phrack CTF 2016][c9822f33]

[TOC]

## 测试题
**感谢DG421138355及倬子两位的解题思路分享！**

1. base64？[编码]

    ```
    GUYDIMZVGQ2DMN3CGRQTONJXGM3TINLGG42DGMZXGM3TINLGGY4DGNBXGYZTGNLGGY3DGNBWMU3WI===
    ```

    - 题目是Base64？，然而根据base64算法编码串末尾只会有一到两个`=`，故可能是base32编码，尝试之，得解orz（~~我会说我自己写了一个类似于Base64的算法然后不是前两位加0而是后两位加0之后解密发现还是不对吗！！！~~）
    - [Base32 decoder][6bdb3a2e]
    - [Hexadecimal -> ASCII][c6610975]
    - `PCTF{Just_t3st_h4v3_f4n}`
    - [关于base64算法][e7a2fac9]


2. 关于USS Lab[额]

    ```
    USS的英文全称是什么，请全部小写并使用下划线连接_，并在外面加上PCTF{}之后提交
    ```
    - ~~百度~~之后~~随手~~填上去了，具体是什么已经忘了orz
    - 好吧想起来并不是百度的[~~因为再次百度没有搜到~~orz]，答案在第六题23333

3. veryeasy[额]

    ```
    使用基本命令获取flag
    ```
    [veryeasy.d944f0e9f8d5fe5b358930023da97d1a](https://ctf.phrack.top/upload/veryeasy.d944f0e9f8d5fe5b358930023da97d1a)

    - 基本命令，so control+F ~~orz~~
    - `PCTF{strings_i5_3asy_isnt_i7}`

4. 段子[编码]

    ```
    程序猿圈子里有个非常著名的段子：
    手持两把锟斤拷，口中疾呼烫烫烫。
    请提交其中"锟斤拷"的十六进制编码。(大写)
    FLAG: PCTF{你的答案}
    ```

    > 锟斤拷，是一串经常在搜索引擎页面和其他网站上看到的乱码字符。乱码源于GBK字符集和Unicode字符集之间的转换问题。

    - 锟斤拷——锟(0xEFBF)，斤（0xBDEF），拷（0xBFBD）
    - `PCTF{EFBFBDEFBEBD}`

5. 手贱[额]

    ```
    某天A君的网站被日，管理员密码被改，死活登不上，去数据库一看，啥，这密码md5不是和原来一样吗？为啥登不上咧？
    d78b6f302l25cdc811adfe8d4e7c9fd34
    请提交PCTF{原来的管理员密码}
    ```

    - ~~不知道这题是该叫手残还是眼瞎~~ orz
    - ~~眼动~~恢复原md5:  `d78b6f30225cdc811adfe8d4e7c9fd34`
    - [MD5](http://www.cmd5.com/)
    - `PCTF{hack}`

6. 美丽的实验室logo[隐写]

    ```
    出题人丢下个logo就走了，大家自己看着办吧
    ```
    [logo.jpg.8244d3d060e9806accc508ec689fabfb](https://ctf.phrack.top/upload/logo.jpg.8244d3d060e9806accc508ec689fabfb)

    - 最简单的隐写类型，十六进制编辑器（如winHex）打开后直接查找jpg文件头和jpg文件尾，发现是两幅图片的拼接，拆分后找到~~鼓舞人心的~~flag
    - `PCTF{You_are_R3ally_Car3ful}`
    - More about 隐写：[隐写术总结][8aba9e34]

7. veryeasyRSA[密码]

    -
    ```
    import math

    p = 3487583947589437589237958723892346254777
    q = 8767867843568934765983476584376578389
    e = 65537

    n =p*q
    thn = (p-1)*(q-1)

    x = 1
    while(1>0):
        m = (x*thn + 1) % e
        if (m == 0):
            d = (x*thn + 1) / e
            print 'd=', d
            break
        else:
            # print x
            x += 1

    ```

    - RSA 算法
    > RSA的算法涉及三个参数，n、e1、e2。

    > n是两个大质数p、q的积，n的二进制表示时所占用的位数，就是所谓的密钥长度。

    > e1和e2是一对相关的值，e1可以任意取，但要求e1与(p-1)*(q-1)互质；再选择e2，要求(e2*e1)mod((p-1)*(q-1))=1。

    > （n，e1),(n，e2)就是密钥对。其中(n，e1)为公钥，(n，e2)为私钥。
    > (1)选择两个不同的大素数p和q；
    (2)计算乘积n=pq和Φ(n)=(p-1)(q-1)；
    (3)选择大于1小于Φ(n)的随机整数e，使得gcd(e,Φ(n))=1；
    (4)计算d使得de=1mod Φ(n)；
    (5)对每一个密钥k=(n,p,q,d,e)，定义加密变换为Ek(x)=xemodn，解密变换为Dk(x)=ydmodn，这里x,y∈Zn；
    (6)以{e,n}为公开密钥，{p,q,d}为私有密钥。

8. 神秘的文件[逆向]

9. 公倍数[数学..好吧应该是算法题]

10. Easy Crackme[逆向]

  [c9822f33]: https://ctf.phrack.top "phrack CTF 2016"
  [6bdb3a2e]: http://tomeko.net/online_tools/base32.php?lang=en "Base32 decoder"
  [c6610975]: http://tomeko.net/online_tools/hex_to_ascii.php?lang=en "Hexadecimal to ASCII converter"
  [8aba9e34]: http://drops.wooyun.org/tips/4862 "隐写术总结"
  [e7a2fac9]: http://base64.xpcha.com/ "Base64编码/解码"
