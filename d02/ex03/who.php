#!/usr/bin/php
<?php
$tmp = file_get_contents("/var/run/utmpx");
while ($tmp)
{
    date_default_timezone_set("Europe/Paris");
    $unpack = unpack("A256user/A4id/A32name/iid/itype/ltime", $tmp);
    if ($unpack["type"] == 7) {
    	$time = date('d h:i', $unpack["time"]);
    	$month = date('F', $unpack["time"]);
    	$month = substr($month, 0, 3);
    	echo $unpack["user"]."	 ".$unpack["name"]."  ".$month." ".$time."\n";
    }
    $tmp = substr($tmp, 628);
}
?>
