#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$tab = array();
		$tab = array_filter(explode(' ', $str));
		sort($tab);
		return $tab;
	}
	for ($i=1; $i < $argc; $i++) { 
		$str .= $argv[$i]." "; 
	}
	$tab = ft_split($str);
	foreach ($tab as $element)
	{
		echo $element."\n";
	}
?>