<?php
include 'conect.php';


$espera = mysqli_query($mysqli,"SELECT p.foto, p.descripcion, p.precio, p.plato, p.disponible,p.id AS idPlato, p.plato FROM platos p, categorias c WHERE c.id = p.categoria AND c.id=".$_POST['acategoria']);

echo "<section id='listado'>";
while($row = mysqli_fetch_array($espera)){
	//echo "<b>".$row['usuario']."</b>: ".$row['contenido'];
	//echo "<hr>";
	if($row['foto']=="" || $row['foto']==null){
		$foto="logo.png";
	}else{
		$foto = $row['foto'];
	}
	if($row['disponible']){

		echo"<article class='eLista' id='".$row['idPlato']."'>

				<div><span style='float:left'> <p> <img src='recursos/".$foto."' alt='foto' width='90' height='90' id='Insert_logo'  display:block;' /> </p> </span> ".$row['plato']." 
					<span style='float:right'>Precio ".$row['precio']."€ </span>
				</div><hr>

	            ".$row['descripcion']."
	            <br>
	            <button class='bPedir' onclick='anadir(".$row['idPlato'].",".$_POST['acategoria'].")' ";
	                echo" >Pedir</button>
	    </article>";

	}
}
echo"</section>";


mysqli_close($mysqli);

?>