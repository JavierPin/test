<?php
include 'conect.php';
$espera = mysqli_query($mysqli,"SELECT p.foto, p.descripcion, p.id AS idPlato, p.plato, c.estado, c.id AS comanda FROM comandas c, platos p WHERE c.plato = p.id AND c.mesa=".$_POST['aid']);

echo "<section id='listado'>";
while($row = mysqli_fetch_array($espera)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	echo"<article class='eLista' id='".$row['comanda']."'>
				<div><span class=".$row['estado']." style='float:right'>".$row['estado']."</span>".$row['plato']."</div>
                <hr>
                ".$row['descripcion']."
                <span style='float:right'><button onclick='eliminar(".$row['comanda'].")' ";
                if($row['estado']!='espera'){echo "disabled";} 
                echo" >Cancelar</button></span>
    </article>";

}
echo"</section>";


mysqli_close($mysqli);

?>