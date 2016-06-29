<?php

$agent=getenv("HTTP_USER_AGENT");
$ip=$_SERVER[REMOTE_ADDR];

$agent=trim($agent);
// trim — Strip whitespace (or other characters) from the beginning and end of a string

$agent=str_replace(".", "_", $agent);
$agent=str_replace("/", "_", $agent);
// replace . & /

$pat="/\/|\*|union|char|ascii|select|out|infor|schema|columns|sub|-|\+|\||!|update|del|drop|from|where|order|by|asc|desc|lv|board|\([0-9]|sys|pass|\.|like|and|\'\'|sub/";

$agent=strtolower($agent);

if (preg_match($pat, $agent)) {
    exit("Access Denied!");
}
// 注入检测，需要注意关键的'\'', ',', '#'没有被检测

$_SERVER[HTTP_USER_AGENT]=str_replace("'", "", $_SERVER[HTTP_USER_AGENT]);
$_SERVER[HTTP_USER_AGENT]=str_replace("\"", "", $_SERVER[HTTP_USER_AGENT]);
// 替换掉了 ' 和 "

$count_ck=@mysql_fetch_array(mysql_query("select count(id) from lv0"));
if ($count_ck[0]>=70) {
    @mysql_query("delete from lv0");
}
// 循环计数

$q=@mysql_query("select id from lv0 where agent='$_SERVER[HTTP_USER_AGENT]'");
// 从数据库中找出当前 agent 的 id

$ck=@mysql_fetch_array($q);
// 找出该 id 的记录

if ($ck) {
    echo("hi <b>$ck[0]</b><p>");
    if ($ck[0]=="admin") {
        @solve();
        @mysql_query("delete from lv0");
    }
}
// 如果查询成功且为 admin 则解决

if (!$ck) {
    $q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");
    echo("<br><br>done!  ($count_ck[0]/70)");
}
// 如果查询失败则插入权限为 guest 的记录
// 此处 agent 是可控的，而且没有针对 ''', ',', '#' 进行防护
