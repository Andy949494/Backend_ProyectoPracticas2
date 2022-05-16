<?php
include_once("../../conexion.php");
 
$id = $_GET['id_producto'];
 
mysqli_query($conn, "DELETE FROM productos WHERE id_producto=$id");
 
header("Location:productos.php");

?>