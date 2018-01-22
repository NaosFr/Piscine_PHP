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
		$tab = ft_split($argv[1]);
		$tmp = $tab[0];
		unset($tab[0]);
		foreach ($tab as $element)
		{
			echo $element." ";
		}
		echo $tmp."\n";
?>