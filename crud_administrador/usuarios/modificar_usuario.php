<?php 
include_once("../../conexion.php");

$id = $_GET['id'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM login WHERE id=$id");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $nombre = $mostrar['nombre'];
    $apellido = $mostrar['apellido'];
	$tel = $mostrar['tel'];
    $correo = $mostrar['correo'];
    $contrasena = $mostrar['contrasena'];
    $rol = $mostrar['rol'];
}
?>
<html>
<head>    
		<title>Modificar usuarios</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../../estilos/estilo_proveedores.css">
</head>
<body>
<div align="center" style="font-family: Arial;">
  <form method="POST">
        <table style="width: fit-content;border:1px solid">
		<tr><th colspan="2" style="font-size:xx-large;">Modificar usuarios<hr></th></tr>
		    <tr> 
                <td style="font-weight: bold;">ID:</td>
                <td><?php echo $id;?></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Nombre:</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" size="20" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Apellido:</td>
                <td><input type="text" name="txtapellido" value="<?php echo $apellido;?>" size="20" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Teléfono:</td>
                <td><input type="number" name="txttelefono" value="<?php echo $tel;?>" size="20" minlength="7" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Email:</td>
                <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>" size="20" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Contraseña:</td>
                <td><input type="text" name="txtcontrasena" value="<?php echo $contrasena;?>" size="20" minlength="6" required></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Rol:</td>
                <td><input type="text" name="txtrol" value="<?php echo $rol;?>" size="20" required pattern="usuario|admin" required></td>
            </tr>
            <tr>
				
                <td colspan="2" align="center">
				<a href="usuarios.php">Cancelar</a>
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
    $apellido1 	= $_POST['txtapellido'];
    $tel1 	= $_POST['txttelefono'];
    $correo1 	= $_POST['txtcorreo']; 
    $contrasena1 	= $_POST['txtcontrasena']; 
    $rol1 	= $_POST['txtrol']; 

    $querymodificar = mysqli_query($conn, "UPDATE login SET nombre='$nombre1',apellido='$apellido1',tel='$tel1',correo='$correo1',contrasena='$contrasena1',rol='$rol1' WHERE id=$id");

  	echo "<script> alert('Usuario $nombre1 $apellido1 modificado con éxito.'); window.location= 'usuarios.php' </script>";
    
}
?>
	