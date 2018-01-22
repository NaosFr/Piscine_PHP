<?php
	include 'php/connexion.php';
	session_start();

	if ($_SESSION['id_user'] != "" && $_SESSION['login'] != "")
	{
		$nav_log = '<ul class="ul_log"><a href="modify.html"><li><p>Modify</p></li></a><a href="php/log_out.php"><li><p>Logout</p></li></a></ul>';
	}else{
		$nav_log = '<ul class="ul_log"><a href="login.html"><li><p>Login</p></li></a><a href="register.html"><li><p>Register</p></li></a></ul>';
	}

	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();

		$sql = "SELECT * FROM product";
		$product = mysqli_query($link, $sql);
		while ($data = mysqli_fetch_assoc($product)){
			$_SESSION['cart'][$data['id_prod']] = 0;
		}
	}

	if (isset($_GET['add']))
   	{
   		$i = $_GET['add'];
   		$_SESSION['cart'][$i] += 1;
   		echo '<script>document.location.href="shop.php?value='.$_GET['value'].'"</script>';
 	}

 	$_GET['add'] = ""; 
 	unset($_GET['add']);
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
	<link rel="icon" type="image/png" href="asset/icon/favicon.png" />

	<!-- ******* CSS ***************** -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/cross.css">
	<link rel="stylesheet" type="text/css" href="css/shop.css">
</head>

<body>
<!-- ******* HEADER ***************** -->
	<header class="float_menu">
		<div class="float_menu_middle">
			<a href="index.php"><img src="asset/img/logo.png" alt="logo" class="logo"/></a>
		</div>
			<div class="float_menu_rigth">
				<img src="asset/icon/user.svg" alt="user" class="user"/>
				<?php echo $nav_log; ?>
			</div>
		<div class="float_menu_rigth_achat">
			<img src="asset/icon/buy.svg" alt="buy" class="buy"/>
			<a href="shopping_cart.php"><img src="asset/icon/shopping-cart.svg" alt="cart" class="cart"/></a>
		</div>
	</header>

<!-- ******* NAV SHOP ***************** -->
	<div class="nav_shop">
		<ul id="ul_nav_shop">
			<a href="<?php echo "shop.php?value=all" ?>"><li><p>ALL</p></li></a>
			<hr/>
			<?php  
				$sql = "SELECT * FROM category";
				$product = mysqli_query($link, $sql);

				while ($data = mysqli_fetch_assoc($product)){
				echo "<a href='shop.php?value=".$data['id_cat']."'><li><p>".$data['name']."</p></li></a><hr/>";
				}
			?>
		</ul>
	</div>

<!-- ******* SHOP ***************** -->
	<section class="shop">
		<section class="container">
		<?php 
			if ($_GET['value'] != "all") {
				$id = $_GET['value'];
				$sql = "SELECT * FROM assoc WHERE id_cat_assoc = '$id'";
				$category = mysqli_query($link, $sql);

				while ($data = mysqli_fetch_assoc($category)){
					$id_prod = $data['id_prod_assoc'];
					$sql = "SELECT * FROM product WHERE id_prod = '$id_prod'";
					$product = mysqli_query($link, $sql);
					
					while ($data_2 = mysqli_fetch_assoc($product)){
						echo '<div class="square">
							<p>'.$data_2['name'].'</p>
							<img src="'.$data_2['img'].'" alt="rocket" class="rocket" />
							<div class="desc"><p>'.$data_2['descp'].'<br/><span class="price">'.$data['price'].' $</span></p></div>

							<a href="shop.php?value='.$_GET['value'].'&add='.$data_2['id_prod'].'">
							<img src="asset/icon/add.svg" alt="add" class="add"/></a>
							</div>';
					}
				}
			}
			else
			{
				$sql = "SELECT * FROM product";
				$product = mysqli_query($link, $sql);
				while ($data = mysqli_fetch_assoc($product)){
					if ($_GET['value'] === "all") {
						echo '<div class="square">
							<p>'.$data['name'].'</p>
							<img src="'.$data['img'].'" alt="rocket" class="rocket" />
							<div class="desc"><p>'.$data['descp'].'<br/><span class="price">'.$data['price'].' $</span></p></div>
							
							<a href="shop.php?value=all&add='.$data['id_prod'].'">
							<img src="asset/icon/add.svg" alt="add" class="add"/></a>
							</div>';
					}
				}
			}
		?>
		</section>
	</section>
</body>
</html>