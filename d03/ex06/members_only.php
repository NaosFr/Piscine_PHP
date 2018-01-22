<?php
	$login = "zaz";
	$pass = "jaimelespetitsponeys";
	
	if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
	    header('WWW-Authenticate: Basic realm=\'\'Espace membres\'\'');
		header('HTTP/1.0 401 Unauthorized');
        echo "\n<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	    exit;
	}
	else if ($_SERVER['PHP_AUTH_USER'] !== $login || $_SERVER['PHP_AUTH_PW'] !== $pass) {
		header('WWW-Authenticate: Basic realm=\'\'Espace membres\'\'');
		header('HTTP/1.0 401 Unauthorized');
        echo "\n<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	    exit;
	}
	$file = file_get_contents('../img/42.png');
	$file = base64_encode($file);
    echo "<html><body>\nBonjour Zaz<br />\n<img src='data:image/jpeg;base64,".base64_encode($file)."'>\n</body></html>\n";
?>