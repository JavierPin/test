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

$consulta = "SELECT * FROM categorias";
if (!$resultado = $mysqli->query($consulta)) {
	echo "error inesperado";
}
?>

<body>

<div class="container">
  <div class="sidebar1">
    <ul class="nav">
    <?php
		while ($fila = $resultado->fetch_assoc()) {
        	echo ("-".$fila["categoria"]."<br>");
			$consulta2 = "SELECT * FROM platos WHERE categoria=".$fila["id"];
			if ($resultado2 = $mysqli->query($consulta2)) {

				while ($fila2 = $resultado2->fetch_assoc()) {
					printf ("<li><a href='detallePlatos.php?aid=".$fila2["id"]."' target='der'>%s</a></li>", $fila2["plato"]);
				}
			}
    	}
	?>
    </ul>
   
  <!-- end .container --></div>
</body>
</html>