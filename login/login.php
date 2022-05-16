<html>
  <head>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://kit.fontawesome.com/0c5c5ff13c.js" crossorigin="anonymous"></script>
    <title>Login Andy Distribuidora</title>
    <link rel="stylesheet" href="../estilos/estilo_login.css">
  </head>
  <body>
<div>
<form method="post" action="login.php" name="andy_distribuidora">

<table>

<tr><td align="center"><label>Ingresar</label></td></tr>
<tr><td><img src="../imagenes/logo_distribuidora.png"/></td></tr>
<tr><td><div><i class="fas fa-at"></i> Correo electrónico</div><input type="email" name="txtcorreo" placeholder="Ingresar correo electrónico" required /></td></tr>
<tr><td><div><i class="fas fa-key"></i> Contraseña</div><input type="password" name="txtcontrasena" placeholder="Ingresar contraseña" required /></td></tr>
<tr><td><select name="rol">
<option value="0" style="display:none;"><label>Rol</label></option>
<option value="usuario">Usuario</option>
<option value="admin">Administrador</option>
</select></td></tr>
<tr><td align="center"><input type="submit" value="Iniciar sesión" name="btningresar"/> </td></tr>

<br>
<tr><td><a href="recuperar.php" style="float:left">Recuperar contraseña</a><a href="registrar.php" style="float:right">Crear una cuenta</a></td></tr>

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
	header('location: vistas/vista_administrador.php');
} else if (isset($_SESSION['usuario'])){
  header('location: vistas/vista_usuario.php');
}

if(isset($_POST['btningresar']))
{
	
$correo = $_POST["txtcorreo"];
$contrasena = $_POST["txtcontrasena"];
$rol 	= $_POST["rol"];
	
$query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$correo."' and contrasena = '".$contrasena."' and rol = '".$rol."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
  if($rol=="usuario")
			{	
				$_SESSION['usuario']=$correo;
	      header("Location: ../vistas/vista_usuario.php");
			}
		else if ($rol=="admin")
			{
				$_SESSION['administrador']=$correo;
	      header("Location: ../vistas/vista_administrador.php");
			}
    }
else if ($nr == 0){
  $query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$correo."' and contrasena != '".$contrasena."' and rol = '".$rol."'");
  $nr = mysqli_num_rows($query);
  if($nr == 1){
    echo "<script> alert('Contraseña incorrecta');window.location= 'login.php' </script>";
  }
  else if ($nr == 0){
        $query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$correo."' and contrasena = '".$contrasena."' and rol != '".$rol."'");
       $nr = mysqli_num_rows($query);
    if($nr == 1){
        echo "<script> alert('¡Rol incorrecto!');window.location= 'login.php' </script>";
  } else if ($nr == 0){
        $query = mysqli_query($conn,"SELECT * FROM login WHERE correo = '".$correo."' and contrasena != '".$contrasena."' and rol != '".$rol."'");
        $nr = mysqli_num_rows($query);
    if($nr == 1){
        echo "<script> alert('Contraseña incorrecta');window.location= 'login.php' </script>";
  } else if ($nr == 0){
        echo "<script> alert('Usuario no registrado');window.location= 'login.php' </script>";

  }
}
}
}
}
?>
