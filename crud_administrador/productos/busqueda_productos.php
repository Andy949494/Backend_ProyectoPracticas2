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
<tr><td colspan="8" align="center"><label class="label1">Buscar Productos</label><hr></td></tr>
<tr>
	<td align="center"><input type="text" maxlength="50" name="txtbusqueda" placeholder="Introduzca id, nombre o marca" size="24px"> 
	<input type="submit" value="Buscar" name="buscar" >
</td>
</tr>
</form>
<table class="tabla1">
<tr><td colspan="9" align="center"><label class="label2"> <br>ID proveedores</label> 
<hr></td></tr>

<tr class="tr1">
	<td><label>ID Producto</label></td>
	<td><label>Proveedor</label></td>
	<td><label>Categoría</label></td>
	<td><label>Nombre</label></td>
	<td><label>Marca</label></td>
	<td><label>Modelo</label></td>
	<td><label>Precio</label></td>
	<td><label>Imágen</label></td>
	<td><label>Código</label></td>

</tr>

<?php
if (isset($_GET['buscar'])){
$busqueda = ($_GET['txtbusqueda']);


$sql="SELECT productos.id_producto, productos.nombre, productos.marca, productos.modelo, productos.precio, productos.imagen, productos.codigo,
proveedores.nombre_proveedor, categoria.nombre_categoria FROM productos
INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
WHERE productos.id_producto LIKE '%$busqueda%' OR productos.nombre LIKE '%$busqueda%' OR productos.marca LIKE '%$busqueda%' order by id_producto ASC";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
<td><?php echo $row["id_producto"]; ?>
	<td><?php echo $row["nombre_proveedor"]; ?>
	<td><?php echo $row["nombre_categoria"]; ?>
	<td><?php echo $row["nombre"]; ?>
	<td><?php echo $row["marca"]; ?>
	<td><?php echo $row["modelo"]; ?>
	<td><?php echo $row["precio"]; ?>
	<td><?php echo $row["imagen"]; ?>
	<td><?php echo $row["codigo"]; ?>
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
	header('location: productos.php');
}
?>
</html>
