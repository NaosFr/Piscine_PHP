<?php
	session_start();
	if (isset($_GET['login']) && isset($_GET['passwd'])){
		$private = file_get_contents("../private/passwd");
		if ($private === "") {
			$_SESSION['loggued_on_user'] = "";
			echo "ERROR\n";
			exit();
		}
		$tab = unserialize($private);
		$login = $_GET['login'];
		$passwd = $_GET['passwd'];
		$pass = hash("whirlpool", $passwd);
		
		foreach ($tab as $index => $value) {
			if ($value['login'] === $login && $value['passwd'] === $pass) {
				$_SESSION['loggued_on_user'] = $login;
				echo "OK\n";
				exit();
			}
		}
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
	else{
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>