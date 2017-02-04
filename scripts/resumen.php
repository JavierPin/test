<?php
include 'conect.php';
$espera = mysqli_query($mysqli,"SELECT m.id as id, m.mesa as nombre, sum(p.precio) AS total FROM comandas c, platos p, mesas m WHERE c.plato=p.id AND m.id=c.mesa AND c.mesa=".$_POST['amesa']);


$mesa=null;
$nombre=null;
$cuenta = 0;


if($row = mysqli_fetch_array($espera)){
	$mesa= $row['id'];
	$nombre= $row['nombre'];
}


//Consulta que da todo los elemento excepto los que estan en menu
$sql = "SELECT p.plato, p.precio FROM comandas c, mesas m, platos p WHERE p.id=c.plato AND m.id=c.mesa AND menu IS NULL AND c.mesa=". $_POST['amesa'];

//Consulta que devuelve los elementos que estan en menú
$sql2 ="SELECT me.descripcion, p.plato, me.precio FROM comandas c, mesas m, platos p, menus me WHERE c.menu=me.id AND p.id=c.plato AND m.id=c.mesa AND menu IS NOT NULL AND p.categoria!=1 AND p.categoria!=4 AND c.mesa=". $_POST['amesa'];

//obtencion de los elementos de la comanda.
$query1 = $mysqli->query($sql);
$query2 = $mysqli->query($sql2);


while ($lista1 = $query1->fetch_assoc()) {
  $cuenta+=$lista1['precio'];
}
while ($lista2 = $query2->fetch_assoc()) {
  $cuenta+=$lista2['precio'];
}



echo "
<div id=mesa hidden='true'>"
.$_POST['amesa']."
</div>
  <header>
  <div style='float:left'>
    <a href='#'><img src='recursos/logo.png' alt='Logo' width='180' height='90' id='Insert_logo' style='background-color: #C6D580; display:block;' /></a>
  </div>
   
  <div id=mesa style='float:right'>
    <p>Mesa: ".$nombre." (".$mesa.")</p>
    <hr>
    <p>Cuenta:".$cuenta."€</p>
  </div>
    
</header>
";

mysqli_close($mysqli);

?>