<?php

mysql_connect("104.131.23.191", "webhacking", "wEBHacking1234") or die();

mysql_select_db("challenge_30_table") or die();

$q=mysql_query("select password from challenge_30_answer") or die();

$data=mysql_fetch_array($q) or die();

if ($data) {
    $pw="????";
    echo("Password is $pw");
}
