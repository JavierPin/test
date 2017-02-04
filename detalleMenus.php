<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="css/HTML5_thrColFixHdr.css" rel="stylesheet" type="text/css"><!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<?php
include("scripts/conect.php");

if(isset($_GET['aid'])) {
    $id = $_GET['aid'];
} else {
    $id = 1;
}
if(isset($_GET["aenviar"])){
	if($_GET["aenviar"]=="Guardar"){
		$query = "UPDATE menus SET descripcion='".$_GET["adescripcion"]."', foto='".$_GET["afoto"]."', plato1=".$_GET["aplato1"].", plato2=".$_GET["aplato2"].", plato3=".$_GET["aplato3"].", precio=".$_GET["aprecio"].", disponible=".$_GET["adisponible"]." WHERE id=".$_GET["aid"];
		
	}else if($_GET["aenviar"]=="Nuevo"){
		$query=	"Insert INTO menus (descripcion, foto, plato1, plato2, plato3, precio) VALUES	('".$_GET["adescripcion"]."','".$_GET["afoto"]."',".$_GET["aplato1"].",".$_GET["aplato2"].",".$_GET["aplato3"].",".$_GET["aprecio"].")";
	}
	if(!$mysqli->query($query)) echo $query;
}



$consulta = "SELECT m.*, p1.plato AS nPlato1, p2.plato AS nPlato2, p3.plato AS nPlato3 FROM platos p1, platos p2, platos p3, menus m WHERE m.plato1=p1.id AND m.plato2=p2.id AND m.plato3=p3.id AND m.id=".$id;
if (!$resultado = $mysqli->query($consulta)) {
	//echo "error inesperado";
  echo $consulta;
}else{
	$fila = $resultado->fetch_assoc();
}
?>
<div class="container">
  <header>
  </header>
  <article class="content">
    <section>
		<form action="detalleMenus.php" method="get">
      <p>
   	  <img src=<?php echo "'recursos/".$fila['foto']."'"; ?> width="200" height="200" alt="plato" longdesc="foto de plato"><br>
      <input type="file" name="afoto" /><br> <br>
      <label>ID: </label><input type="text" name="aid" value=<?php echo $id; ?> readonly>Disponible<input type="checkbox" name="adisponible" value="1" checked> <br>
      <label>Descripcion: </label><textarea name="adescripcion"><?php echo $fila["descripcion"]; ?></textarea><br>
      <label>Plato 1: </label><select name="aplato1">
      	<option value="<?php echo $fila["plato1"];?>"> <?php echo $fila["nPlato1"]; ?></option>
        <?php
  				$consulta2 = "SELECT * FROM platos";
  				$resultado2 = $mysqli->query($consulta2);
  				while ($fila2 = $resultado2->fetch_assoc()) {
          			echo "<option value=". $fila2['id'].">".$fila2['plato']."</option>";
  				}
  			?>
      </select> <br>
      <label>Plato 2: </label><select name="aplato2">
        <option value="<?php echo $fila["plato2"];?>"> <?php echo $fila["nPlato2"]; ?></option>
        <?php
          $consulta2 = "SELECT * FROM platos";
          $resultado2 = $mysqli->query($consulta2);
          while ($fila2 = $resultado2->fetch_assoc()) {
                echo "<option value=". $fila2['id'].">".$fila2['plato']."</option>";
          }
        ?>
        </select> <br>
        <label>Plato 3: </label><select name="aplato3">
        <option value="<?php echo $fila["plato3"];?>"> <?php echo $fila["nPlato3"]; ?></option>
        <?php
          $consulta2 = "SELECT * FROM platos";
          $resultado2 = $mysqli->query($consulta2);
          while ($fila2 = $resultado2->fetch_assoc()) {
                echo "<option value=". $fila2['id'].">".$fila2['plato']."</option>";
          }
        ?>
      </select> <br>
      <label>Precio: </label><input type="text" name="aprecio" value=<?php echo $fila["precio"];?>><br><br>
      <label> Acciones: </label>
      <input type="submit" name="aenviar" value="Añadir">
      <input type="submit" name="aenviar" value="Modificar">
      </p>          
    </form>
    </section>

  <!-- end .content --></article>
  
  <footer>
   
  </footer>
  <!-- end .container --></div>
</body>
</html>