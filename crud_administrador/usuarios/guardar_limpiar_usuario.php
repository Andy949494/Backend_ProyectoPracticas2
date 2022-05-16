<?php
include("../../conexion.php");
$nombre = $_POST["txtnombre"];
$apellido = $_POST["txtapellido"];
$tel = $_POST["txttelefono"];
$email = $_POST["txtemail"];
$contrasena = $_POST["txtcontrasena"];
$rol = $_POST["txtrol"];

	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: usuarios.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	{
		$query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$email."'");
		$nr = mysqli_num_rows($query);
		if($nr == 1){
		echo "<script> alert('El correo electrónico ya se encuentra registrado');window.location= 'usuarios.php' </script>";
		} else{

$sqlgrabar = "INSERT INTO login(nombre, apellido, tel, correo, contrasena, rol)
	 values ('$nombre','$apellido','$tel','$email','$contrasena','$rol')";

if(mysqli_query($conn,$sqlgrabar))
{
	echo "<script> alert('Usuario registrado con éxito.');window.location= 'usuarios.php' </script>";
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}
}
?>