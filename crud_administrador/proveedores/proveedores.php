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
<form name="Guardar_Limpiar" action="guardar_limpiar.php" method="post">
<table>
<tr><td colspan="8" align="center"><label class="label1">Registrar Proveedores </label><hr></td></tr>
<tr>
	<td ><label>Nombre</label> <input type="text" maxlength="50" name="txtnombre" required></td>
	<td ><label>Razon social</label> <input type="text" maxlength="50" name="txtrazon" required></td>
	<td ><label>Teléfono</label> <input type="number" maxlength="50"  name="txttelefono" placeholder="sólo números" min="7" required></td>
	<td ><label>Dirección</label> <input type="text" maxlength="50" name="txtdireccion" required></td>
	<td ><label>Ciudad</label> <input type="text" maxlength="50" name="txtciudad" required></td>
	<td ><label>CUIT/CUIL</label> <input type="text" maxlength="50" name="txtcuit" required></td>
	<td ><label>Email</label> <input type="email" maxlength="50" name="txtemail" required></td>
</tr>
<tr><td colspan="7" align="center">
<input type="submit" value="Guardar" name="grabardatos">
<input type="submit" value="Limpiar" name="limpiardatos" onClick="javascript: return confirm('Presione Aceptar para limpiar los formularios.');">
</td>
</tr>
</table>
</form>
<table class="tabla1">
<tr><td colspan="9" align="center"><label class="label2"> <br>Listado de Proveedores </label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar" style="float:left"></form>
<?php if(isset($_POST['buscar'])){header('location: busqueda.php');}?>
<hr></td></tr>
<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Nombre</label></td>
	<td><label>Razón social</label></td>
	<td><label>Teléfono</label></td>
	<td><label>Dirección</label></td>
	<td><label>Ciudad</label></td>
	<td><label>CUIT/CUIL</label></td>
	<td><label>Email</label></td>
	<td><label style="font-size: small;">Acción</label></td>

</tr>
<?php 
$sql="SELECT * FROM proveedores";
$result=mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
	<td><?php echo $mostrar['id_proveedor'] ?>
	<td><?php echo $mostrar['nombre_proveedor'] ?>
	<td><?php echo $mostrar['razon_social'] ?>
	<td><?php echo $mostrar['telefono'] ?>
	<td><?php echo $mostrar['direccion'] ?>
	<td><?php echo $mostrar['ciudad'] ?>
	<td><?php echo $mostrar['cuit_cuil'] ?>
	<td><?php echo $mostrar['email'] ?>	
	<td><?php echo "<a href=\"modificar.php?id_proveedor=$mostrar[id_proveedor]\">Modificar</a> 
	<a href=\"eliminar.php?id_proveedor=$mostrar[id_proveedor]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre_proveedor]?')\">Eliminar</a></td>";?>
</tr>
<?php
}
?>
</table>
</body>
</html>
