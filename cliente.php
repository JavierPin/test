<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Menú electrónico</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
<link rel="shortcut icon" href="/favicon.ico" />


<?php
session_start();

$_SESSION['_mesa']= $_POST["amesa"];

if (!isset($_SESSION['_mesa'])) {
  $_SESSION['_mesa'] = 1;
} else {
  $_SESSION['_mesa']= $_POST["amesa"];
}
?>


</head>
    <frameset rows="13%, 11%, *"   border="0" frameborder="0" framespacing="0">
        <frame scrolling="no" src= banner2.php name="banner"></frame>
    	<frame scrolling="no" src= opciones.php name="menu"></frame>
    	<!-- <frame src=  <?php echo "'mesa.html?aid=".$_SESSION['_mesa']."'";  ?>  name="opcion"></frame> -->
    	<frame src= catalogoM.php  name="opcion"></frame>
    </frameset>

</html>