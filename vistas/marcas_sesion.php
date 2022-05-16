<?php
include("../conexion.php");
session_start();
if(isset($_SESSION['administrador']))
{
	$usuarioingresado = $_SESSION['administrador'];
}
else if (isset($_SESSION['usuario']))
{
	$usuarioingresado = $_SESSION['usuario'];
}
else
{
	header('location: ../aktual/index.php');
}
?>
<html>
<head>
    <title>Practicas profesionalizantes II Andres Orlando</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_index.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_menu.css">
</head>
<header>
        <a href="../index.php"><img src="../imagenes/logo_distribuidora.png"/></a>
</header>
    <nav>
        <div id="VaiNavMenu" align="center">
        <div id="VaiNavMenux">
        <ul  id="VaiUlNav">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="../carrito/carrito.php">Productos</a></li>
        <li><a>La empresa</a>
        <ul>
        <li><hr><a href="quienes_somos_sesion.php">¿Quiénes somos?</a><hr></li>
        <li><a href="contacto_sesion.php">Contacto</a><hr></li>
        <li><a href="marcas_sesion.php">Nuestras marcas</a></li>
        </ul>
        </li>
        <li><a><?php echo "$usuarioingresado"?></a></li>
        <li><form method="POST"><input type="submit" value="Cerrar sesión" name="btncerrar"/></li>
        <?php if(isset($_POST['btncerrar'])) {session_destroy(); header('location: ../index.php');}?>
        </ul>
        </div>
        </div>
    </nav>
    <section style="height: auto;">
        <article style="text-align:center; height: 85%; font-size:xx-large">
        <h2 style="text-align: center; background-color:bisque">Nuestras marcas</h2>
            <p>
            <img src="../imagenes/marcas.jpg">
            </p>
         </article>
    </section>
    <footer> 
        <p>
            Andy Distribuidora S.R.L
            <br><br><br><br>

            Tel: +54(342)4558754 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WhatsApp: +54(342)6659887 <br><br><br>

            Dirección: &nbsp;4 de enero 2830 - Santa Fe, Santa Fe. <br><br><br>
        
            Email: &nbsp;andy_distribuidora@gmail.com
        </p>    
    </footer> 
</html>