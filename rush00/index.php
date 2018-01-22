<?php 
include 'php/connexion.php';
session_start();

if ($_SESSION['id_user'] != "" && $_SESSION['login'] != "")
{
	$nav_log = '<ul class="ul_log"><a href="modify.html"><li><p>Modify</p></li></a><a href="php/log_out.php"><li><p>Logout</p></li></a></ul>';
}else{
	$nav_log = '<ul class="ul_log"><a href="login.html"><li><p>Login</p></li></a><a href="register.html"><li><p>Register</p></li></a></ul>';
}

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
		<div id="nav_icon">
        	<span></span>
        	<span></span>
        	<span></span>
        	<span></span>
        	<span></span>
        	<span></span>
   		</div>  
	</header>

<!-- ******* BACKGROUND MENU ***************** -->
	<section class="background_menu">
		<h1 class="title_square">ROCKET SPACE SHOP</h1>
	</section>

<!-- ******* NAV SHOP ***************** -->
	<div class="nav_shop">
		<ul id="ul_nav_shop">
			<a href="shop.php?value=all"><li><p>Shop</p></li></a>
			<hr/>
			<a href="#"><li><p>Forum</p></li></a>
			<hr/>
			<a href="contact.php"><li><p>Contact</p></li></a>
			<hr/>
			<a href="#"><li><p>Sav</p></li></a>
			<hr/>
		</ul>
	</div>
	<!-- ******* JS ***************** -->
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>