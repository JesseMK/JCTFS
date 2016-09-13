<?php
    error_reporting(0);
    $file=base64_decode(isset($_GET['file'])?$_GET['file']:"");
        //
    $line=isset($_GET['num'])?intval($_GET['num']):0;
    if ($file=='') {
        header("location:index.php?file=dGVzdC50eHQ=&num=");
    }
    $file_list = array(
        '0' =>'test.txt',
        '1' =>'index.php',
    );

        //
    if (isset($_COOKIE['role_cookie']) && $_COOKIE['role_cookie']=='flagadmin') {
        $file_list[2]='flag.php';
    }

        //
    if (in_array($file, $file_list)) {
        $fa = file($file);
        echo $fa[$line];
    }
