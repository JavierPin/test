<?php
include 'conect.php';


$espera = mysqli_query($mysqli,"SELECT m.id, m.foto, m.descripcion, p1.plato AS plato1, p2.plato AS plato2, p3.plato AS plato3, m.precio FROM menus m, platos p1, platos p2, platos p3 WHERE m.plato1=p1.id AND m.plato2=p2.id AND m.plato3=p3.id");


echo "<section id='listado'>";
while($row = mysqli_fetch_array($espera)){
	if($row['foto']=="" || $row['foto']==null){
		$foto="logo.png";
	}else{
		$foto = $row['foto'];
	}
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
		echo"<article class='eLista' id='".$row['id']."'>

				<div><span style='float:left'> <p> <img src='recursos/".$foto."' alt='foto' width='90' height='90' id='Insert_logo'  display:block;' /> </p> </span> ".$row['descripcion']." 
				<span style='float:right'>Precio ".$row['precio']."€ </span>
				</div><hr>

				<ul>
	                <li>".$row['plato1']."</li>
	                <li>".$row['plato2']."</li>
	                <li>".$row['plato3']."</li>
	            </ul>
	                <button class='bPedir' onclick='anadir(".$row['id'].")' ";
	                echo" >Pedir</button>
	    </article>";
echo "<hr>";
}
echo"</section>";


mysqli_close($mysqli);

?>