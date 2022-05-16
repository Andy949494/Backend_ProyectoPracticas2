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
    <section>
        <article style="text-align:justify;">
        <h2 style="text-align: center; background-color:bisque">¿Quienes somos?</h2>
            <p style="margin-left: 20px;margin-right: 20px">Andy Distribuidora nació a principios del año 2000 en Santa Fe como empresa familiar dedicada a la distribución y comercialización de alimentos y bebidas.
                Acompañando la demanda de nuestros más de 3000 clientes nos consolidamos como una de las mayores distribuidoras de alimentos y bebidas de Argentina.</p>
            <p style="margin-left: 20px;margin-right: 20px">Nuestra pasión es estar al servicio al cliente, acompañando el crecimiento de quienes confían en nosotros. Para ello realizamos capacitaciones continuas a nuestro 
                personal especializado en ventas, incorporando además innovaciones tecnológicas, nuevas herramientas de comercialización digital y mejoras en el servicio de 
                entrega, en provecho de la calidad de nuestro servicio.</p>
            <p style="margin-left: 20px;margin-right: 20px"> Contamos con un centro de distribución en la zona sur de la ciudad de Santa Fe. Nuestro establecimiento comprende un total de 1,65ha 5.000m2 de depósito cubierto,
                 más de 500m2 cubiertos de oficinas y espacios de uso común, 200m2 de playa de estacionamiento para vehículos y 6.000m2 de playa para maniobras.</p>
        <h2 style="text-align: center; background-color:bisque">Misión, visión y valores</h2>
                 <p style="margin-left: 20px;margin-right: 20px">Misión: ser un elemento esencial para los clientes al dar productos y servicios de excelente calidad y precios bajos, con el fin de ayudarlos a lograr sus aspiraciones.</p> 
                 <p style="margin-left: 20px;margin-right: 20px">Visión: Ser la empresa de distribuciones de más rápido crecimiento y preservar nuestro liderazgo en la industria de las distribuidoras.</p>
                 <p style="margin-left: 20px;margin-right: 20px">Valores: Obsesión por el cliente, propiedad, inventar y simplificar, aprender y ser curioso, contratar a los mejores, tener los más altos 
                 estándares, pensar en grande, asegurar sesgo para la acción, confianza, entregar resultados.</p>
        <h2 style="text-align: center; background-color:bisque">Usuarios que pueden utilizar los Servicios del Sitio </h2>
            <p style="margin-left: 20px;margin-right: 20px">Los Servicios sólo están disponibles para personas que tengan capacidad legal para contratar. No podrán utilizar los Servicios las personas que no tengan esa 
                capacidad, los menores de edad o quien registre como Usuario una persona jurídica, deberá tener capacidad para contratar a nombre de tal entidad y de obligar 
                a la misma en los términos de estas Condiciones de Uso.</p>
            <p style="margin-left: 20px;margin-right: 20px">El Usuario registrado declara que la información que brindará al remitir el pedido de registración será precisa, correcta y actual comprometiéndose a informar
                 en forma inmediata y fehaciente respecto de cualquier cambio siendo a su vez enteramente responsable frente a Andy Distribuidora por los daños y perjuicios
                  que el incumplimiento de dicha obligación pudiere acarrearle incluyendo, pero no limitándose a costos de ubicación física del Usuario, costos de intimaciones y 
                  citaciones, etc. El Usuario acepta que utilizará los Servicios exclusivamente con los fines estipulados en (a) las Condiciones de Uso y (b) cualquier norma o 
                  regulación aplicable ya sea de índole municipal o nacional incluyendo, pero no limitándose a leyes, decretos, reglamentos, resoluciones, etc. El Usuario se compromete 
                  a no divulgar su contraseña a terceros que no estuvieren autorizados por el Usuario para acceder a los Servicios del Sitio.</p>
        <h2 style="text-align: center; background-color:bisque">Datos personales</h2>
            <p style="margin-left: 20px;margin-right: 20px">Se entiende por “Datos personales” cualquier información que permite identificar a un individuo. Andy Distribuidora no recabará ningún dato personal sobre el
                 usuario a menos el mismo voluntariamente lo provea, o de otro modo lo permita la normativa aplicable sobre protección de datos personales. En consecuencia, 
                 quien provee los datos reconoce que proporciona sus datos en forma absolutamente voluntaria y que los mismos son ciertos. Los datos personales serán tratados de 
                 acuerdo a lo dispuesto por la Ley N° 18.331 y sus normas reglamentarias o modificativas. Su información personal se procesa y almacena en servidores o medios magnéticos 
                 que mantienen altos estándares de seguridad y protección tanto física como tecnológica (encriptación Secure Socket Layer). Andy Distribuidora se obliga a mantener
                 la confidencial de la información que reciba por parte del usuario y a tratar sus datos personales de acuerdo a lo establecido por la normativa vigente.</p>
            <p style="margin-left: 20px;margin-right: 20px"> El ingreso de los datos personales implica el consentimiento del visitante a ser parte de la base de datos de Andy Distribuidora.  Los datos referidos en estos 
                Términos y Condiciones tendrán como finalidad validar las órdenes de compra y mejorar la labor de información y comercialización de los productos y servicios prestados 
                por las empresas. Sólo podrán ser entregados a las empresas filiales o relacionadas con Andy Distribuidora o al Agente de Pago seleccionado por el Usuario, cuando 
                sea necesario.  El usuario acepta que Andy Distribuidora coloque “cookies” en su equipo.  El usuario presta su consentimiento a la transmisión de su información 
                personal identificatoria y a su uso conforme se describe en el presente. Esta política de privacidad resulta aplicable solamente al Sitio Web, y no a otros sitios web.</p>
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