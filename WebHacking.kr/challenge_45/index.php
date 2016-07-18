<?php
if (time()<1256900400) {
    exit();
}
?>

<!-- index.phps -->

<?php

$pw="?????";

if ($_GET[id] && $_GET[pw]) {
    $_GET[id]=mb_convert_encoding($_GET[id], 'utf-8', 'euc-kr');

    if (eregi("admin", $_GET[id])) {
        exit();
    }
    if (eregi("from", $_GET[id])) {
        exit();
    }
    if (eregi("union", $_GET[id])) {
        exit();
    }
    if (eregi("limit", $_GET[id])) {
        exit();
    }
    if (eregi("union", $_GET[pw])) {
        exit();
    }
    if (eregi("pw", $_GET[pw])) {
        exit();
    }
    if (eregi("=", $_GET[pw])) {
        exit();
    }
    if (eregi(">", $_GET[pw])) {
        exit();
    }
    if (eregi("<", $_GET[pw])) {
        exit();
    }
    if (eregi("from", $_GET[pw])) {
        exit();
    }
    $data=@mysql_fetch_array(mysql_query("select id from members where id='$_GET[id]' and pw=md5('$_GET[pw]')"));
// "select id from members where id='\' and pw=md5(' or if(1,1,1) limit 0,1 -- ')"

    if ($data) {
        echo("hi $data[0]<br><br>");

        if ($data[0]=="admin") {
            @solve();
        }
    }


    if (!$data) {
        echo("Wrong");
    }
}

?>
