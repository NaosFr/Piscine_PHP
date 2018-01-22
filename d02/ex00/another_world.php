#!/usr/bin/php
<?php
	if ($argc > 1 ) {
		$tmp = $argv[1];
		$tmp = preg_replace("/[\t ]+/", " ", $tmp);
		$tmp = trim($tmp);
		echo $tmp."\n";
	}
?>