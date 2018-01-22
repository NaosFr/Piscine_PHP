#!/usr/bin/php
<?php
	if ($argc == 1) {
		exit();
	}
	$tab = array();
	$f = fgets(STDIN);
	while (STDIN && !feof(STDIN))
	{
		$f = fgets(STDIN);
		$f = str_replace("\n", "", $f);
		$array = explode(";", $f);
		if (count($array) == 4)
			$tab[] = $array;
	}
	$nb = 0;
	$index = 0;
	if ($argv[1] === "moyenne") {
		foreach ($tab as $element) {
			if ($element[2] !== "moulinette" && $element[1] !== "") {
				$nb += $element[1];
				$index++;
			}
		}
		if ($index !== 0) {
			$nb = $nb / $index;
		}
		echo $nb."\n";
		exit();
	}
	else if ($argv[1] === "moyenne_user") {
		sort($tab);
		$tab_user = array(array());
		foreach ($tab as $element) {
			if ($element[0] !== "" && $element[1] !== "" && $element[2] !== "moulinette") {
				$tab_user[$element[0]][0] += $element[1];
				$tab_user[$element[0]][1] += 1;
				$tab_user[$element[0]][2] = $element[0];
			}
		}
		
		foreach ($tab_user as $element) {
			
			if ($element[1] === 0) {
				exit();
			}
			else
			{
				if ($element[1] != 0) {
					echo $element[2].":".$element[0] / $element[1]."\n";
				}
			}
		}
		exit();
	}
	else if ($argv[1] === "ecart_moulinette") {
		
		sort($tab);
		$tab_user = array(array());
		$tab_moyenne_user = array(array());
		foreach ($tab as $element) {
			if ($element[0] !== "" && $element[1] !== "" && $element[2] !== "moulinette") {
				$tab_user[$element[0]][0] += $element[1];
				$tab_user[$element[0]][1] += 1;
				$tab_user[$element[0]][2] = $element[0];
			}
		}
		foreach ($tab_user as $element) {
			
			if ($element[1] === 0) {
				$tab_moyenne_user[$element[2]][0] = 0;
			}
			else
			{
				if ($element[1] != 0) {
					$tab_moyenne_user[$element[2]][0] = $element[0] / $element[1];
				}
			}
		}
		foreach ($tab as $element) {
			if ($element[0] !== "" && $element[1] !== "" && $element[2] === "moulinette") {
				$tab_moyenne_user[$element[0]][1] = $element[1];
			}
		}
		foreach ($tab_moyenne_user as $element) {
			if($element[0] !== NULL)
				echo $element[0] - $element[1]."\n";
		}
		exit();
	}

?>