<html>
<head>
<title>Challenge 8</title>
<style type="text/css">
body { background:black; color:white; font-size:10pt; }
</style>
</head>
<body>
<br><br>
<center>USER-AGENT

<?php

$agent=getenv("HTTP_USER_AGENT");
$ip=$_SERVER[REMOTE_ADDR];

$agent=trim($agent);

$agent=str_replace(".", "_", $agent);
$agent=str_replace("/", "_", $agent);

$pat="/\/|\*|union|char|ascii|select|out|infor|schema|columns|sub|-|\+|\||!|update|del|drop|from|where|order|by|asc|desc|lv|board|\([0-9]|sys|pass|\.|like|and|\'\'|sub/";

$agent=strtolower($agent);

if (preg_match($pat, $agent)) {
    exit("Access Denied!");
}

$_SERVER[HTTP_USER_AGENT]=str_replace("'", "", $_SERVER[HTTP_USER_AGENT]);
$_SERVER[HTTP_USER_AGENT]=str_replace("\"", "", $_SERVER[HTTP_USER_AGENT]);

$count_ck=@mysql_fetch_array(mysql_query("select count(id) from lv0"));
if ($count_ck[0]>=70) {
    @mysql_query("delete from lv0");
}


$q=@mysql_query("select id from lv0 where agent='$_SERVER[HTTP_USER_AGENT]'");

$ck=@mysql_fetch_array($q);

if ($ck) {
    echo("hi <b>$ck[0]</b><p>");
    if ($ck[0]=="admin") {
        @solve();
        @mysql_query("delete from lv0");
    }
}

if (!$ck) {
    $q=@mysql_query("insert into lv0(agent,ip,id) values('$agent','$ip','guest')") or die("query error");
    echo("<br><br>done!  ($count_ck[0]/70)");
}


?>

<!--

index.phps

-->

</body>
</html>
