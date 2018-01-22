<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
		$pass = hash("whirlpool", $_POST['password']);
		$login = mysqli_real_escape_string($link, $_POST['email']);
	  

		$sql = "SELECT id_user, login, passwd FROM users WHERE login = '$login' AND passwd = '$pass'";
			
		$user = mysqli_query($link, $sql);

		if (mysqli_num_rows($user) == 1) {
			$data = mysqli_fetch_assoc($user);
			$id = $data['id_user'];

			$sql = "DELETE FROM users WHERE id_user = $id";
    		mysqli_query($link, $sql);
    		echo '<script>document.location.href="log_out.php";</script>';
		}
		else{
			echo '<script>alert("Password or email wrong !")</script>';
			echo '<script>document.location.href="../delete.html";</script>';
		}
}
else{
	echo '<script>document.location.href="log_out.php";</script>';
}

?>