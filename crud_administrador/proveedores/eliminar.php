<?php
include_once("../../conexion.php");
 
$id = $_GET['id_proveedor'];
 
mysqli_query($conn, "DELETE FROM proveedores WHERE id_proveedor=$id");
 
header("Location:proveedores.php");

?>