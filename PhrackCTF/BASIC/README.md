# Phrack CTF BASIC

## 测试题
1. base64？[编码]

    > GUYDIMZVGQ2DMN3CGRQTONJXGM3TINLGG42DGMZXGM3TINLGGY4DGNBXGYZTGNLGGY3DGNBWMU3WI===

    - 题目是Base64？，然而根据base64算法编码串末尾只会有一到两个`=`，故可能是base32编码，尝试之，得解orz（ ~~我会说我自己写了一个类似于Base64的算法然后不是前两位加0而是后两位加0之后解密发现还是不对吗！！！~~ ）
    - [Base32 decoder][6bdb3a2e]
    - [Hexadecimal -> ASCII][c6610975]
    - `PCTF{Just_t3st_h4v3_f4n}`
    - [关于base64算法][e7a2fac9]


2. 关于USS Lab[额]

    > USS的英文全称是什么，请全部小写并使用下划线连接_，并在外面加上PCTF{}之后提交

    - ~~百度~~ 之后 ~~随手~~ 填上去了，具体是什么已经忘了orz
    - 好吧想起来并不是百度的[ ~~因为再次百度没有搜到~~ orz]，答案在第六题23333

3. veryeasy[额]

    > 使用基本命令获取flag

    [veryeasy.d944f0e9f8d5fe5b358930023da97d1a](https://ctf.phrack.top/upload/veryeasy.d944f0e9f8d5fe5b358930023da97d1a)

    - 基本命令，so control+F ~~orz~~
    - `PCTF{strings_i5_3asy_isnt_i7}`

4. 段子[编码]

    > 程序猿圈子里有个非常著名的段子：
    > 手持两把锟斤拷，口中疾呼烫烫烫。
    > 请提交其中"锟斤拷"的十六进制编码。(大写)
    > FLAG: PCTF{你的答案}

    - 锟斤拷，是一串经常在搜索引擎页面和其他网站上看到的乱码字符。乱码源于GBK字符集和Unicode字符集之间的转换问题。

    - 锟斤拷——锟(0xEFBF)，斤（0xBDEF），拷（0xBFBD）
    - `PCTF{EFBFBDEFBEBD}`

5. 手贱[额]

    >某天A君的网站被日，管理员密码被改，死活登不上，去数据库一看，啥，这密码md5不是和原来一样吗？为啥登不上咧？
    > d78b6f302l25cdc811adfe8d4e7c9fd34
    > 请提交PCTF{原来的管理员密码}

    - ~~不知道这题是该叫手残还是眼瞎~~ orz
    - ~~眼动~~ 恢复原md5:`d78b6f30225cdc811adfe8d4e7c9fd34`
    - [MD5](http://www.cmd5.com/)
    - `PCTF{hack}`

6. 美丽的实验室logo[隐写]

    > 出题人丢下个logo就走了，大家自己看着办吧

    [logo.jpg.8244d3d060e9806accc508ec689fabfb](https://ctf.phrack.top/upload/logo.jpg.8244d3d060e9806accc508ec689fabfb)

    - 最简单的隐写类型，十六进制编辑器（如winHex）打开后直接查找jpg文件头和jpg文件尾，发现是两幅图片的拼接，拆分后找到 ~~鼓舞人心的~~ flag
    - `PCTF{You_are_R3ally_Car3ful}`
    - More about 隐写：[隐写术总结][8aba9e34]

7. veryeasyRSA[密码]

    > 已知RSA公钥生成参数：
    > p = 3487583947589437589237958723892346254777 q = 8767867843568934765983476584376578389
    > e = 65537
    > 求d

    - RSA 简介
        - RSA的算法涉及三个参数，n、e1、e2。
        - n是两个大质数p、q的积，n的二进制表示时所占用的位数，就是所谓的密钥长度。
        - e和e是一对相关的值，e可以任意取，但要求e与 $(p-1)*(q-1)$ 互质；再选择d，要求 $(e*d)mod((p-1)*(q-1))=1$ 。
    - RSA算法
        1. 选择两个不同的大素数p和q；
        2. 计算乘积 $n=p*q$ 和 $Φ(n)=(p-1)(q-1)$ ；
        3. 选择大于1小于Φ(n)的随机整数e，使得 $gcd(e,Φ(n))=1$ ；
        4. 计算d使得 $d*e = 1 mod Φ(n)$ ；
        5. 对每一个密钥 $k=(n,p,q,d,e)$ ，定义加密变换为 $Ek(x)=x*e mod n$ ，解密变换为 $Dk(x)=y*d mod n$ ，这里 $x,y∈Zn$；
        6. 以{e,n}为公开密钥，{p,q,d}为私有密钥。
    - [解题代码](./Solution/VeryEasyRSA.py)

8. 神秘的文件[逆向]

9. 公倍数[数学..好吧应该是算法题]
    > 请计算1000000000以内3或5的倍数之和。
    > 如：10以为这样的数有3,5,6,9，和是23
    > 请提交PCTF{你的答案}

    - [解题代码](./Solution/CommonMultiple.py)

10. Easy Crackme[逆向]


## 正式题

11. Secret[签到题]
    > Can you find the Secret?

    - 观察HTTP头发现多了一项`secret`的参数，内容即为flag
    - `PCTF{Welcome_to_phrackCTF_2016}`

12. 爱吃培根的出题人
    > bacoN is one of aMerICa'S sWEethEartS. it's A dARlinG, SuCCulEnt fOoD tHAt PaIRs FlawLE

    - 取出大写字母`NMICS/WEESA/ARGSC/CEODH/APIRF/LE`

13. Easy RSA
    > 还记得veryeasy RSA吗？是不是不难？那继续来看看这题吧，这题也不难。
    > 已知一段RSA加密的信息为：0xdc2eeeb2782c且已知加密所用的公钥：
    > (N=322831561921859 e = 23)
    > 请解密出明文，提交时请将数字转化为ascii码提交
    > 比如你解出的明文是0x6162，那么请提交字符串ab
    > 提交格式:PCTF{明文字符串}


14. ROPGadget

15. 取证

16. 熟悉的声音
    > 两种不同的元素，如果是声音的话，听起来是不是很熟悉呢，据说前不久神盾局某位特工领便当了大家都很惋惜哦
    > XYYY YXXX XYXX XXY XYY X XYY YX YYXX
    > 请提交PCTF{你的答案}

    - 摩尔斯电码
        ```
        XYYY YXXX XYXX XXY XYY X XYY YX YYXX
        -@@@ @--- -@-- --@ -@@ - -@@ @- @@--
        b    j    y    g   d   t d   a  ü
        @--- -@@@ @-@@ @@- @-- @ @-- -@ --@@
        j    b    l    u   w   e w   n  z
        ```

        ```
        yq{giti}l
        y  q  {
         g  i  t i } l


        {s}ikvkbn
        {  s  }
         i  k  v
          k  b  n

        ```

17. Baby's Crack

18. Help!!
    - 第八个字节的最后一位为0 -> 未加密，使用 **7-zip** 解压
    - 解压zip -> 打开word文件，发现内含一张图片，用16进制编辑器打开，发现应该是有两张imag
    - 解压docx -> 找到word/media下的图片
        - **word文件本质是压缩文件**
    - `PCTF{You_Know_moR3_4boUt_woRd}`

19. Shellcode
    - IDA

20. A Piece Of Cake
    > nit yqmg mqrqn bxw mtjtm nq rqni fiklvbxu mqrqnl xwg dvmnzxu lqjnyxmt xatwnl, rzn nit uxnntm xmt zlzxuuk mtjtmmtg nq xl rqnl. nitmt vl wq bqwltwlzl qw yivbi exbivwtl pzxuvjk xl mqrqnl rzn nitmt vl atwtmxu xamttetwn xeqwa tsftmnl, xwg nit fzruvb, nixn mqrqnl ntwg nq gq lqet qm xuu qj nit jquuqyvwa: xbbtfn tutbnmqwvb fmqamxeevwa, fmqbtll gxnx qm fiklvbxu ftmbtfnvqwl tutbnmqwvbxuuk, qftmxnt xznqwqeqzluk nq lqet gtamtt, eqdt xmqzwg, qftmxnt fiklvbxu fxmnl qj vnltuj qm fiklvbxu fmqbtlltl, ltwlt xwg exwvfzuxnt nitvm twdvmqwetwn, xwg tsivrvn vwntuuvatwn rtixdvqm - tlftbvxuuk rtixdvqm yivbi evevbl izexwl qm qnitm xwvexul. juxa vl lzrlnvnzntfxllvldtmktxlkkqzaqnvn. buqltuk mtuxntg nq nit bqwbtfn qj x mqrqn vl nit jvtug qj lkwnitnvb rvquqak, yivbi lnzgvtl twnvnvtl yiqlt wxnzmt vl eqmt bqefxmxrut nq rtvwal nixw nq exbivwtl.

    -

  [6bdb3a2e]: http://tomeko.net/online_tools/base32.php?lang=en "Base32 decoder"
  [c6610975]: http://tomeko.net/online_tools/hex_to_ascii.php?lang=en "Hexadecimal to ASCII converter"
  [8aba9e34]: http://drops.wooyun.org/tips/4862 "隐写术总结"
  [e7a2fac9]: http://base64.xpcha.com/ "Base64编码/解码"
