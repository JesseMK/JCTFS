<?php

extract($_SERVER);
extract($_COOKIE);

if (!$REMOTE_ADDR) {
    $REMOTE_ADDR=$_SERVER[REMOTE_ADDR];
}

$ip=$REMOTE_ADDR;
$agent=$HTTP_USER_AGENT;


if ($_COOKIE[REMOTE_ADDR]) {
    $ip=str_replace("12", "", $ip);
    $ip=str_replace("7.", "", $ip);
    $ip=str_replace("0.", "", $ip);
}

echo("<table border=1><tr><td>client ip</td><td>$ip</td></tr><tr><td>agent</td><td>$agent</td></tr></table>");

if ($ip=="127.0.0.1") {
    @solve();
} else {
    echo("<p><hr><center>Wrong IP!</center><hr>");
}
