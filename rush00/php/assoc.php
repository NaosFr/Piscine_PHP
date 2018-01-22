<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	if ($_POST['submit'] === "VALIDATE_ADD") {

		$id_cat = mysqli_real_escape_string($link, $_POST['id_cat']);
		$id_prod = mysqli_real_escape_string($link, $_POST['id_prod']);

		$sql = "INSERT INTO `assoc` (`id_assoc`, `id_cat_assoc`, `id_prod_assoc`) VALUES (NULL, '$id_cat', '$id_prod')";

    	mysqli_query($link, $sql);
		echo '<script>document.location.href="../admin.php";</script>';
	}
	
	else if ($_POST['submit'] === "VALIDATE_DEL") {
		
		$id = mysqli_real_escape_string($link, $_POST['id']);
		
		$sql = "DELETE FROM assoc WHERE id_assoc = $id";

    	mysqli_query($link, $sql);
		echo '<script>document.location.href="../admin.php";</script>';
	}
}
else{
	echo '<script>document.location.href="../admin.php";</script>';
}
?>