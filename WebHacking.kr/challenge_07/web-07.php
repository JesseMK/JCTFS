<?php
$answer = "????";

$go=$_GET[val];

if (!$go) {
    echo("<meta http-equiv=refresh content=0;url=index.php?val=1>");
}

$ck=$go;

$ck=str_replace("*", "", $ck);
$ck=str_replace("/", "", $ck);


echo("<html><head><title>admin page</title></head><body bgcolor='black'><font size=2 color=gray><b><h3>Admin page</h3></b><p>");


if (eregi("--|2|50|\+|substring|from|infor|mation|lv|%20|=|!|<>|sysM|and|or|table|column", $ck)) {
    exit("Access Denied!");
}

if (eregi(' ', $ck)) {
    echo('cannot use space');
    exit();
}

$rand=rand(1, 5);

if ($rand==1) {
    $result=@mysql_query("select lv from lv1 where lv=($go)") or die("nice try!");
}

if ($rand==2) {
    $result=@mysql_query("select lv from lv1 where lv=(($go))") or die("nice try!");
}

if ($rand==3) {
    $result=@mysql_query("select lv from lv1 where lv=((($go)))") or die("nice try!");
}

if ($rand==4) {
    $result=@mysql_query("select lv from lv1 where lv=(((($go))))") or die("nice try!");
}

if ($rand==5) {
    $result=@mysql_query("select lv from lv1 where lv=((((($go)))))") or die("nice try!");
}

$data=mysql_fetch_array($result);
if (!$data[0]) {
    echo("query error");
    exit();
}
if ($data[0]!=1 && $data[0]!=2) {
    exit();
}


if ($data[0]==1) {
    echo("<input type=button style=border:0;bgcolor='gray' value='auth' onclick=
alert('Access_Denied!')><p>");
    echo("<!-- admin mode : val=2 -->");
}

if ($data[0]==2) {
    echo("<input type=button style=border:0;bgcolor='gray' value='auth' onclick=
alert('Congratulation')><p>");
    @solve();
}
