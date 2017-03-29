<?php

if ($_POST[email]) {
    $pass="????";

    $header="From: $_POST[email]\r\n";

    mail("admin@webhacking.kr", "readme", "password is $pass", $header);

    echo("<script>alert('Done');</script><meta http-equiv=refresh content=1>");
}
