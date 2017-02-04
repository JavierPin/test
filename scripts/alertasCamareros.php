<?php
include 'conect.php';
$espera = mysqli_query($mysqli,"SELECT * FROM mesas WHERE camarero = true");
echo "<section class='listado' id='espera'>";
echo "<h1>Alertas</h1><hr>";
while($row = mysqli_fetch_array($espera)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	echo"<article class='eListado' id='".$row['id']."'>
                Mesa: ".$row['id']." (".$row['mesa'].")<hr>
                <button class='bPedir' onclick='agregar(".$row['id'].")'>Atendido</button> 
    </article>";

}
echo"</section>";


mysqli_close($mysqli);

?>