<?php
include_once("../../conexion.php");
 
$id = $_GET['id_venta'];
 
mysqli_query($conn, "DELETE FROM ventas WHERE id_venta=$id");
 
header("Location:ventas.php");

?>