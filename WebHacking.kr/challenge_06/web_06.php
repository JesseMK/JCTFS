<?php
if (!$_COOKIE[user]) {
    // $val_id="guest";
    // $val_pw="123qwe";
    $val_id="admin";
    $val_pw="admin";

    for ($i=0;$i<20;$i++) {
        $val_id=base64_encode($val_id);
        $val_pw=base64_encode($val_pw);
    }

    $val_id=str_replace("1", "!", $val_id);
    $val_id=str_replace("2", "@", $val_id);
    $val_id=str_replace("3", "$", $val_id);
    $val_id=str_replace("4", "^", $val_id);
    $val_id=str_replace("5", "&", $val_id);
    $val_id=str_replace("6", "*", $val_id);
    $val_id=str_replace("7", "(", $val_id);
    $val_id=str_replace("8", ")", $val_id);

    $val_pw=str_replace("1", "!", $val_pw);
    $val_pw=str_replace("2", "@", $val_pw);
    $val_pw=str_replace("3", "$", $val_pw);
    $val_pw=str_replace("4", "^", $val_pw);
    $val_pw=str_replace("5", "&", $val_pw);
    $val_pw=str_replace("6", "*", $val_pw);
    $val_pw=str_replace("7", "(", $val_pw);
    $val_pw=str_replace("8", ")", $val_pw);

    // Setcookie("user", $val_id);
    // Setcookie("password", $val_pw);
    echo("user: ".$val_id."\n");
    echo("password: ".$val_pw."\n");

    echo("<meta http-equiv=refresh content=0>");
}

$decode_id=$_COOKIE[user];
$decode_pw=$_COOKIE[password];

$decode_id=str_replace("!", "1", $decode_id);
$decode_id=str_replace("@", "2", $decode_id);
$decode_id=str_replace("$", "3", $decode_id);
$decode_id=str_replace("^", "4", $decode_id);
$decode_id=str_replace("&", "5", $decode_id);
$decode_id=str_replace("*", "6", $decode_id);
$decode_id=str_replace("(", "7", $decode_id);
$decode_id=str_replace(")", "8", $decode_id);

$decode_pw=str_replace("!", "1", $decode_pw);
$decode_pw=str_replace("@", "2", $decode_pw);
$decode_pw=str_replace("$", "3", $decode_pw);
$decode_pw=str_replace("^", "4", $decode_pw);
$decode_pw=str_replace("&", "5", $decode_pw);
$decode_pw=str_replace("*", "6", $decode_pw);
$decode_pw=str_replace("(", "7", $decode_pw);
$decode_pw=str_replace(")", "8", $decode_pw);


for ($i=0;$i<20;$i++) {
    $decode_id=base64_decode($decode_id);
    $decode_pw=base64_decode($decode_pw);
}

echo("<font style=background:silver;color:black>&nbsp;&nbsp;HINT : base64&nbsp;&nbsp;</font><hr><a href=index.phps style=color:yellow;>index.phps</a><br><br>");
echo("ID : $decode_id<br>PW : $decode_pw<hr>");

if ($decode_id=="admin" && $decode_pw=="admin") {
    @solve(6, 100);
}
