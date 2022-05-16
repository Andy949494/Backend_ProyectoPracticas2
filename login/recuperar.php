<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilo_login.css">
    <title>Recuperar contraseña</title>
</head>
<body>
<form action="recuperar.php" method="post">
        <table>
		<tr><th colspan="2">Recuperar contraseña</th></tr>
            <tr> 
                <td><b>&#128231; Correo</b></td>
                <td><input type="email" name="txtcorreo" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <a href="login.php">Cancelar</a>
				   <input type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
			</td>
            </tr>
        </table>
    </form>
</body>

<?php
include('../conexion.php');

if(isset($_POST['btnrecuperar'])){


$correo = $_POST['txtcorreo'];

$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE correo = '$correo'");
$nr 			= mysqli_num_rows($queryusuario); 
if ($nr == 1)
{
$mostrar		= mysqli_fetch_array($queryusuario); 
$enviarpass 	= $mostrar['contrasena'];

$paracorreo 		= $correo;
$titulo				= "Recuperar Password";
$mensaje			= "Tu password es: ".$enviarpass;
$correo_sitio		= "From: andy.distribuidora18@gmail.com";

if(mail($paracorreo,$titulo,$mensaje,$correo_sitio))
{
	echo "<script> alert('Contraseña enviada');window.location= 'login.php' </script>";
}else
{
    echo "<script> alert('Error');window.location= 'recuperar.php' </script>";

}
}
else
{
	echo "<script> alert('El correo ingresado no se encuentra registrado.');window.location= 'recuperar.php' </script>";
}
}
?>
</html>