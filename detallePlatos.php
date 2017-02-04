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
		$query = "UPDATE platos SET plato='".$_GET["aplato"]."', descripcion='".$_GET["adescripcion"]."', foto='".$_GET["afoto"]."', precio=".$_GET["aprecio"].", categoria=".$_GET["acategoria"].", t_preparacion=".$_GET["atiempo"].", disponible=".$_GET["adisponible"]." WHERE id=".$_GET["aid"];
		
	}else if($_GET["aenviar"]=="Nuevo"){
		$query=	"Insert INTO platos (plato, descripcion,foto,precio,categoria,t_preparacion) VALUES	('".$_GET["aplato"]."','".$_GET["adescripcion"]."','".$_GET["afoto"]."',".$_GET["aprecio"].",".$_GET["acategoria"].",".$_GET["atiempo"].")";
	}
	if(!$mysqli->query($query)) echo $query;
}



$consulta = "SELECT p.*, c.categoria AS nCategoria FROM platos p, categorias c WHERE p.categoria=c.id AND p.id=".$id;
if (!$resultado = $mysqli->query($consulta)) {
	echo "error inesperado";
}else{
	$fila = $resultado->fetch_assoc();
}
?>
<div class="container">
  <header>
  </header>
  <article class="content">
    <section>

		<form action="detallePlatos.php" method="get">
    <p>
       	  <img src= <?php echo "'recursos/".$fila['foto']."'"; ?> width="200" height="200" alt="plato" longdesc="foto de plato"><br>
          <input type="file" name="afoto" /><br> <br>
          <label>ID: </label><input type="text" name="aid" value=<?php echo $id; ?> readonly><br>
          <label>Plato: </label><input type="text" name="aplato" value="<?php echo $fila['plato']; ?>" ><br>
          <label>Disponible</label><input type="checkbox" name="adisponible" value="1" checked> <br>
          <label>Descripción: </label><textarea name="adescripcion"><?php echo $fila["descripcion"]; ?></textarea><br>
          <label>Categoria: </label><select name="acategoria">
          	<option value="<?php echo $fila["categoria"];?>"> <?php echo $fila["nCategoria"]; ?></option>
            <?php
				$consulta2 = "SELECT * FROM categorias";
				$resultado2 = $mysqli->query($consulta2);
				while ($fila2 = $resultado2->fetch_assoc()) {
        			echo "<option value=". $fila2['id'].">".$fila2['categoria']."</option>";
				}
			?>
          </select> <br>
          <label>Precio: </label><input type="text" name="aprecio" value=<?php echo $fila["precio"];?>><br>
          <label>Tiempo preparación: </label> <br><input type="text" name="atiempo" value=<?php echo $fila["t_preparacion"];?>><br><br>
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