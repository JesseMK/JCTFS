<?php
function encrypt($str)
{
    $cryptedstr = "";
    for ($i =0; $i < strlen($str); $i++) {
        $temp = ord(substr($str, $i, 1)) ^ 192;

        while (strlen($temp)<3) {
            $temp = "0".$temp;
        }
        $cryptedstr .= $temp. "";
    }
    return base64_encode($cryptedstr);
}

function decrypt($str)
{
    if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $str)) {
        $str = base64_decode($str);
        if ($str != "" && $str != null && $str != false) {
            $decStr = "";

            for ($i=0; $i < strlen($str); $i+=3) {
                $array[$i/3] = substr($str, $i, 3);
            }

            foreach ($array as $s) {
                $a = $s^192;
                $decStr .= chr($a);
            }

            return $decStr;
        }
        return false;
    }
    return false;
}
