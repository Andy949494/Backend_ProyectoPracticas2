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
<title>Practicas profesionalizantes II Andres Orlando</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>
<body>
<header>
<form method="POST">
<input type="submit" value="VOLVER AL INICIO" name="btnvolver"/>
<?php if(isset($_POST['btnvolver'])) {header('location: ../../vistas/vista_administrador.php');}?>
<input type="submit" value="Cerrar sesión" name="btncerrar"/>
<?php if(isset($_POST['btncerrar'])){session_destroy();header('location: ../../index.php');}?>
</form>
</header>
<form name="Guardar_Limpiar" action="guardar_limpiar_usuario.php" method="post">
<table>
<tr><td colspan="8" align="center"><label class="label1">Registrar usuario/administrador</label><hr></td></tr>
<tr>
	<td ><label>Nombre</label> <input type="text" maxlength="50" name="txtnombre" required></td>
	<td ><label>Apellido</label> <input type="text" maxlength="50" name="txtapellido" required></td>
	<td ><label>Teléfono</label> <input type="number" maxlength="50"  name="txttelefono" minlength="7" placeholder="sólo números" required></td>
	<td ><label>Email</label> <input type="email" maxlength="50" name="txtemail" required></td>
	<td ><label>Contraseña</label> <input type="text" maxlength="50" name="txtcontrasena" minlength="6" placeholder="mínimo 6 caracteres" required></td>
	<td ><label>Rol</label> <input type="text" maxlength="50" name="txtrol" placeholder="usuario/admin" required pattern="usuario|admin"></td>
</tr>
<tr><td colspan="6" align="center">
<input type="submit" value="Guardar" name="grabardatos">
<input type="submit" value="Limpiar" name="limpiardatos" onClick="javascript: return confirm('Presione Aceptar para limpiar los formularios.');">
</td>
</tr>
</table>
</form>


<table class="tabla1">
<tr><td colspan="8" align="center"><label class="label2"> <br>Listado de usuarios</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar" style="float:left"></form>
<?php if(isset($_POST['buscar'])){header('location: busqueda.php');}?>
<hr></td></tr>
<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Nombre</label></td>
	<td><label>Apellido</label></td>
	<td><label>Teléfono</label></td>
	<td><label>Email</label></td>
	<td><label>Contraseña</label></td>
	<td><label>Rol</label></td>
	<td><label style="font-size: small;">Acción</label></td>

</tr>
<?php 
$sql="SELECT * FROM login WHERE rol LIKE 'usuario'";
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
	<td><?php echo "<a href=\"modificar_usuario.php?id=$mostrar[id]\">Modificar</a> 
	<a href=\"eliminar_usuario.php?id=$mostrar[id]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]$mostrar[apellido]?')\">Eliminar</a></td>";?>
</tr>
<?php
}
?>
</table>


<table class="tabla2">
<tr><td colspan="9" align="center"><label class="label2"> <br>Listado de administradores</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar" style="float:left"></form>
<?php if(isset($_POST['buscar'])){header('location: busqueda_usuario.php');}?>
<hr></td></tr>
<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Nombre</label></td>
	<td><label>Apellido</label></td>
	<td><label>Teléfono</label></td>
	<td><label>Email</label></td>
	<td><label>Contraseña</label></td>
	<td><label>Rol</label></td>
	<td><label style="font-size: small;">Acción</label></td>

</tr>
<?php 
$sql="SELECT * FROM login WHERE rol LIKE 'admin'";
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
	<td><?php echo "<a href=\"modificar_usuario.php?id=$mostrar[id]\">Modificar</a> 
	<a href=\"eliminar_usuario.php?id=$mostrar[id]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]$mostrar[apellido]?')\">Eliminar</a></td>";?>
</tr>
<?php
}
?>
</table>





</body>
</html>
