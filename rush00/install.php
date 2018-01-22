<?php
try
{
	$host = "localhost";
	$user = "root";
	$password = "coucou";
	$mysqli   = mysqli_connect($host, $user, $password);
	if (mysqli_connect_errno($mysqli)) {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	mysqli_query($mysqli, "CREATE DATABASE Rush00");
	mysqli_query($mysqli, "use Rush00");


	$req = mysqli_query($mysqli, "CREATE TABLE `assoc` (
  `id_assoc` int(11) NOT NULL,
  `id_cat_assoc` int(11) DEFAULT NULL,
  `id_prod_assoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	$req = mysqli_query($mysqli, "INSERT INTO `assoc` (`id_assoc`, `id_cat_assoc`, `id_prod_assoc`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 2, 3),
(5, 2, 4),
(6, 3, 5),
(7, 3, 6),
(8, 2, 1),
(9, 3, 4);");

	$req = mysqli_query($mysqli, "CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	$req = mysqli_query($mysqli, "INSERT INTO `category` (`id_cat`, `name`) VALUES
(1, 'Mars'),
(2, 'Moon'),
(3, 'Venus');");

	$req = mysqli_query($mysqli, "CREATE TABLE `order_shop` (
  `id_order` int(11) NOT NULL,
  `order_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	$req = mysqli_query($mysqli, "CREATE TABLE `product` (
  `id_prod` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `descp` varchar(250) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	$req = mysqli_query($mysqli, "INSERT INTO `product` (`id_prod`, `name`, `descp`, `price`, `img`) VALUES
(1, 'TX ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores ', 1000000, 'asset/rocket_1.jpg'),
(2, 'SW', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores ', 1500000, 'asset/rocket_2.jpg'),
(3, 'TX4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores', 2000000, 'asset/rocket_3.jpg'),
(4, 'GHU', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores ', 4000000, 'asset/rocket_4.jpg'),
(5, 'ASH-TY', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores ', 4600000, 'asset/rocket_5.jpg'),
(6, 'NUYH', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, molestias? Expedita fuga ipsum, magnam accusamus reiciendis similique dicta maiores ', 3000000, 'asset/rocket_6.jpg');
");

	$req = mysqli_query($mysqli, "CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `passwd` varchar(300) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

	$req = mysqli_query($mysqli, "INSERT INTO `users` (`id_user`, `login`, `passwd`, `admin`) VALUES
(1, 'admin@shop.com', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 1);
");

	$req = mysqli_query($mysqli, "ALTER TABLE `assoc`
  ADD PRIMARY KEY (`id_assoc`);");

	$req = mysqli_query($mysqli, "ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);");

	$req = mysqli_query($mysqli, "ALTER TABLE `order_shop`
  ADD PRIMARY KEY (`id_order`);");

	$req = mysqli_query($mysqli, "ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`);");

	$req = mysqli_query($mysqli, "ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);");

	$req = mysqli_query($mysqli, "ALTER TABLE `assoc`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;");

	$req = mysqli_query($mysqli, "ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;");

	$req = mysqli_query($mysqli, "ALTER TABLE `order_shop`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;");

	$req = mysqli_query($mysqli, "ALTER TABLE `product`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;");

	$req = mysqli_query($mysqli, "ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");


	session_start();

	unset($_SESSION['id_user']);
	unset($_SESSION['login']);
	unset($_SESSION['cart']);
	echo '<script>document.location.href="index.php";</script>';

	exit();
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>