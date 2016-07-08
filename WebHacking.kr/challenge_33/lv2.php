<hr>
Challenge 33-2<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

if ($_POST[post]=="hehe" && $_POST[post2]=="hehe2") {
    echo("<a href=##>Next</a>");
} else {
    echo("Wrong");
}
?>
