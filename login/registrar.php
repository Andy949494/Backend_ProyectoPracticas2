<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<script src="https://kit.fontawesome.com/0c5c5ff13c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../estilos/estilo_login.css">
    <title>Registro Andy Distribuidora</title>
  </head>
  <body>
<div>
<form method="post" action="registrar.php" name="andy_distribuidora">

<table>
<tr><td align="center"><label>Registro</label></td></tr>
<tr><td><img src="../imagenes/logo_distribuidora.png"/></td></tr>
<tr><td><div><i class="far fa-id-badge"></i> Nombre</div><input type="text" name="txtnombre" placeholder="Ingresar nombre" maxlength="50" required /> </td></tr>
<tr><td><div><i class="fas fa-id-badge"></i> Apellido</div><input type="text" name="txtapellido" placeholder="Ingresar apellido" maxlength="50" required /> </td></tr>
<tr><td><div><i class="fas fa-mobile-alt"></i> N° teléfono celular</div><input type="number" name="txtcel" placeholder="Incluir código de área" min="7" required /> </td></tr>
<tr><td><div><i class="fas fa-at"></i> Correo Electrónico</div><input type="email" name="txtcorreo" placeholder="Ingresar correo electrónico" required /></td></tr>
<tr><td><div><i class="fas fa-key"></i> Contraseña</div><input type="password" name="txtcontrasena" placeholder="Ingresar contraseña (mín 8 dígitos)" minlength="8" required /> </td></tr>
<tr><td><select name="rol" required>
<option value="0" style="display:none;"><label>Rol</label></option>
<option value="usuario">Usuario</option>
</select></td></tr>
<tr><td align="center"><input type="submit" value="Registrarse" name="btnregistrar"/> </td></tr>
<br>
<tr><td><a href="login.php" style="float:right">Iniciar sesión</a></td></tr>
</table>
</form>
</div>
</body>
</html>

<?php
include('../conexion.php');

session_start();
if(isset($_SESSION['administrador']))
{
	header('location: index_administrador.php');
} else if (isset($_SESSION['usuario'])){
  header('location: index_usuario.php');
}

if(isset($_POST["btnregistrar"]))
{

$nombre = $_POST["txtnombre"];
$apellido = $_POST["txtapellido"];
$tel = $_POST["txtcel"];
$correo = $_POST["txtcorreo"];
$contrasena = $_POST["txtcontrasena"];
$rol 	= $_POST["rol"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$correo."'");
$nr = mysqli_num_rows($query);
if($nr == 1){
	echo "<script> alert('El correo electrónico ya se encuentra registrado');window.location= 'registrar.php' </script>";
} else{

	$sqlgrabar = "INSERT INTO login(nombre,apellido,tel,correo,contrasena,rol) 
	values ('$nombre','$apellido','$tel','$correo','$contrasena','$rol')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='login.php' </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}
}
?>