<hr>
Challenge 33-9<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

for ($i=97;$i<=122;$i=$i+2) {
    $ch=chr($i);

    $answer.=$ch;
}

// echo $answer;

if ($_GET[ans]==$answer) {
    echo("<a href=###>Next</a>");
} else {
    echo("Wrong");
}
?>
