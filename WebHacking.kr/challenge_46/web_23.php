<?php

$_GET[lv]=str_replace(" ", "", $_GET[lv]);
$_GET[lv]=str_replace("/", "", $_GET[lv]);
$_GET[lv]=str_replace("*", "", $_GET[lv]);
$_GET[lv]=str_replace("%", "", $_GET[lv]);

if (eregi("union", $_GET[lv])) {
    exit();
}
if (eregi("select", $_GET[lv])) {
    exit();
}
if (eregi("from", $_GET[lv])) {
    exit();
}
if (eregi("challenge", $_GET[lv])) {
    exit();
}
if (eregi("0x", $_GET[lv])) {
    exit();
}
if (eregi("limit", $_GET[lv])) {
    exit();
}
if (eregi("cash", $_GET[lv])) {
    exit();
}

$q=@mysql_fetch_array(mysql_query("select id,cash from members where lv=$_GET[lv]"));

if ($q && $_GET[lv]) {
    echo("$q[0] information<br><br>money : $q[1]");

    if ($q[0]=="admin") {
        @solve();
    }
}
