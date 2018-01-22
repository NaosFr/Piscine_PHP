<?php  
	session_start();
	if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] === "OK" && $_GET['login'] != "" && $_GET['passwd'] != ""){
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
		$_SESSION['submit'] = $_GET['submit'];
	}
?>

<html>
<body>
	<form action="index.php" accept-charset="utf-8">
	Identifiant: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"/>
	<br/>
	Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>"/>
	<br/>
	<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>