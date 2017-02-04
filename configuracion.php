<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Configuracion</title>
<link href="css/HTML5_thrColFixHdr.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<?php
include("scripts/conect.php");

if(isset($_POST["aenviar"])){
	
		$query = "UPDATE configuracion SET nombre='".$_POST["anombre"]."', logo='".$_POST["alogo"]."', idioma='".$_POST["aidioma"]."', mostrar_tiempo=".$_POST["atiempo"].", pin_cocina=".$_POST["acocina"].", pin_camarero=".$_POST["acamarero"].", pin_admin=".$_POST["aadmin"];
		
	if(!$mysqli->query($query)) echo $query;
}

?>

<body>

<div class="container">
  <header>
    <a href="#"><img src="recursos/logo.png" alt="Logo" width="180" height="90" id="logo" style="background-color: #C6D580; display:block;" /></a>
  </header>
  <div class="sidebar1">  

  <!-- end .sidebar1 --></div>
  <article class="content">
    <h1>Configuración</h1>
    <section>
     <form action="configuracion.php" method="post">
     <p>
          <img src="recursos/logo.png" width="200" height="200" alt="plato" longdesc="foto de plato"><br>
          <input type="file" name="alogo" /><br>

          <label> Nombre: </label><input type="text" name="anombre" value="EMenú"><br>

          <label>Mostrar Tiempos</label><input type="checkbox" name="atiempo" value="1" checked> <br>
          <label>Pin Cocina: </label><input type="text" name="acocina" value="1234"><br>
          <label>Pin Camarero: </label><input type="text" name="acamarero" value="1234"><br>
          <label>Pin Admin: </label><input type="text" name="aadmin" value="1234"><br>
          <input type="submit" name="aenviar" value="Guardar"> 
      </p>  
      </form>
    </section>
    
  <!-- end .content --></article>
  <aside>
    <h4>Indicaciones</h4>
    <p><strong>Nombre</strong>: nombre en todas las páginas<br>
    <strong>Idioma por defecto</strong>: Lenguaje de la interface<br>
    <strong>Mostrar tiempos</strong>: Habilita/deshabilita la aproximación de tiempo en la carta<br>
    	<b>Cocina:</b> pin para acceder a la cocina<br>
        <b>Camarero:</b> pin para acceder a la aplicación de camareros<br>
        <b>Admin:</b> Pin para acceder a este menú<br>
    </p>
  </aside>
  <footer>
    <address>
      jps00008@red.ujaen.es
    </address>
  </footer>
  <!-- end .container --></div>
</body>
</html>