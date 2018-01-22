#!/usr/bin/php
<?php
	if ($argc == 4) {
		$num1 = trim($argv[1]);
		$op = trim($argv[2]);
		$num2 = trim($argv[3]);
		$int1 = (int)$num1;
		$int2 = (int)$num2;
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
			echo "Incorrect Parameters\n";
		}
	}
	else
	{
		echo "Incorrect Parameters\n";
	}
?>