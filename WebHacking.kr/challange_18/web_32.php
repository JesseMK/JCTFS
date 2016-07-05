<?php
if ($_GET[no]) {
    if (eregi(" |/|\(|\)|\t|\||&|union|select|from|0x", $_GET[no])) {
        exit("no hack");
    }

    $q=@mysql_fetch_array(mysql_query("select id from challenge18_table where id='guest' and no=$_GET[no]"));

    if ($q[0]=="guest") {
        echo("hi guest");
    }
    if ($q[0]=="admin") {
        @solve();
        echo("hi admin!");
    }
}
