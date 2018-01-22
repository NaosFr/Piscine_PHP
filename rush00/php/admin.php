<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	if ($_POST['submit'] === "VALIDATE_ADD") {
		$id = mysqli_real_escape_string($link, $_POST['id_user']);
		
		$sql = "UPDATE users SET
    		admin = 1 
    		WHERE id_user = $id
    		";
    	mysqli_query($link, $sql);

		echo '<script>document.location.href="../admin.php";</script>';
	}

	else if ($_POST['submit'] === "VALIDATE_DEL") {
		$id = mysqli_real_escape_string($link, $_POST['id_user']);
		
		$sql = "UPDATE users SET
    		admin = 0
    		WHERE id_user = $id
    		";
    	mysqli_query($link, $sql);	
		echo '<script>document.location.href="../admin.php";</script>';
	}
}
else{
	echo '<script>document.location.href="../admin.php";</script>';
}
?>