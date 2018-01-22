<?php 
	if (!empty($_POST)) {

		if ($_POST['login'] === "" || $_POST['oldpw'] === "" || $_POST['newpw'] === "" || $_POST['submit'] !== "OK") {
			echo "ERROR\n";
			exit();
		}
		if (!file_exists("../private/passwd")) {
			echo "ERROR\n";
			exit();
		}
		$private = file_get_contents("../private/passwd");
		if ($private === "") {
			echo "ERROR\n";
			exit();
		}

		$tab = [];
		$tab = unserialize($private);
		
		$pass = $_POST['oldpw'];
		$pass = hash("whirlpool", $pass);

		foreach ($tab as $index => $value) {
			
			if ($value['login'] === $_POST['login'] && $value['passwd'] === $pass) {
				
				$new_pass = $_POST['newpw'];
				$new_pass = hash("whirlpool", $new_pass);

				$tab[$index]['passwd'] = $new_pass;

				file_put_contents("../private/passwd", serialize($tab));

				echo "OK\n";
				exit();
			}
		}
		echo "ERROR\n";
	}
	else
	{
		echo "ERROR\n";
	}
?>