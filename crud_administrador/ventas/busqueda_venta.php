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
<?php
if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../../index.php');
}

?>
<input type="submit" value="Cerrar sesión" name="btncerrar"/>
<?php
if(isset($_POST['btnvolver']))
{
	header('location: ventas.php');
}
?>
</form>
</header>

<table>
<form action="" method="$_GET">
<tr><td colspan="8" align="center"><label class="label1">Buscar ventas</label><hr></td></tr>
<tr>
	<td align="center"><input type="text" maxlength="50" name="txtbusqueda" placeholder="Introduzca id, fecha o nombre/apellido" size="32px"> 
	<input type="submit" value="Buscar" name="buscar" >
</td>
</tr>
</form>
</table>
<table class="tabla1" style="top: 63%; height:700px">
<tr><td colspan="16" align="center"><label class="label2"> <br><br><br><br> Resultado </label> 
<hr></td></tr>

<tr class="tr1">
	<<td><label>ID venta</label></td>
	<td><label>Cliente</label></td>
	<td><label>Fecha</label></td>
	<td><label>Total</label></td>
	<td><label style="font-size: small;">Acción</label></td>
</tr>

<?php
if (isset($_GET['buscar'])){
$busqueda = ($_GET['txtbusqueda']);
$sql=("SELECT ventas.id_venta, ventas.fecha, ventas.total, login.nombre, login.apellido FROM ventas
INNER JOIN login ON ventas.id_usuario = login.id
WHERE id_venta LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR fecha LIKE '%$busqueda%'");
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
?>
<tr class="tr2"> 
<td><?php echo $row["id_venta"]; ?>
	<td><?php echo $row["nombre"]; echo " " .$row["apellido"]; ?>
	<td><?php echo $row["fecha"]; ?>
	<td><?php echo $row["total"]; ?>
	<td><?php echo "<a href=\"detalle_venta.php?id_venta=$row[id_venta]\">Detalle</a> 
	<a href=\"eliminar_venta.php?id_venta=$row[id_venta]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar la compra de $row[nombre] $row[apellido]?')\">Eliminar</a></td>";?>
</tr>
<?php
}}
?>

</table>
</body>
</html>
