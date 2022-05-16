<?php
include("conexion.php");
session_start();

if(isset($_SESSION['administrador']))
{
	header('location: /ProyectoPracticas2/vistas/vista_administrador.php');
}
else if (isset($_SESSION['usuario']))
{
    header('location: /ProyectoPracticas2/vistas/vista_usuario.php');

}
?>

<html>
<head>
    <title>Practicas profesionalizantes II Andres Orlando</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="https://kit.fontawesome.com/0c5c5ff13c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="estilos/estilo_index.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilo_menu.css">
</head>
<header>
        <a href="index.php"><img src="imagenes/logo_distribuidora.png"/></a>
</header>
    <nav>
        <div id="VaiNavMenu" align="center">
        <div id="VaiNavMenux">
        <ul  id="VaiUlNav">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="carrito/carrito.php">Productos</a></li>
        <li><a>La empresa</a>
        <ul>
        <li><hr><a href="quienes_somos.php">¿Quiénes somos?</a><hr></li>
        <li><a href="contacto.php">Contacto</a><hr></li>
        <li><a href="marcas.php">Nuestras marcas</a></li>
        </ul>
        </li>
        <li><a href="login/registrar.php">Crear cuenta</a></li>
        <li><a href="login/login.php">Iniciar sesión</a></li>
        </ul>
        </div>
        </div>
    </nav>
    <section>
        <article>
            <br><br>
            <h1>Distribuidora minorista de alimentos y bebidas</h1><br><br><br><br>
            <h2>Hacé click y mirá nuestros productos</h2>
            <a href="carrito/carrito.php"><img src="imagenes/img1.png" style="cursor: pointer;"></a><br><br>
            <hr><br><br><br><br>
            <img src="imagenes/img2.png"><br><br>
            <hr><br><br><br><br>
            <h1>Atención personalizada</h1>
            <img src="imagenes/img3.png"><br><br><br><br>
            <h1>Boletín informativo <i class="far fa-newspaper"></i></h1>
            <h3>¡Suscribite a nuestro boletín informativo ingresando tu correo electrónico y recibí todas las novedades!</h3>
            <form method="post">
            <input type="email" name="txtboletin" placeholder="Ingresar correo electrónico" style="height:50px; width:300px; font-size:larger">
            <input type="submit" value="Enviar" name="btnboletin"/>
            </form>
            <?php 
                if(isset($_POST['btnboletin'])) {
                    $correo = $_POST["txtboletin"];
                    $query = mysqli_query($conn,"SELECT * FROM boletin WHERE correo = '".$correo."'");
		                $nr = mysqli_num_rows($query);
		                if($nr == 1){
		                    echo "<script> alert('¡Ya estás suscrito a nuestro boletín informativo!');window.location= 'index.php'</script>";
		                } else{
                            
	                    $sqlgrabar = "INSERT INTO boletin(correo) values ('$correo')";

                         if(mysqli_query($conn,$sqlgrabar))
                            {
                                $paracorreo 		= $correo;
                                $titulo				= "Boletín informativo - ¡suscripción exitosa!";
                                $mensaje			= "¡Gracias por suscribirte a nuestro boletín informativo!";
                                $correo_sitio		= "From: andy.distribuidora18@gmail.com";
                                mail($paracorreo,$titulo,$mensaje,$correo_sitio);
	                            echo "<script> alert('¡Gracias por suscribirte!');window.location= 'index.php'</script>";
                            }else 
                             {
	                            echo "Error: " .$sql."<br>".mysql_error($conn);
                            }
	                    }
                    }
            ?>
            <br><br><br><br>
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