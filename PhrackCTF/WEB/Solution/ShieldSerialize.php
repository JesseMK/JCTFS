<?php
class Shield {
    public $file;
    function __construct($filename = 'pctf.php') {
        $this -> file = $filename;
    }

    function readfile() {
        if (!empty($this->file) && stripos($this->file,'..')===FALSE
        && stripos($this->file,'/')===FALSE && stripos($this->file,'\\')==FALSE) {
            return @file_get_contents($this->file);
        }
    }
}
$x = new Shield();
// $g = "O:6:%22Shield%22:1:{s:4:%22file%22;s:8:%22pctf.php%22;}";
$g = serialize($x);
echo str_replace("\"", "%22", $g);
// echo $g;
?>
