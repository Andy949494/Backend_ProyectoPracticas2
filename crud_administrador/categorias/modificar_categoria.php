<?php 
include_once("../../conexion.php");

$id = $_GET['id_categoria'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM categoria WHERE id_categoria=$id");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $nombre = $mostrar['nombre_categoria'];
}
?>
<html>
<head>    
		<title>Modificar categoria</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>
<body>
<div align="center" style="font-family: Arial;">
  <form method="POST">
        <table style="width: fit-content;border:1px solid">
		<tr><th colspan="2" style="font-size:xx-large;">Modificar categoria<hr></th></tr>
		    <tr> 
                <td style="font-weight: bold;">ID:</td>
                <td><?php echo $id;?></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Nombre:</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" size="25" required></td>
            </tr>
            <tr>
				
                <td colspan="2" align="center">
				<a href="categorias.php">Cancelar</a>
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
	$nombre1 	= $_POST['txtnombre'];

    $querymodificar = mysqli_query($conn, "UPDATE categoria SET nombre_categoria='$nombre1' WHERE id_categoria=$id");

  	echo "<script> alert('Categoría modificada con éxito.'); window.location= 'categorias.php' </script>";
    
}
?>
	