<hr>
Challenge 33-1<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_GET[get]=="hehe") {
    echo("<a href=###>Next</a>");
} else {
    echo("Wrong");
}
?>
