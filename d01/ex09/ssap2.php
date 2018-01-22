#!/usr/bin/php
<?php
	if ($argc == 1) {
		exit();
	}
	function ft_split($str)
	{
		$tab = array();
		$tab = array_filter(explode(' ', $str));
		return $tab;
	}
	function ft_strcmp($s1, $s2)
	{
		$comp = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		$index = 0;
		$s1 = strtolower($s1);
		$s2 = strtolower($s2);
		while ($i < strlen($s1) && $i < strlen($s2) && $s1[$i] == $s2[$i]) {
			$i++;
		}
		if ($s1[$i] != "") {
			$pos_1 = strpos($comp, $s1[$i]);
		}
		if ($s2[$i] != "") {
			$pos_2 = strpos($comp, $s2[$i]);
		}
		if ($pos_1 < $pos_2) {
			return -1;
		}
		return 0;
	}
	$str = "";
	for ($i=1; $i < $argc; $i++) { 
		$str .= $argv[$i]." "; 
	}
	$tab = ft_split($str);
	$i = 0;
	while ($i < count($tab)) {
		$j = 0;
		while ($j < count($tab)) {
			if (ft_strcmp($tab[$i], $tab[$j]) < 0) {
				$tmp = $tab[$i];
				$tab[$i] = $tab[$j];
				$tab[$j] = $tmp;
			}
			$j++;
		}
		$i++;
	}
	foreach ($tab as $key => $value) {
		echo $value."\n";
	}
?>