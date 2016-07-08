<hr>
Challenge 33-10<br>
<script>document.write("<a href=http://webhacking.kr<?=$_SERVER[PHP_SELF]?>s><?=$_SERVER[PHP_SELF]?>s</a>");</script>
<hr>

<?php

// $ip=$_SERVER[REMOTE_ADDR];
$ip = '202.120.36.179';

for ($i=0;$i<=strlen($ip);$i++) {
    $ip=str_replace($i, ord($i), $ip);
}

$ip=str_replace(".", "", $ip);

$ip=substr($ip, 0, 10);

@mkdir("answerip/$ip");

$answer=$ip*2;
$answer=$ip/2;
$answer=str_replace(".", "", $answer);

// echo $ip.'\n';
// echo $answer;
echo "answerip/$ip/$answer.$ip";
// $pw="###";
//
// $f=fopen("answerip/$ip/$answer.$ip", "w");
// fwrite($f, "Password is $pw\n\nclear ip : $_SERVER[REMOTE_ADDR]");
// fclose($f);




?>
