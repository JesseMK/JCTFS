<hr>
Challenge 33-7<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php
$_SERVER[REMOTE_ADDR]=str_replace(".", "", $_SERVER[REMOTE_ADDR]);

if ($_GET[$_SERVER[REMOTE_ADDR]]==$_SERVER[REMOTE_ADDR]) {
    echo("<a href=###>Next</a>");
} else {
    echo("Wrong<br>".$_GET[$_SERVER[REMOTE_ADDR]]);
}
?>
