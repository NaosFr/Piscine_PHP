<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);
	
	if ($_POST['cart'] === "Login") {
		echo '<script>document.location.href="../login.html";</script>';
		exit();
	}

	else if ($_POST['cart'] === "Buy") {
		$tab = [];
		foreach ($_SESSION['cart'] as $id => $qty)
		if ($qty > 0)
		{
			$name = mysqli_query($link, "SELECT `name` FROM `product` WHERE id_prod = $id");
			$name = mysqli_fetch_assoc($name);
	
			$price = mysqli_query($link, "SELECT `price` FROM `product` WHERE id_prod = $id");
			$price = mysqli_fetch_assoc($price);

			$array = array();
			$array['product'] = $name['name'];
			$array['price'] = $price['price'];
			$array['qty'] = $qty;

			$tab[] = $array;
			$total += $price['price'] * $qty;
		}

		$array = array();
		$array['total'] = $total;
		$tab[] = $array;

		$str = serialize($tab);
		
		$sql = "INSERT INTO order_shop SET
			order_text = '$str'
		";
		mysqli_query($link, $sql);
		echo '<script>document.location.href="../index.php";</script>';
	}
}
else{
	echo '<script>document.location.href="../shopping_cart.php";</script>';
}
?>