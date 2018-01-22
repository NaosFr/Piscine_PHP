<?php
	include 'php/connexion.php';
	session_start();
?>

<!DOCTYPE html>
<html id='HTML' xmlns:og="http://ogp.me/ns#" lang="fr">
<head>
	<meta charset="utf-8">
	<title>SpaceX - <?php echo  $_SESSION['login']?></title>
	<meta name="Content-Language" content="fr">
	<meta name="Description" content="">
	<meta name="keyword" content="">
	<meta name="Subject" content="">
	<meta name="Author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="Copyright" content="© 2018 42. All rights reserved.">
	<link rel="icon" type="image/png" href="img/favicon.png" />

	<!-- ******* CSS ***************** -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/shopping_cart.css">
</head>

<body>
<!-- ******* HEADER ***************** -->
	<header class="float_menu">
		<div class="float_menu_middle">
			<a href="index.php"><img src="asset/img/logo.png" alt="logo" class="logo"/></a>
		</div>
		<div class="float_menu_rigth_achat">
			<img src="asset/icon/buy.svg" alt="buy" class="buy"/>
			<a href="shop.php?value=all"><img src="asset/icon/shopping-cart.svg" alt="cart" class="cart"/></a>
		</div>
		</div>
	</header>

<!-- ******* BACKGROUND MENU ***************** -->
	<section class="background_menu">
		<section class="div_shopping_cart">
			<div class="index_cart">
				<p>Name</p>
				<p>Price</p>
				<p>Quantity</p>
			</div>
			<hr>
<?php
if (isset($_SESSION['cart']))
{
	if (isset($_GET['action']) && isset($_GET['id']))
		if ($_GET['action'] === "del")
			unset($_SESSION['cart'][$_GET['id']]);
	foreach ($_SESSION['cart'] as $id => $qty)
	{
		if (isset($_POST) && isset($_POST['action']) && isset($_POST['id']) && isset($_POST['qty']))
		{
			if (($_POST['action'] === "reset") && ($_POST['id'] == $id))
			{
				$_SESSION['cart'][$id] = $_POST['qty'];
				$qty = $_SESSION['cart'][$id];
			}
		}
		if ($qty > 0)
		{
			$name = mysqli_query($link, "SELECT `name` FROM `product` WHERE id_prod = $id");
			$name = mysqli_fetch_assoc($name);
	
			$price = mysqli_query($link, "SELECT `price` FROM `product` WHERE id_prod = $id");
			$price = mysqli_fetch_assoc($price);

			echo '
			<div class="product">
				<p class="name">'.$name['name'].'</p>
				<p class="price">'.$price['price'].' $</p>
				<a href="shopping_cart.php?action=del&id='.$id.'"><p class="p_del" class="input_qty" ><img src="asset/icon/add.svg" alt="del" class="del"></p></a>
				<form method="post" action="shopping_cart.php" accept-charset="utf-8">
					<input type="number" name="id" value="'.$id.'" style="visibility: hidden;">
					<input type="text" name="action" value="reset" style="visibility: hidden;">
					<input type="number" name="qty" value="'.$qty.'" min="1" class="input_qty"/>
					<input type="submit" name="submit" class="submit_qty">
				</form>

				
			</div>
			';
			$total += $price['price'] * $qty;
		}
	}
}
?>
			<hr>
			<div class="total_cart">
				<p>Total price : <span class="total_price"><?php echo $total?></span>
				<form method="post" action="php/order.php" accept-charset="utf-8" class="form_buy">
					<input type="submit" name="cart" value=<?php echo $_SESSION['login'] ? "Buy" : "Login";?> class="submit_cart">
				</form>
				</p>
			</div>

		</section>
	</section>


	<!-- ******* JS ***************** -->
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>