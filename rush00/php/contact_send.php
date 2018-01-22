<?php
if (!empty($_POST)) {
	include 'connexion.php';
	extract($_POST);

	$name = $_POST['name'];
	$from = $_POST['email'];
	$message = $_POST['text'];

	$name = mysqli_real_escape_string($link, $name);
	$from = mysqli_real_escape_string($link, $from);
	$message = mysqli_real_escape_string($link, $message);

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
 
    $to = "cella.nicolas@hotmail.com";
 
    $headers = "From:" . $from;
    mail($to, $name, $message, $headers);
    echo '<script>document.location.href="../index.php"</script>';
}
else{
	echo '<script>document.location.href="../contact.php"</script>';
}
?>
