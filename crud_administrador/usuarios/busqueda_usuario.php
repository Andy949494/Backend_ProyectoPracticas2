<?php
include("../../conexion.php");
session_start();

if(isset($_SESSION['administrador']))
{
	$usuarioingresado = $_SESSION['administrador'];
	echo "<h1> Sesión administrador: $usuarioingresado </h1>";
}
else if (isset($_SESSION['usuario']))
{
	echo "<script> alert('Acceso denegado para usuarios');window.location= '../../vistas/vista_usuario.php' </script>";
}
else
{
	header('location: ../../index.php');
}

?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>

<body>
<header>
<form method="POST">
<input type="submit" value="VOLVER" name="btnvolver"/>
<input type="submit" value="Cerrar sesión" name="btncerrar"/>
</form></form>
</header>

<table>
<form action="" method="$_GET">
<tr><td colspan="8" align="center"><label class="label1">Buscar usuarios/administradores</label><hr></td></tr>
<tr>
	<td align="center"><input type="text" maxlength="50" name="txtbusqueda" placeholder="Introduzca nombre,correo,rol o id" size="26px"> 
	<input type="submit" value="Buscar" name="buscar" >
</td>
</tr>
</form>
</table>
<table class="tabla1">
<tr><td colspan="8" align="center"><label class="label2"> <br><br><br><br> Resultado</label> 
<hr></td></tr>

<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Nombre</label></td>
	<td><label>Apellido</label></td>
	<td><label>Teléfono</label></td>
	<td><label>Correo electrónico</label></td>
	<td><label>Contraseña</label></td>
	<td><label>Rol</label></td>
</tr>

<?php
if (isset($_GET['buscar'])){
$busqueda = ($_GET['txtbusqueda']);
$sql=("SELECT * FROM login WHERE id LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' 
OR apellido LIKE '%$busqueda%' OR correo LIKE '%$busqueda%' OR rol LIKE '%$busqueda%'");
$result=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
	<td><?php echo $mostrar['id'] ?>
	<td><?php echo $mostrar['nombre'] ?>
	<td><?php echo $mostrar['apellido'] ?>
	<td><?php echo $mostrar['tel'] ?>
	<td><?php echo $mostrar['correo'] ?>
	<td><?php echo $mostrar['contrasena'] ?>
	<td><?php echo $mostrar['rol'] ?>	
</tr>
<?php
}}
?>

</table>
</body>
<?php
if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../../index.php');
}
if(isset($_POST['btnvolver']))
{
	header('location: usuarios.php');
}
?>
</html>
