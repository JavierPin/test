<?php
include 'conect.php';

$sql = "DELETE FROM comandas WHERE id=".$_POST['aid'];
echo $sql;

if (!mysqli_query($mysqli,$sql)){
	die('Error: ' . mysqli_error($mysqli));
}
echo $sql;
mysqli_close($mysqli);

?>