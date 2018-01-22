#!/usr/bin/php
<?php
	if ($argc == 2) {
		$cast = str_replace(' ', '', $argv[1]);
		for ($i=0; $i < strlen($cast); $i++) { 
			if (ctype_digit($cast[$i]) == FALSE && $cast[$i] != "+" && $cast[$i] != "-" && $cast[$i] != "*" && $cast[$i] != "/" && $cast[$i] != "%") {
				echo "Syntax Error\n";
				return ;
			}
		}
		$int1 = intval($cast);
		$op = substr(substr($cast, strlen((string)$int1)), 0, 1);
		$int2 = substr(substr($cast, strlen((string)$int1)), 1);
		if (!is_numeric($int1) || !is_numeric($int2)){
        	echo "Syntax Error\n";
    	}
    	else
    	{
			if ($op == "+") {
				echo $int1 + $int2."\n";
			}
			else if ($op == "-") {
				echo $int1 - $int2."\n";
			}
			else if ($op == "*") {
				echo $int1 * $int2."\n";
			}
			else if ($op == "/") {
				echo $int1 / $int2."\n";
			}
			else if ($op == "%") {
				echo $int1 % $int2."\n";
			}
			else
			{
				echo "Syntax Error\n";
			}
		}
	}
	else
	{
		echo "Incorrect Parameters\n";
	}
?>