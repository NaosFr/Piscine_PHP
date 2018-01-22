#!/usr/bin/php
<?php
	if ($argc == 2) {
		$str = "";
		$tab = array();
		$tab = array_filter(explode(' ', $argv[1]));
		foreach ($tab as $element) 
		{
			$str .= $element." ";
		}
		$str = substr($str, 0, -1);
		echo $str."\n";
	}
?>