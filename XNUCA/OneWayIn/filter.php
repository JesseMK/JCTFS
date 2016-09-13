<?php
$file = 'D:\Jesse\InfoSec\JCTFS\XNUCA\OneWayIn\flag.php2';

$fp = fopen($file, 'r');
$str = fread($fp, filesize($file));
fclose($fp);
$code = strdecode($str);

//变量和函数
$vals = $funs = array();
$code = fmt_code($code);

//以上步骤可将任何混淆加密的乱码转换成正常阅读的代码，方便下面解密

//phpjm，替换掉这个函数
preg_match('/function [a-z]+(&\$(.*?)){(.*)return "[0-9a-zA-Z]{1}";}/iesU', $code, $res);
//... 以下不公布



//得出加密前的原代码
$decode = preg_replace('/^;?>/', '', $decode);
$decode = preg_replace('/<?php unset((.*?)?>$/', '', $decode);

file_put_contents($file.'.de.php', $decode);
print_r($decode);

////////////
function val_replace($code, $val, $deval)
{
    $code = str_replace('$'.$val.',', '$'.$deval.',', $code);
    $code = str_replace('$'.$val.';', '$'.$deval.';', $code);
    $code = str_replace('$'.$val.'=', '$'.$deval.'=', $code);
    $code = str_replace('$'.$val.'(', '$'.$deval.'(', $code);
    $code = str_replace('$'.$val.')', '$'.$deval.')', $code);
    $code = str_replace('$'.$val.'.', '$'.$deval.'.', $code);
    $code = str_replace('$'.$val.'/', '$'.$deval.'/', $code);
    $code = str_replace('$'.$val.'>', '$'.$deval.'>', $code);
    $code = str_replace('$'.$val.'<', '$'.$deval.'<', $code);
    $code = str_replace('$'.$val.'^', '$'.$deval.'^', $code);
    $code = str_replace('$'.$val.'||', '$'.$deval.'||', $code);
    $code = str_replace('($'.$val.' ', '($'.$deval.' ', $code);
    return $code;
}

function fmt_code($code)
{
    global $vals,$funs;
    preg_match_all("/\$[0-9a-zA-Z[]]+(,|;)/iesU", $code, $res);
    foreach ($res[0] as $v) {
        $val = str_replace(array('$', ',', ';'), '', $v);
        $deval = destr($val, 1);
        $vals[$val] = $deval;
        $code = val_replace($code, $val, $deval);
    }

    preg_match_all("/\$[0-9a-zA-Z[]]+=/iesU", $code, $res);
    foreach ($res[0] as $v) {
        $val = str_replace(array('$', '='), '', $v);
        $deval = destr($val, 1);
        $vals[$val] = $deval;
        $code = val_replace($code, $val, $deval);
    }

    preg_match_all("/functions[0-9a-zA-Z[]]+(/iesU", $code, $res);
    foreach ($res[0] as $v) {
        $val = str_replace(array('function ', '('), '', $v);
        $deval = destr($val, 1);
        $funs[$val] = $deval;
        $code = str_replace('function '.$val.'(', 'function '.$deval.'(', $code);
        $code = str_replace('='.$val.'(', '='.$deval.'(', $code);
        $code = str_replace('return '.$val.'(', 'return '.$deval.'(', $code);
    }
    return $code;
}

function strdecode($str)
{
    $len = strlen($str);
    $newstr = '';
    for ($i=0; $i<$len; $i++) {
        $n = ord($str[$i]);
        $newstr .= decode($n);
    }
    return $newstr;
}

function decode($dec)
{
    if (($dec > 126 || $dec<32) && $dec<>13 && $dec<>10) {
        return '['.$dec.']';
    } else {
        return chr($dec);
    }
}

function destr($str, $val=0)
{
    $k = 0;
    $num = '';
    $n = strlen($str);
    $code = '';
    for ($i=0; $i<$n; $i++) {
        if ($str[$i] == '[') {
            $k = 1;
        } elseif ($str[$i] == ']') {
            $num = intval($num);
            if ($val==1) {
                $num = 97 + fmod($num, 25);
            }
            $code .= chr($num);
            $k = 0;
            $num = null;
        } else {
            if ($k == 1) {
                $num .= $str[$i];
            } else {
                $code .= $str[$i];
            }
        }
    }
    return $code;
}
