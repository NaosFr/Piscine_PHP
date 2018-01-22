<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
		$oldpass = hash("whirlpool", $_POST['modify_old_password']);
		$newpass = hash("whirlpool", $_POST['modify_new_password']);

		$login = mysqli_real_escape_string($link, $_POST['modify_email']);
		$oldpass = mysqli_real_escape_string($link, $oldpass);
		$newpass = mysqli_real_escape_string($link, $newpass);
	  

		$sql = "SELECT id_user, login, passwd FROM users WHERE login = '$login' AND passwd = '$oldpass'";
			
		$user = mysqli_query($link, $sql);

		if (mysqli_num_rows($user) == 1) {
			$data = mysqli_fetch_assoc($user);
			$id = $data['id_user'];

			$sql = "UPDATE users SET
    			login = '$login',
   				passwd = '$newpass'
    			WHERE id_user = '$id'
    		";
    		mysqli_query($link, $sql);
    		echo '<script>document.location.href="../index.php";</script>';
		}
		else{
		echo '<script>alert("Mot de passe ou email faux !")</script>';
		echo '<script>document.location.href="../modify.html";</script>';
		}
}
else{
	echo '<script>document.location.href="../modify.html";</script>';
}

?>