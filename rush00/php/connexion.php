<?php
session_start();
$host = "localhost";
$user = "root";
$password = "coucou";
$db = "Rush00";

$link = mysqli_connect($host, $user, $password, $db);
if(mysqli_connect_errno())
{
	die("Erreur de connexion : ".mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
?>