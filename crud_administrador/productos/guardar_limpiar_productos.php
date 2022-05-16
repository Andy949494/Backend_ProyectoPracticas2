<?php
include("../../conexion.php");

$categoria = $_POST["txtcategoria"];
$proveedor = $_POST["txtproveedor"];
$nombre = $_POST["txtnombre"];
$marca = $_POST["txtmarca"];
$modelo = $_POST["txtmodelo"];
$precio = $_POST["txtprecio"];
$imagen = $_POST["txtimagen"];
$codigo = $_POST["txtcodigo"];


	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: productos.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	{
		$query = mysqli_query($conn,"SELECT * FROM productos WHERE codigo = '".$codigo."'");
		$nr = mysqli_num_rows($query);
		if($nr == 1){
		echo "<script> alert('El producto ya se encuentra registrado');window.location= 'productos.php' </script>";
		} else{

	$sqlgrabar = "INSERT INTO productos(id_categoria, id_proveedor, nombre, marca, modelo, precio, imagen, codigo) values 
	('$categoria','$proveedor','$nombre','$marca','$modelo','$precio','$imagen','$codigo')";

if(mysqli_query($conn,$sqlgrabar))
{
	echo "<script> alert('Producto registrado con éxito.');window.location= 'productos.php' </script>";
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}
}
?>