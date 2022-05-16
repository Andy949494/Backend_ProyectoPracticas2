<?php
include("../../conexion.php");
$nombre = $_POST["txtcorreo"];
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos']))
	{
		header("Location: boletin.php");
	}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos']))
	{
		$query = mysqli_query($conn,"SELECT * FROM boletin WHERE correo = '".$nombre."'");
		$nr = mysqli_num_rows($query);
		if($nr == 1){
		echo "<script> alert('El correo electrónico ya se encuentra registrado en el boletín informativo');window.location= 'boletin.php' </script>";
		} else{

	$sqlgrabar = "INSERT INTO boletin(correo) values ('$nombre')";

if(mysqli_query($conn,$sqlgrabar))
{
	echo "<script> alert('Correo electrónico registrado con éxito.');window.location= 'boletin.php' </script>";
}else 
{
	echo "Error: " .$sql."<br>".mysql_error($conn);
}
	}
}
?>