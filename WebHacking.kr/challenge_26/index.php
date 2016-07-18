<?php

if (eregi("admin", $_GET[id])) {
    echo("<p>no!");
    exit();
}

$_GET[id]=urldecode($_GET[id]);

if ($_GET[id]=="admin") {
    @solve(26, 100);
}

?> 
