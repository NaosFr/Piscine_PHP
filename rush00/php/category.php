<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	if ($_POST['submit'] === "VALIDATE_ADD") {
		$name = mysqli_real_escape_string($link, $_POST['name']);
		
		$sql = "INSERT INTO `category` (`id_cat`, `name`) VALUES (NULL, '$name')";

		mysqli_query($link, $sql);
		echo '<script>document.location.href="../admin.php";</script>';
	}

	else if ($_POST['submit'] === "VALIDATE_DEL") {
		$id = mysqli_real_escape_string($link, $_POST['id_cat']);

		$sql = "DELETE FROM category WHERE id_cat = $id";
    	mysqli_query($link, $sql);	
		echo '<script>document.location.href="../admin.php";</script>';
	}
}
else{
	echo '<script>document.location.href="../admin.php";</script>';
}
?>