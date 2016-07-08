<html>
<head>
<title>Challenge 37</title>
</head>
<body>
<!-- index.phps -->
<?php

$pw="???";

$time=time();


$f=fopen("tmp/tmp-$time", "w");
fwrite($f, "127.0.0.1");
fclose($f);


$fck=@file("tmp/.number");

if ($fck) {
    $fck=$fck[0];
}
if (!$fck) {
    $fck=0;
}

$fck++;

$f2=fopen("tmp/.number", "w");
fwrite($f2, $fck);
fclose($f2);

$file_nm=$HTTP_POST_FILES[upfile][name];
$file_nm=str_replace("<", "", $file_nm);
$file_nm=str_replace(">", "", $file_nm);
$file_nm=str_replace(".", "", $file_nm);
$file_nm=str_replace(" ", "", $file_nm);

if ($file_nm) {
    $f=@fopen("tmp/$file_nm", "w");
    @fwrite($f, $_SERVER[REMOTE_ADDR]);
    @fclose($f);
}




echo("<pre>");

$kk=scandir("tmp");

for ($i=0;$i<=count($kk);$i++) {
    echo("$kk[$i]\n");
}

echo("</pre>");





$ck=file("tmp/tmp-$time");
$ck=$ck[0];

$request="GET /$pw HTTP/1.0\r\n";
$request.="Host: $ck\r\n";
$request.="\r\n";

$socket=@fsockopen($ck, 7777, $errstr, $errno, 1);

@fputs($socket, $request);

@fclose($socket);

echo("$ck:7777<br>");

if ($fck>=30) {
    $kk=scandir("tmp");

    for ($i=0;$i<=count($kk);$i++) {
        @unlink("tmp/$kk[$i]");
    }
}

?>

<form method=post enctype="multipart/form-data" action=index.php>
<input type=file name=upfile><input type=submit>
</form>




</body>
</html>
