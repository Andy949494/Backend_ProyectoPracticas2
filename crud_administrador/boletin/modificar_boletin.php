<?php 
include_once("../../conexion.php");

$id = $_GET['id_boletin'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM boletin WHERE id_boletin=$id");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $correo = $mostrar['correo'];
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
		<tr><th colspan="2" style="font-size:xx-large;">Modificar correo electrónico<hr></th></tr>
		    <tr> 
                <td style="font-weight: bold;">ID:</td>
                <td><?php echo $id;?></td>
            </tr>
            <tr> 
                <td style="font-weight: bold;">Correo electrónico:</td>
                <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>" size="25" required></td>
            </tr>
            <tr>
				
                <td colspan="2" align="center">
				<a href="boletin.php">Cancelar</a>
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
	$correo1 	= $_POST['txtcorreo'];

    $querymodificar = mysqli_query($conn, "UPDATE boletin SET correo='$correo1' WHERE id_boletin=$id");

  	echo "<script> alert('Correo modificado con éxito.'); window.location= 'boletin.php' </script>";
    
}
?>
	