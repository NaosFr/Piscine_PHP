<?php 
	function auth($login, $passwd)
	{
		$private = file_get_contents("../private/passwd");
		if ($private === "") {
			return FALSE;
		}
		$tab = unserialize($private);
		$pass = hash("whirlpool", $passwd);
		foreach ($tab as $index => $value) {
			if ($value['login'] === $login && $value['passwd'] === $pass) {
				return TRUE;
			}
		}
		return FALSE;
	}
?>