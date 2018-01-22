<?php 
	include 'php/connexion.php';
	$sql = "SELECT * FROM users";
	$user = mysqli_query($link, $sql);

	$bol = 0;
	while ($data = mysqli_fetch_assoc($user)){
		if ($data['admin'] == 1 && $_SESSION['login'] === $data['login']) {
			 $bol = 1;
		}
	}
	if ($bol == 0) {
		echo '<script>document.location.href="../index.php"</script>';
	}
?>

<!DOCTYPE html>
<html id='HTML' xmlns:og="http://ogp.me/ns#" lang="fr">
<head>
	<meta charset="utf-8">
	<title>SpaceX - Admin</title>
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
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body>
<!-- ******* HEADER ***************** -->
	<header class="float_menu">
		<div class="float_menu_middle">
			<a href="index.php"><img src="asset/img/logo.png" alt="logo" class="logo"/></a>
		</div>
	</header>

<!-- ******* BACKGROUND MENU ***************** -->
	<section class="background_menu">
	<!-- DISPLAY -->
	<div class="display">
		<!-- PRODUCT-->
		<p>PRODUCT :<p>
		<table>
			<tr class="menu">
				<td>id_prod</td>
				<td>name</td>
				<td>descp</td>
				<td>price</td>
				<td>img</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM product";
			$product = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($product)){
				echo "<tr><td>".$data['id_prod']."</td><td>".$data['name']."</td><td>".$data['descp']."</td><td>".$data['price']."</td><td>".$data['img']."</td></tr>";
			}
		?>
		</table>

		<!-- CATEGORY TO PRODUCT : -->
		<p>CATEGORY TO PRODUCT :<p>
		<table>
			<tr class="menu">
				<td>id_assoc</td>
				<td>id_category</td>
				<td>id_product</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM assoc";
			$category = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($category)){
				echo "<tr><td>".$data['id_assoc']."</td><td>".$data['id_cat_assoc']."</td><td>".$data['id_prod_assoc']."</td></tr>";
			}
		?>
		</table>

		<!-- CATEGORY-->
		<p>CATEGORY :<p>
		<table>
			<tr class="menu">
				<td>id_cat</td>
				<td>name</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM category";
			$category = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($category)){
				echo "<tr><td>".$data['id_cat']."</td><td>".$data['name']."</td></tr>";
			}
		?>
		</table>

		<!-- ADMIN -->
		<p>ADMIN :<p>
		<table>
			<tr class="menu">
				<td>id</td>
				<td>name</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM users";
			$category = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($category)){
				if ($data['admin'] == 1) {
				echo "<tr><td>".$data['id_user']."</td><td>".$data['login']."</td></tr>";
				}
			}
		?>
		</table>

		<!-- USERS-->
		<p>USERS :<p>
		<table>
			<tr class="menu">
				<td>id</td>
				<td>name</td>
				<td>admin</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM users";
			$category = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($category)){
				echo "<tr><td>".$data['id_user']."</td><td>".$data['login']."</td><td>".$data['admin']."</td></tr>";
			}
		?>
		</table>

		<!--ORDER -->
		<p>ORDER :<p>
		<table>
			<tr class="menu">
				<td>order</td>
			</tr>
		<?php 
			$sql = "SELECT * FROM order_shop";
			$category = mysqli_query($link, $sql);

			while ($data = mysqli_fetch_assoc($category)){

				$tab = unserialize($data['order_text']);
				echo "<tr>";
				foreach ($tab as $index => $value) {
					if ($value['product'] != "") {
						echo "<td>".$value['product']."</td>";
					}
					if ($value['price'] != "") {
						echo "<td>".$value['price']."</td>";
					}
					if ($value['qty'] != "") {
						echo "<td>".$value['qty']."|</td>";
					}
					if ($value['total'] != "") {
						echo "<td>Totat__".$value['total']."</td>";
					}	
				}
				echo "</tr>";
			}
		?>
		</table>

	</div>
	<section class="div_admin">
	<!-- PRODUCT -->
		<!-- ADD -->
		<p>ADD PRODUCT :<p>
        <form method="post" action="php/product.php" accept-charset="utf-8">
			<input type="text" name="name" placeholder="name" required/>
			<input type="text" name="descp" placeholder="description" required/>
			<input type="number" name="price" placeholder="price" required/>
			<input type="text" name="img" placeholder="image" required/>
			<input type="submit" name="submit" value="VALIDATE_ADD"/>
        </form>
        <!-- MODIFY -->
        <p>MODIFY PRODUCT :</p>
        <form method="post" action="php/product.php" accept-charset="utf-8">
          	<input type="number" name="id_prod" placeholder="id_prod" required/>
			<input type="text" name="name" placeholder="name" required/>
			<input type="text" name="descp" placeholder="description" required/>
			<input type="number" name="price" placeholder="price" required/>
			<input type="text" name="img" placeholder="image" required/>
			<input type="submit" name="submit" value="VALIDATE_MODIFY"/>
        </form>
        <!-- DELETE -->
        <p>DELETE PRODUCT :</p>
        <form method="post" action="php/product.php" accept-charset="utf-8">
          	<input type="number" name="id_prod" placeholder="id_prod" required/>
			<input type="submit" name="submit" value="VALIDATE_DEL"/>
        </form>
	<hr>

	<!-- CATEGORIE TO PRODUCT -->
	<!-- ADD-->
        <p>ADD CATEGORY TO PRODUCT :</p>
        <form method="post" action="php/assoc.php" accept-charset="utf-8">
          	<input type="number" name="id_cat" placeholder="id_cat" required/>
          	<input type="number" name="id_prod" placeholder="id_prod" required/>
			<input type="submit" name="submit" value="VALIDATE_ADD"/>
        </form>
    <!-- DELETE -->
        <p>DELETE CATEGORY TO PRODUCT :</p>
        <form method="post" action="php/assoc.php" accept-charset="utf-8">
          	<input type="number" name="id" placeholder="id_assoc" required/>
			<input type="submit" name="submit" value="VALIDATE_DEL"/>
        </form>
	<hr>

	<!-- CATEGORIE -->
		<!-- ADD -->
		<p>ADD CATEGORIE :<p>
        <form method="post" action="php/category.php" accept-charset="utf-8">
			<input type="text" name="name" placeholder="name" required/>
			<input type="submit" name="submit" value="VALIDATE_ADD"/>
        </form>
        <!-- DEL -->
        <p>DEL CATEGORIE :<p>
        <form method="post" action="php/category.php" accept-charset="utf-8">
			<input type="number" name="id_cat" placeholder="id_cat" required/>
			<input type="submit" name="submit" value="VALIDATE_DEL"/>
        </form>
	
	<hr>
	<!-- OP USER -->
	<!-- ADD -->
	<p>ADD ADMIN :<p>
        <form method="post" action="php/admin.php" accept-charset="utf-8">
			<input type="number" name="id_user" placeholder="id_user" required/>
			<input type="submit" name="submit" value="VALIDATE_ADD"/>
        </form>
    <!-- ADD -->
	<p>DEL ADMIN :<p>
        <form method="post" action="php/admin.php" accept-charset="utf-8">
			<input type="number" name="id_user" placeholder="id_user" required/>
			<input type="submit" name="submit" value="VALIDATE_DEL"/>
        </form>
    <hr>
    
	</section>
	</section>
</body>
</html>