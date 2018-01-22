<?php 
	if (!empty($_POST)) {

		if ($_POST['login'] === "" || $_POST['passwd'] === "" || $_POST['submit'] !== "OK") {
			echo "ERROR\n";
			exit();
		}

		if (!file_exists("../private/passwd")) {
			if (!file_exists("../private")) {
				mkdir("../private", 0777, true);
			}
			fopen('../private/passwd', 'w+');
		}

		$private = file_get_contents("../private/passwd");
		$tab = [];
		if ($private !== "") {
			$tab = unserialize($private);
		}
		foreach ($tab as $value) {
			if ($value['login'] == $_POST['login']) {
				echo "ERROR\n";
				exit();
			}
		}
		$pass = $_POST['passwd'];
		$pass = hash("whirlpool", $pass);

		$new_array = array();
		$new_array['login'] = $_POST['login'];
		$new_array['passwd'] = $pass;

		$tab[] = $new_array;
		file_put_contents("../private/passwd", serialize($tab));
		echo "OK\n";
	}
	else
	{
		echo "ERROR\n";
	}
?>