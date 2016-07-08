<?php
if ($_GET[no]) {
    if (eregi("#|union|from|challenge|select|\(|\t|/|limit|=|0x", $_GET[no])) {
        exit("no hack");
    }

    $q=@mysql_fetch_array(mysql_query("select id from challenge27_table where id='guest' and no=(3) or no like 2 --+)")) or die("query error");

    if ($q[id]=="guest") {
        echo("guest");
    }
    if ($q[id]=="admin") {
        @solve();
    }
}
