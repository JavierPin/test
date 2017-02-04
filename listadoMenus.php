<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Listado de platos</title>
<link href="css/HTML5_thrColFixHdr.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<?php
include("scripts/conect.php");

$consulta = "SELECT * FROM menus";
if (!$resultado = $mysqli->query($consulta)) {
	echo "error inesperado";
}
?>

<body>

<div class="container">
  <div class="sidebar1">
  <p>
    <ul class="nav">
    <?php
    	echo ("-Menus<br>");

			while ($fila2 = $resultado->fetch_assoc()) {
				printf ("<li><a href='detalleMenus.php?aid=".$fila2["id"]."' target='der'>%s</a></li>", $fila2["descripcion"]);
			}
	?>
    </ul>
   </p>
  <!-- end .container --></div>
</body>
</html>