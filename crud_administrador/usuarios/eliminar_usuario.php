<?php
include_once("../../conexion.php");
 
$id = $_GET['id'];
 
mysqli_query($conn, "DELETE FROM login WHERE id=$id");
 
header("Location:usuarios.php");

?>