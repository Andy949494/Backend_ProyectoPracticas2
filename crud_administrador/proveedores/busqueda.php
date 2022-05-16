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
<tr><td colspan="8" align="center"><label class="label1">Buscar Proveedores</label><hr></td></tr>
<tr>
	<td align="center"><input type="text" maxlength="50" name="txtbusqueda" placeholder="Introduzca nombre o cuit/cuil" size="24px"> 
	<input type="submit" value="Buscar" name="buscar" >
</td>
</tr>
</form>
</table>
<table class="tabla1">
<tr><td colspan="8" align="center"><label class="label2"> <br><br><br><br> Resultado </label> 
<hr></td></tr>

<tr class="tr1">
	<td><label>Codigo</label></td>
	<td><label>Nombre</label></td>
	<td><label>Razón social</label></td>
	<td><label>Teléfono</label></td>
	<td><label>Dirección</label></td>
	<td><label>Ciudad</label></td>
	<td><label>CUIT/CUIL</label></td>
	<td><label>Email</label></td>
</tr>

<?php
if (isset($_GET['buscar'])){
$busqueda = ($_GET['txtbusqueda']);
$sql=("SELECT * FROM proveedores WHERE nombre_proveedor LIKE '%$busqueda%' OR cuit_cuil LIKE '%$busqueda%'");
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
	header('location: proveedores.php');
}
?>
</html>
