#!/usr/bin/php
<?php
	if ($argc > 1 ) {
		$tmp = $argv[1];
		$tmp = strtolower($tmp);
		$tab = array_filter(explode(' ', $tmp));
		if (count($tab) != 5) {
			echo "Wrong Format\n";
			exit();
		}
		$day = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
		$month = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
		$day_en = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$month_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$tab_time = array_filter(split(":", $tab[4]));
		if (count($tab_time) != 3) {
			echo "Wrong Format\n";
			exit();
		}
		$num_hour = $tab_time[0];
		$num_minute = $tab_time[1];
		$num_second = $tab_time[2];
		$num_month = array_search($tab[2], $month) + 1;
		$verif_day = array_search($tab[0], $day) + 1;
		$num_day = intval($tab[1]);
		$num_year = intval($tab[3]);
		if ($tab[2] != $month[$num_month - 1]) {
			echo "Wrong Format\n";
			exit();
		}
		else if ($tab[0] != $day[array_search($tab[0], $day)]) {
			echo "Wrong Format\n";
			exit();
		}
		else if (strlen($tab[1]) < 1 || strlen($tab[1]) > 2) {
			echo "Wrong Format\n";
			exit();
		}
		else if (strlen($tab[3]) !== 4) {
			echo "Wrong Format\n";
			exit();
		}
		else if (strlen($tab_time[0]) !== 2) {
			echo "Wrong Format\n";
			exit();
		}
		else if (strlen($tab_time[1]) !== 2) {
			echo "Wrong Format\n";
			exit();
		}
		else if (strlen($tab_time[2]) !== 2) {
			echo "Wrong Format\n";
			exit();
		}
		date_default_timezone_set("Europe/Paris");
		$nb = mktime ($num_hour, $num_minute, $num_second, $num_month, $num_day, $num_year);
		$date = array_filter(explode(' ', date('l j F Y h:i:s', $nb)));
		if ($date[2] != $month_en[$num_month - 1]) {
			echo "Wrong Format\n";
			exit();
		}
		else if ($date[0] != $day_en[$verif_day - 1]) {
			echo "Wrong Format\n";
			exit();
		}
		echo $nb."\n";
	}
?>