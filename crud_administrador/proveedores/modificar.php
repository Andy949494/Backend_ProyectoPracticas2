<?php 
include_once("../../conexion.php");

$id = $_GET['id_proveedor'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM proveedores WHERE id_proveedor=$id");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $nombre = $mostrar['nombre_proveedor'];
    $razon = $mostrar['razon_social'];
	$telefono = $mostrar['telefono'];
    $direccion = $mostrar['direccion'];
    $ciudad = $mostrar['ciudad'];
    $cuit = $mostrar['cuit_cuil'];
    $email = $mostrar['email'];
}
?>
<html>
<head>    
		<title>Modificar proveedor</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>
<body>
<div align="center" style="font-family: Arial;">
  <form method="POST">
        <table style="width: fit-content;border:1px solid">
		<tr><th colspan="2" style="font-size:xx-large;">Modificar proveedor<hr></th></tr>
		    <tr> 
                <td style="font-weight: bold;">ID:</td>
                <td><?php echo $id;?></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Nombre:</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Razón social:</td>
                <td><input type="text" name="txtrazon" value="<?php echo $razon;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Teléfono:</td>
                <td><input type="number" name="txttelefono" value="<?php echo $telefono;?>" min="7" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Direccion:</td>
                <td><input type="text" name="txtdireccion" value="<?php echo $direccion;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Ciudad:</td>
                <td><input type="text" name="txtciudad" value="<?php echo $ciudad;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Cuit/Cuil:</td>
                <td><input type="text" name="txtcuit" value="<?php echo $cuit;?>" size="25" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Email:</td>
                <td><input type="email" name="txtemail" value="<?php echo $email;?>" size="25" required></td>
            </tr>
            <tr>
				
                <td colspan="2" align="center">
				<a href="proveedores.php">Cancelar</a>
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
    $razon1 	= $_POST['txtrazon'];
    $telefono1 	= $_POST['txttelefono'];
    $direccion1 	= $_POST['txtdireccion']; 
    $ciudad1 	= $_POST['txtciudad']; 
    $cuit1 	= $_POST['txtcuit']; 
    $email1 	= $_POST['txtemail']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE proveedores SET nombre_proveedor='$nombre1',razon_social='$razon1',telefono='$telefono1',direccion='$direccion1',ciudad='$ciudad1',cuit_cuil='$cuit1',email='$email1' WHERE id_proveedor=$id");

  	echo "<script> alert('Proveedor $nombre1 modificado con éxito.'); window.location= 'proveedores.php' </script>";
    
}
?>
	