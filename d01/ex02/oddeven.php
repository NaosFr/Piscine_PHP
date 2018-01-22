#!/usr/bin/php
<?php
	while (STDIN && !feof(STDIN))
	{
		echo "Entrez un nombre: ";
		$f = fgets(STDIN);
		if ($f) 
		{
			$f = substr($f, 0, -1);
			if (is_numeric($f))
			{
				if ($f % 2 == 0)
					echo "Le chiffre $f est Pair\n";
				else
					echo "Le chiffre $f est Impair\n";
			}	
			else
				echo "'$f' n'est pas un chiffre\n";
		}
	}
?>