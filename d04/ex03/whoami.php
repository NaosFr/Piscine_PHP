<?php
	session_start();
	if ($_SESSION['loggued_on_user'] === ""){
		echo "ERROR1\n";
		exit();
	}
	$private = file_get_contents("../private/passwd");
	if ($private === "") {
		echo "ERROR\n";
		exit();
	}
	$who = $_SESSION['loggued_on_user'];
	$tab = unserialize($private);
	foreach ($tab as $index => $value) {
		if ($value['login'] === $who) {
			echo $who."\n";
			exit();
		}
	}
	echo "ERROR\n";
?>