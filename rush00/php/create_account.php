<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	$login = $_POST['create_email'];
	$passwd = hash("whirlpool", $_POST['create_password']);
	$login = mysqli_real_escape_string($link, $login);
	$passwd = mysqli_real_escape_string($link, $passwd);

	$sql = "SELECT login FROM users";
	$user = mysqli_query($link, $sql);

	$bol = 0;
	while ($data = mysqli_fetch_assoc($user)){
		if ($data['login'] == $login) {
			 $bol = 1;
		}
	}
	if ($bol == 1) {
		echo '<script>alert("Email already use !")</script>';
   		echo '<script>document.location.href="../register.html"</script>';
	}
	else
	{
		$sql = "INSERT INTO users SET
			login = '$login',
			passwd = '$passwd'
		";
		mysqli_query($link, $sql);
		echo '<script>alert("Go sign in")</script>';
		echo '<script>document.location.href="../login.html"</script>';
	}
}
else{
	echo '<script>document.location.href="../login.html"</script>';
}
?>