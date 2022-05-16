<?php
include_once("../../conexion.php");
 
$id = $_GET['id_categoria'];
 
mysqli_query($conn, "DELETE FROM categoria WHERE id_categoria=$id");
 
header("Location:categorias.php");

?>