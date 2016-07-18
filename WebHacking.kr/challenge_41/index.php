<?php
$hidden_dir="???";

$pw="???";

if ($_FILES[up]) {
    $fn=$_FILES[up][name];
    $fn=str_replace(".", "", $fn);
    if (eregi("/", $fn)) {
        exit("no");
    }
    if (eregi("\.", $fn)) {
        exit("no");
    }
    if (eregi("htaccess", $fn)) {
        exit("no");
    }
    if (eregi(".htaccess", $fn)) {
        exit("no");
    }
    if (strlen($fn)>10) {
        exit("no");
    }
    $fn=str_replace("<", "", $fn);
    $fn=str_replace(">", "", $fn);
    $cp=$_FILES[up][tmp_name];

    copy($cp, "$hidden_dir/$fn");

    $f=@fopen("$hidden_dir/$fn", "w");
    @fwrite($f, "$pw");
    @fclose($f);

    echo("Done~");
}
