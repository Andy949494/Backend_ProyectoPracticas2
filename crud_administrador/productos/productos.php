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
<form name="Guardar_Limpiar" action="guardar_limpiar_productos.php" method="post">
<table>
<tr><td colspan="8" align="center"><label class="label1">Ingresar Productos</label><hr></td></tr>
<tr>
	<td ><label>ID Categoria</label> <input type="number" maxlength="10" name="txtcategoria" min="1" required></td>
	<td ><label>ID Proveedor</label> <input type="number" maxlength="10" name="txtproveedor" min="1" required></td>
	<td ><label>Nombre</label> <input type="text" maxlength="50" name="txtnombre" required></td>
	<td ><label>Marca</label> <input type="text" maxlength="50"  name="txtmarca" required></td>
	<td ><label>Modelo</label> <input type="text" maxlength="50" name="txtmodelo" required></td>
	<td ><label>Precio</label> <input type="number" maxlength="50" name="txtprecio" step="0.01" min="0" required></td>
	<td ><label>Fuente imágen</label> <input type="text" maxlength="50" name="txtimagen" placeholder="../imagenes/nombre.jpg" required></td>
	<td ><label>Código</label> <input type="text" maxlength="50" name="txtcodigo" required></td>
</tr>
<tr><td colspan="8" align="center">
<input type="submit" value="Guardar" name="grabardatos">
<input type="submit" value="Limpiar" name="limpiardatos" onClick="javascript: return confirm('Presione Aceptar para limpiar los formularios.');">
</td>
</tr>
</table>
</form>

<table class="tabla1">
<tr><td colspan="9" align="center"><label class="label2"> <br>ID proveedores</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar_proveedores" style="float:left"></form>
<?php if(isset($_POST['buscar_proveedores'])){header('location: busqueda_proveedores.php');}?>
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
</tr>
<?php
}
?>
</table>


<table class="tabla2">
<tr><td colspan="9" align="center"><label class="label2"> <br>ID categorías de prodcutos</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar_categoria" style="float:left"></form>
<?php if(isset($_POST['buscar_categoria'])){header('location: busqueda_categoria.php');}?>
<hr></td></tr>
<tr class="tr1">
	<td><label>ID</label></td>
	<td><label>Nombre</label></td>


</tr>
<?php 
$sql="SELECT * FROM categoria";
$result=mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result))
{
?>
<tr class="tr2"> 
	<td><?php echo $mostrar['id_categoria'] ?>
	<td><?php echo $mostrar['nombre_categoria'] ?>
</tr>
<?php
}
?>
</table>


<table class="tabla3">
<tr><td colspan="9" align="center"><label class="label2"> <br>Listado de Productos</label> 
<form method="POST"><input type="submit" value="Buscar" name="buscar_productos" style="float:left"></form>
<?php if(isset($_POST['buscar_productos'])){header('location: busqueda_productos.php');}?>
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
	<td><label style="font-size: small;">Acción</label></td>

</tr>

<?php

$sql="SELECT productos.id_producto, productos.nombre, productos.marca, productos.modelo, productos.precio, productos.imagen, productos.codigo,
proveedores.nombre_proveedor, categoria.nombre_categoria FROM productos
INNER JOIN proveedores ON productos.id_proveedor = proveedores.id_proveedor
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
order by id_producto ASC
";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
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
	<td><?php echo "<a href=\"modificar_productos.php?id_producto=$row[id_producto]\">Modificar</a> 
	<a href=\"eliminar_productos.php?id_producto=$row[id_producto]\" 
	onClick=\"return confirm('¿Estás seguro de eliminar a $row[nombre]?')\">Eliminar</a></td>";?>
</tr>
<?php } ?>
</table>
</body>
</html>

