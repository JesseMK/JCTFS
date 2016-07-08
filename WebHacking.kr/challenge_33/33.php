<hr>
Challenge 33-3<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_GET[myip]==$_SERVER[REMOTE_ADDR]) {
    echo("<a href=##.php>Next</a>");
} else {
    echo("Wrong");
}
?>
