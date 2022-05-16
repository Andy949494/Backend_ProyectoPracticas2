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
<form name="Guardar_Limpiar" action="guardar_limpiar_boletin.php" method="post">
<table>
<tr><td colspan="8" align="center"><label class="label1">Registrar correos electrónicos</label><hr></td></tr>
<tr>
	<td align="center"><label>Correo electrónico</label> <input type="email" maxlength="50" name="txtcorreo" required></td>
</tr>
<tr><td colspan="7" align="center">
<input type="submit" value="Guardar" name="grabardatos">
<input type="submit" value="Limpiar" name="limpiardatos" onClick="javascript: return confirm('Presione Aceptar para limpiar los formularios.');">
</td>
</tr>
</table>
</form>
<table class="tabla1">
<tr><td colspan="9" align="center"><label class="label2"> <br>Listado de correos electrónicos</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar" style="float:left"></form>
<?php if(isset($_POST['buscar'])){header('location: busqueda_boletin.php');}?>
<hr></td></tr>
<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Correo electrónico</label></td>
	<td><label style="font-size: small;">Acción</label></td>
</tr>
<?php 
$sql="SELECT * FROM boletin";
$result=mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
	<td><?php echo $mostrar['id_boletin'] ?>
	<td><?php echo $mostrar['correo'] ?>
	<td><?php echo "<a href=\"modificar_boletin.php?id_boletin=$mostrar[id_boletin]\">Modificar</a> 
	<a href=\"eliminar_boletin.php?id_boletin=$mostrar[id_boletin]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar el correo $mostrar[correo]?')\">Eliminar</a></td>";?>
</tr>
<?php
}
?>
</table>
</body>
</html>
