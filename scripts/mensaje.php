<?php
include 'conect.php';
$espera = mysqli_query($mysqli,"SELECT m.id AS idMesa, c.estado,c.id, m.mesa AS nombreMesa, p.plato AS nombrePlato FROM comandas c, mesas m, platos p WHERE m.id=c.mesa AND p.id = c.plato AND c.estado ='espera'");
$proceso = mysqli_query($mysqli,"SELECT m.id AS idMesa, c.estado,c.id, m.mesa AS nombreMesa, p.plato AS nombrePlato FROM comandas c, mesas m, platos p WHERE m.id=c.mesa AND p.id = c.plato AND c.estado ='proceso'");
$terminado = mysqli_query($mysqli,"SELECT m.id AS idMesa, c.estado,c.id, m.mesa AS nombreMesa, p.plato AS nombrePlato FROM comandas c, mesas m, platos p WHERE m.id=c.mesa AND p.id = c.plato AND c.estado ='terminado'");

echo "<section class='listado' id='espera' ondragenter='return enter(event)' ondragover='return over(event)' ondrop= 	        'return drop(event)'>";
echo"<p><h2>En espera</h2></p><hr>";
while($row = mysqli_fetch_array($espera)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	echo"<article class='eLista' id='".$row['id']."' draggable='true' ondragstart='return empezar(event)' ondragend=		            'return end(event)'>
                Plato: ".$row['nombrePlato']."<br><hr>
                Mesa: ".$row['idMesa']." (".$row['nombreMesa'].")<br>
                <button onclick='agregar(".$row['id'].",\"proceso\")'>→</button> 
    </article>";

}
echo"</section>";


echo "<section class='listado' id='proceso' ondragenter='return enter(event)' ondragover='return over(event)' ondrop= 	        'return drop(event)'>";
echo"<p><h2>En proceso</h2></p><hr>";
while($row = mysqli_fetch_array($proceso)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	echo"<article class='eLista' id='".$row['id']."' draggable='true' ondragstart='return empezar(event)' ondragend=		            'return end(event)'>
                Plato: ".$row['nombrePlato']."<br><hr>
                Mesa: ".$row['idMesa']." (".$row['nombreMesa'].")<br>
                <button onclick='agregar(".$row['id'].",\"espera\")'>←</button> 
                <button onclick='agregar(".$row['id'].",\"terminado\")'>→</button> 
    </article>";

}
echo"</section>";

echo "<section class='listado' id='terminado' ondragenter='return enter(event)' ondragover='return over(event)' ondrop= 	        'return drop(event)'>";
echo"<p><h2>Terminados</h2></p><hr>";
while($row = mysqli_fetch_array($terminado)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	echo"<article class='eLista' id='".$row['id']."' draggable='true' ondragstart='return empezar(event)' ondragend=		            'return end(event)'>
                Plato: ".$row['nombrePlato']."<br><hr>
                Mesa: ".$row['idMesa']." (".$row['nombreMesa'].")<br>
                <button onclick='agregar(".$row['id'].",\"proceso\")'>←</button> 
    </article>";

}
echo"</section>";


mysqli_close($mysqli);

?>