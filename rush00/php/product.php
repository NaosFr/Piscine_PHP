<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	if ($_POST['submit'] === "VALIDATE_ADD") {
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$descp = mysqli_real_escape_string($link, $_POST['descp']);
		$price = mysqli_real_escape_string($link, $_POST['price']);
		$img = mysqli_real_escape_string($link, $_POST['img']);
		
		$sql = "INSERT INTO `product` (`id_prod`, `name`, `descp`, `price`, `img`) VALUES (NULL, '$name', '$descp', '$price', '$img')";

		mysqli_query($link, $sql);
		echo '<script>document.location.href="../admin.php";</script>';
	}

	else if ($_POST['submit'] === "VALIDATE_MODIFY") {
		$id = mysqli_real_escape_string($link, $_POST['id_prod']);
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$descp = mysqli_real_escape_string($link, $_POST['descp']);
		$price = mysqli_real_escape_string($link, $_POST['price']);
		$img = mysqli_real_escape_string($link, $_POST['img']);

		$sql = "UPDATE product SET
    		name = '$name',
   			descp = '$descp',
    		price = '$price',
    		img = '$img'
    		WHERE id_prod = $id
    		";
    	mysqli_query($link, $sql);
		echo '<script>document.location.href="../admin.php";</script>';
	}

	else if ($_POST['submit'] === "VALIDATE_DEL") {
		$id = mysqli_real_escape_string($link, $_POST['id_prod']);

		$sql = "DELETE FROM product WHERE id_prod = $id";
    	mysqli_query($link, $sql);		

		echo '<script>document.location.href="../admin.php";</script>';
	}
}
else{
	echo '<script>document.location.href="../admin.php";</script>';
}
?>