<?php
$a="%bf%27";
$b=urldecode($a);


echo $b;
$c=mb_convert_encoding($b, 'utf-8', 'euc-kr');
echo $c;
