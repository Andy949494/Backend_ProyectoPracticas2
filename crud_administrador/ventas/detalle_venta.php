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
<input type="submit" value="VOLVER A VENTAS" name="btnvolver"/>
<?php if(isset($_POST['btnvolver'])) {header('location: ventas.php');}?>
<input type="submit" value="Cerrar sesión" name="btncerrar"/>
<?php if(isset($_POST['btncerrar'])){session_destroy();header('location: ../../index.php');}?>
</form>
</header>
<table class="tabla1" style="top: 80%; height:700px;width:auto;margin-left:100px;">
<tr><td colspan="16" align="center"><label class="label2"> <br>Detalle</label> 
<hr></td></tr>
<tr class="tr1">
	<td><label>ID venta</label></td>
	<td><label>ID Producto</label></td>
	<td><label>Nombre</label></td>
	<td><label>Cantidad</label></td>
    <td><label>Precio</label></td>
</tr>
<?php 
$sql="SELECT * FROM detalle_ventas";
$result=mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
	<td><?php echo $mostrar['id_venta'] ?>
	<td><?php echo $mostrar['id_producto'] ?>
    <td><?php echo $mostrar['nombre_prod'] ?>
    <td><?php echo $mostrar['cantidad'] ?>
    <td><?php echo $mostrar['precio'] ?>
</tr>
<?php
}
?>
</table>
</body>
</html>
