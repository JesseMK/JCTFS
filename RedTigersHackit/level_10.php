<?php
$a='a:2:{s:8:"username";s:6:"Monkey";s:8:"password";s:12:"0815password";}';
$b=unserialize($a);
print_r($b);
$b=[
  'username'=>'TheMaster',
  'password'=>true,
];
print_r($b);
$a=serialize($b);
echo $a;
// Array
// (
//     [username] => Monkey
//     [password] => 0815password
// )
