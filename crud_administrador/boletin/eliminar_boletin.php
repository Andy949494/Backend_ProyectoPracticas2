<?php
include_once("../../conexion.php");
 
$id = $_GET['id_boletin'];
 
mysqli_query($conn, "DELETE FROM boletin WHERE id_boletin=$id");
 
header("Location:boletin.php");

?>