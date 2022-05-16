<?php
include("../../conexion.php");
$nombre = $_POST["txtnombre"];
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: categorias.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	{
		$query = mysqli_query($conn,"SELECT * FROM categoria WHERE nombre_categoria = '".$nombre."'");
		$nr = mysqli_num_rows($query);
		if($nr == 1){
		echo "<script> alert('La categoría ya se encuentra registrada');window.location= 'categorias.php' </script>";
		} else{

	$sqlgrabar = "INSERT INTO categoria(nombre_categoria) values ('$nombre')";

if(mysqli_query($conn,$sqlgrabar))
{
	echo "<script> alert('Categoría registrada con éxito.');window.location= 'categorias.php' </script>";
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}
}
?>