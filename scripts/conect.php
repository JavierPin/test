<?php
$mysqli = new mysqli("localhost", "root", "", "emenu");

/* verificar la conexión */
if ($mysqli->connect_errno) {
    printf("Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
}

?>