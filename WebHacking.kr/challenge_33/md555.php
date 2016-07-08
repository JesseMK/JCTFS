<hr>
Challenge 33-5<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_GET[imget] && $_POST[impost] && $_COOKIE[imcookie]) {
    echo("<a href=###>Next</a>");
} else {
    echo("Wrong");
}
?>
