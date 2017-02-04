<?php
include 'conect.php';

session_start();

$menu = "SELECT * FROM menus WHERE id=".$_POST['amenu'];

$espera = mysqli_query($mysqli,$menu);

$platos = mysqli_fetch_array($espera);


$sql1 = "INSERT INTO comandas (mesa, plato, menu) VALUES (".$_SESSION['_mesa'].", ".$platos['plato1'].", ".$_POST['amenu'].") ";
$sql2 = "INSERT INTO comandas (mesa, plato, menu) VALUES (".$_SESSION['_mesa'].", ".$platos['plato2'].", ".$_POST['amenu'].") ";
$sql3 = "INSERT INTO comandas (mesa, plato, menu) VALUES (".$_SESSION['_mesa'].", ".$platos['plato3'].", ".$_POST['amenu'].") ";


if (!mysqli_query($mysqli,$sql1)){
	die('Error: ' . mysqli_error($mysqli));
}

if (!mysqli_query($mysqli,$sql2)){
	die('Error: ' . mysqli_error($mysqli));
}

if (!mysqli_query($mysqli,$sql3)){
	die('Error: ' . mysqli_error($mysqli));
}

mysqli_close($mysqli);

?>