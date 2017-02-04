<?php
include 'conect.php';

$sql = "UPDATE mesas SET camarero = 1 WHERE id=".$_POST['amesa'];
//echo $sql;

if (!mysqli_query($mysqli,$sql)){
	die('Error: ' . mysqli_error($mysqli));
}

mysqli_close($mysqli);

?>