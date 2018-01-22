<?php 
session_start();

setcookie('id_user', '');
setcookie('login', '');
$_SESSION['id_user'] = "";
$_SESSION['login'] = "";

echo '<script>document.location.href="../index.php"</script>';

?>