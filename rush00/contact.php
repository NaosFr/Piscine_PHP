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
	<link rel="icon" type="image/png" href="asset/icon/favicon.png" />

	<!-- ******* CSS ***************** -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/cross.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>

<body>
<!-- ******* HEADER ***************** -->
	<header class="float_menu">
		<div class="float_menu_middle">
			<a href="index.php"><img src="asset/img/logo.png" alt="logo" class="logo"/></a>
		</div>
	</header>
	<section class="contactme">
	<!-- Div du formulaire -->
		<div id="form-div">
    	<!-- Formulaire demande d'information -->
    	<form class="form" id="form1" action="php/contact_send.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
    	<p class="name"><!-- name -->
       		<input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" required />
    	</p>
      
     	<p class="email"><!-- email -->
       		<input name="email" type="email" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email Address" required />
    	</p>
      
    	<p class="text"><!-- text -->
       		<textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Message" required></textarea>
    	</p>
      
    	<div class="submit"><!-- send -->
      		<input type="submit" value="SEND" id="button-blue"/>
    	<div class="ease"></div>
		
    	</div>
    	</form>
		
		<a href="index.php">
    	<div class="exit_contact">
			<span class="cross1_contact cross_contact"></span>
			<span class="cross2_contact cross_contact"></span>
		</div>
		</a>
</section>

</body>
</html>