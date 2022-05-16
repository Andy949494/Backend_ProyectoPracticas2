<?php 
include_once("../../conexion.php");
session_start();
if(isset($_SESSION['administrador']))
{
	$usuarioingresado = $_SESSION['administrador'];
}
else if (isset($_SESSION['usuario']))
{
	echo "<script> alert('Acceso denegado para usuarios');window.location= '../../vistas/vista_usuario.php' </script>";
}
else
{
	header('location: ../../index.php');
}
$id = $_GET['id_producto'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM productos WHERE id_producto=$id");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_categoria = $mostrar["id_categoria"];
    $id_proveedor = $mostrar["id_proveedor"];
    $nombre = $mostrar["nombre"];
    $marca = $mostrar["marca"];
    $modelo = $mostrar["modelo"];
    $precio = $mostrar["precio"];
    $imagen = $mostrar["imagen"];
    $codigo = $mostrar["codigo"];
}
?>
<html>
<head>    
		<title>Modificar producto</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>
<body>
<div align="center" style="font-family: Arial;">
  <form method="POST">
        <table style="width: fit-content;border:1px solid">
		<tr><th colspan="2" style="font-size:xx-large;">Modificar producto<hr></th></tr>
		    <tr> 
                <td style="font-weight: bold;">ID Producto:</td>
                <td><?php echo $id;?></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">ID Categoria:</td>
                <td><input type="number" name="txtcategoria" value="<?php echo $id_categoria;?>" size="25" min="1" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">ID Proveedor:</td>
                <td><input type="number" name="txtproveedor" value="<?php echo $id_proveedor;?>" size="25" min="1" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Nombre:</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Marca:</td>
                <td><input type="text" name="txtmarca" value="<?php echo $marca;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Modelo:</td>
                <td><input type="text" name="txtmodelo" value="<?php echo $modelo;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Precio:</td>
                <td><input type="number" name="txtprecio" value="<?php echo $precio;?>" size="25" step="0.01" min="0" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Fuente imágen:</td>
                <td><input type="text" name="txtimagen" value="<?php echo $imagen;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Código:</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" size="25" required></td>
            </tr>
            <tr>
				
                <td colspan="2" align="center">
				<a href="productos.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $id_categoria1 = $_POST["txtcategoria"];
    $id_proveedor1 = $_POST["txtproveedor"];
    $nombre1 = $_POST["txtnombre"];
    $marca1 = $_POST["txtmarca"];
    $modelo1 = $_POST["txtmodelo"];
    $precio1 = $_POST["txtprecio"];
    $imagen1 = $_POST["txtimagen"];
    $codigo1 = $_POST["txtcodigo"];
      
    $querymodificar = mysqli_query($conn, "UPDATE productos SET id_categoria='$id_categoria1',id_proveedor='$id_proveedor1',nombre='$nombre1',marca='$marca1',modelo='$modelo1',precio='$precio1',imagen='$imagen1',codigo='$codigo1' WHERE id_producto=$id");

    echo "<script> alert('Producto modificado con éxito.'); window.location= 'productos.php' </script>";
    
}
?>
	