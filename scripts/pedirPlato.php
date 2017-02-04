<?php
include 'conect.php';

session_start();

$sql = "INSERT INTO comandas (mesa, plato) VALUES (".$_SESSION['_mesa'].", ".$_POST['aplato'].") ";
echo $sql;

if (!mysqli_query($mysqli,$sql)){
	die('Error: ' . mysqli_error($mysqli));
}

mysqli_close($mysqli);

?>