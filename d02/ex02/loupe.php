#!/usr/bin/php
<?php
	function to_uppercase2($val)
	{
		return $val[1].strtoupper($val[2]).$val[3];
	}
	function to_uppercase($val)
	{
		$start = '#(title=")(.+?)(")#';
		$val[0] = preg_replace_callback($start, "to_uppercase2", $val[0]);
		$start = '#(>)(.+?)(<)#';
		$val[0] = preg_replace_callback($start, "to_uppercase2", $val[0]);
		return $val[0];
	}
	if ($argc == 2 ) {
		$str = file_get_contents($argv[1]);
		$start = '#<a[ >](.+?)</a>#';
		$val = preg_replace_callback($start, "to_uppercase", $str);
		echo $val;
	}
?>