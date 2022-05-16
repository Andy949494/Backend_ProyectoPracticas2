<?php
include("../../conexion.php");
$nombre = $_POST["txtnombre"];
$razon = $_POST["txtrazon"];
$tel = $_POST["txttelefono"];
$direccion = $_POST["txtdireccion"];
$ciudad = $_POST["txtciudad"];
$cuit = $_POST["txtcuit"];
$email = $_POST["txtemail"];

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{ 
		header("Location: proveedores.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	{
		$query = mysqli_query($conn,"SELECT * FROM proveedores WHERE email = '".$email."'");
		$nr = mysqli_num_rows($query);
		if($nr == 1){
		echo "<script> alert('El proveedor ya se encuentra registrado');window.location= 'proveedores.php' </script>";
		} else{

	$sqlgrabar = "INSERT INTO proveedores(nombre_proveedor, razon_social, telefono, direccion, ciudad, cuit_cuil, email) values ('$nombre','$razon','$tel','$direccion','$ciudad','$cuit','$email')";

if(mysqli_query($conn,$sqlgrabar))
{
	echo "<script> alert('Proveedor registrado con éxito.');window.location= 'proveedores.php' </script>";
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}
}
?>