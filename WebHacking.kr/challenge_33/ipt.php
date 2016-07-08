<hr>
Challenge 33-8<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

extract($_GET);

if (!$_GET[addr]) {
    $addr=$_SERVER[REMOTE_ADDR];
}

if ($addr=="127.0.0.1") {
    echo("<a href=###>Next</a>");
} else {
    echo("Wrong");
}
?>
