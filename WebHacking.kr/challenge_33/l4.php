<hr>
Challenge 33-4<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_GET[password]==md5(time())) {
    echo("<a href=###>Next</a>");
} else {
    echo("hint : ".time());
}
?>
