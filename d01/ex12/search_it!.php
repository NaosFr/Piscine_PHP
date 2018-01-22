#!/usr/bin/php
<?php
	if ($argc > 2 ) {
		for ($i = 2; $i < $argc; $i++) {
			$tab = explode(":", $argv[$i]);
			if ($tab[0] === $argv[1])
				$tmp = $tab[1];
		}
		if ($tmp != NULL)
			echo $tmp."\n";
	}
?>