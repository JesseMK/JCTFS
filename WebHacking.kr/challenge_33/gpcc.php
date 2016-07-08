<hr>
Challenge 33-6<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_COOKIE[test]==md5("$_SERVER[REMOTE_ADDR]") && $_POST[kk]==md5("$_SERVER[HTTP_USER_AGENT]")) {
    echo("<a href=###>Next</a>");
} else {
    echo("hint : $_SERVER[HTTP_USER_AGENT]");
}
?>
