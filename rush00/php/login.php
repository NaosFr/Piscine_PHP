<?php		
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	$login_email = $_POST['login_email'];
	$login_passwd = hash("whirlpool", $_POST['login_password']);
	$login_email = mysqli_real_escape_string($link, $login_email);
	$login_passwd = mysqli_real_escape_string($link, $login_passwd);

	$sql = "SELECT id_user, login, passwd, admin FROM users WHERE login = '$login_email' AND passwd = '$login_passwd'";

	$user = mysqli_query($link, $sql);

	if (mysqli_num_rows($user) == 1) {
		$data = mysqli_fetch_assoc($user);
		session_start();
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['login'] = $data['login'];

		if ($data['admin'] == 1) {
			echo '<script>document.location.href="../admin.php";</script>';
		}
		echo '<script>document.location.href="../index.php";</script>';
		exit();
	}
	else{
		echo '<script>alert("password or email wrong !")</script>';
		echo '<script>document.location.href="../login.html";</script>';
	} 
}
else{
	echo '<script>document.location.href="../login.html";</script>';
}
?>