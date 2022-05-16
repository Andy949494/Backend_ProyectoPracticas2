<?php
include("../conexion.php");

session_start();
if(isset($_SESSION['administrador']))
{
	$usuarioingresado = $_SESSION['administrador'];
	echo "<h3> Sesión administrador: $usuarioingresado </h3>";
}
else if (isset($_SESSION['usuario']))
{
	$usuarioingresado = $_SESSION['usuario'];
	echo "<h3> Sesión usuario: $usuarioingresado </h3>";
}
require_once("clase.php");

$usar_db = new DBControl();

if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
	case "agregar":
		if((isset($_SESSION['administrador'])) || (isset($_SESSION['usuario'])))
		{
			if(!empty($_POST["txtcantidad"])) 
			{
				$codigoproducto = $usar_db->vaiQuery("SELECT * FROM productos WHERE codigo='" . $_GET["codigo"] . "'");
				$items_array = array($codigoproducto[0]["codigo"]=>array(
				'vai_nom'		=>$codigoproducto[0]["nombre"], 
				'vai_cod'		=>$codigoproducto[0]["codigo"],
				'vai_id'		=>$codigoproducto[0]["id_producto"],  
				'txtcantidad'	=>$_POST["txtcantidad"], 
				'vai_pre'		=>$codigoproducto[0]["precio"], 
				'vai_img'		=>$codigoproducto[0]["imagen"]
				));
				
				if(!empty($_SESSION["items_carrito"])) 
				{
					if(in_array($codigoproducto[0]["codigo"],
					array_keys($_SESSION["items_carrito"]))) 
					{
						foreach($_SESSION["items_carrito"] as $i => $j) 
						{
								if($codigoproducto[0]["codigo"] == $i) 
								{
									if(empty($_SESSION["items_carrito"][$i]["txtcantidad"])) 
									{
										$_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
									}
									$_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
								}
						}
					} else 
					{
						$_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"],$items_array);
					}
				} 
				else 
				{
					$_SESSION["items_carrito"] = $items_array;
				}
			}
		}
		else{
			echo "<script> alert('Debe iniciar sesión para comprar');window.location= 'carrito.php' </script>";
		}

		
	break;
	case "eliminar":
		if(!empty($_SESSION["items_carrito"])) 
		{
			foreach($_SESSION["items_carrito"] as $i => $j) 
			{
				if($_GET["eliminarcode"] == $i)
				{
					unset($_SESSION["items_carrito"][$i]);	
				}			
				if(empty($_SESSION["items_carrito"]))
				{
					unset($_SESSION["items_carrito"]);
				}
			}
		}
	break;
	case "vacio":
		unset($_SESSION["items_carrito"]);
	break;
}
}
?>
<html>
<meta charset="UTF-8">
<head>
<title>Carrito</title>
<link rel="stylesheet" type="text/css" href="../estilos/estilo_carrito.css">
<link rel="stylesheet" type="text/css" href="../estilos/estilo_menu.css">

</head>
<header>
<img src="../imagenes/logo_distribuidora.png" class="img1">
</header>
<body>
<div>
<form method="POST"><input type="submit" style="width:150px" value="VOLVER" name="btnvolver"/></form>
<?php if(isset($_POST['btnvolver'])){header('location: ../index.php');}?>
<div><h1>Carrito de compras</h1></div>


<?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>	

<table>
<tr>
<th style="width:30%">Descripción</th>
<th style="width:10%">Código</th>
<th style="width:10%">Cantidad</th>
<th style="width:10%">Precio x unidad</th>
<th style="width:10%">Precio</th>
<th style="width:10%"><a href="carrito.php?accion=vacio">Limpiar</a></th>
</tr>	
<?php		
    foreach ($_SESSION["items_carrito"] as $item){
        $item_price = $item["txtcantidad"]*$item["vai_pre"];
		?>
				<tr>
				<td><img src="<?php echo $item["vai_img"]; ?>" class="imagen_peque" /><?php echo $item["vai_nom"]; ?></td>
				<td><?php echo $item["vai_cod"]; ?></td>
				<td><?php echo $item["txtcantidad"]; ?></td>
				<td><?php echo "$ ".$item["vai_pre"]; ?></td>
				<td><?php echo "$ ". number_format($item_price,2); ?></td>
				<td><a href="carrito.php?accion=eliminar&eliminarcode=<?php echo $item["vai_cod"]; ?>">Eliminar</a></td>
				</tr>
				<?php
				$totcantidad += $item["txtcantidad"];
				$totprecio += ($item["vai_pre"]*$item["txtcantidad"]);
				$id_producto = $item["vai_id"];

		}
		?>

<tr style="background-color:#f3f3f3">
<td colspan="2"><b>Total de productos:</b></td>
<td><b><?php echo $totcantidad; ?></b></td>
<td colspan="2"><strong><?php echo "$ ".number_format($totprecio, 2); ?></strong></td>
<td><form method="POST"><input type="submit" name="pagar" value="Pagar" /></form></td>
<?php if(isset($_POST["pagar"]))
{ ?> <form method="POST">

	<tr>
		<td colspan="7" style="font-size:xx-large;font-weight:bold">
			Pago y envío
		</td>
	</tr>
	<tr>
		<td colspan="1" style="font-weight:bold; font-size:large">
			Nro Tarjeta:<input type="number" name="numtarjeta" min="13" placeholder="XXXXXXXXXXXXXXXXXX" style="width:245px" required>
		</td>
		<td colspan="3" style="font-weight:bold; font-size:large">
			Nombre del titular:<input type="text" name="nombretitular" placeholder="como aparece en la tarjeta" style="width:245px"required>
		</td>
		<td colspan="2" style="font-weight:bold; font-size:large">
			Dirección:<input type="text" name="direccion" placeholder="calle y altura" style="width:245px"required>
		</td>
	</tr>
	<tr>
		<td colspan="1" style="font-weight:bold; font-size:large">
			Fcha. vencimiento:<input type="text" name="fechavenci" minlength="5" maxlength="5" placeholder="mm/aa" style="width:245px"required>
		</td>
		<td colspan="3" style="font-weight:bold; font-size:large">
			Apellido del titular:<input type="text" name="apellidotitular" placeholder="como aparece en la tarjeta" style="width:245px"required>
		</td>
		<td colspan="2" style="font-weight:bold; font-size:large">
			Ciudad:<input type="text" name="ciudad" style="width:245px"required>
		</td>
	</tr>
	<tr>
		<td colspan="1" style="font-weight:bold; font-size:large">
			Cod. seguridad:<input type="text" name="codseguridad" placeholder="XXX" style="width:245px" required>
		</td>
		<td colspan="3" style="font-weight:bold; font-size:large">
			DNI del titular:<input type="number" name="dnititular" min="8" style="width:245px"required>
		</td>
		<td colspan="2" style="font-weight:bold; font-size:large">
			Cod. postal:<input type="text" name="codpostal" style="width:245px"required>
		</td>
	</tr>
	<tr>
		<td colspan="6">
		<input type="submit" name="enviar" value="Enviar" />
		</td>
	</tr>
	</form>
	;

<?php
}
if(isset($_POST["enviar"]))
			{ 
				$guardar_id="SELECT id FROM login WHERE correo = '".$usuarioingresado."'";
				$array_id=mysqli_query($conn,$guardar_id);
				$mostrar=mysqli_fetch_array($array_id);
				$id_usuario = $mostrar['id'];
				$sqlgrabar = "INSERT INTO ventas(id_usuario, total) 
				values ('$id_usuario', '$totprecio')";
				mysqli_query($conn,$sqlgrabar);

				$id_venta=mysqli_insert_id($conn);
				
				$direccion= $_POST["direccion"];
				$ciudad= $_POST["ciudad"];
				$cod_postal= $_POST["codpostal"];
				$sqlgrabar = "INSERT INTO envios(id_venta, direccion, ciudad, cod_postal) 
					values ('$id_venta', '$direccion', '$ciudad', '$cod_postal')";
					mysqli_query($conn,$sqlgrabar);
				foreach ($_SESSION["items_carrito"] as $item){
					$codigo_prod = $item["vai_cod"];
					$nombre_prod = $item["vai_nom"];
					$cantidad_prod = $item["txtcantidad"];
					$precio_prod = $item["txtcantidad"]*$item["vai_pre"];
					$id_producto = $item["vai_id"];
					$sqlgrabar = "INSERT INTO detalle_ventas(id_venta, id_producto, nombre_prod, cantidad, precio) 
					values ('$id_venta', '$id_producto', '$nombre_prod', '$cantidad_prod', '$precio_prod')";
					mysqli_query($conn,$sqlgrabar);
				}
				echo "<script> alert('Gracias por su compra');window.location= 'carrito.php' </script>";
				unset($_SESSION["items_carrito"]);
			}
?>
</tr>

</table>		
  <?php
} else {
?>
<div align="center"><h3>¡El carrito esta vacío!</h3></div>

<?php 
}
?>
</div>
<div>
<div><br><h1>Productos</h1></div>
<nav>
        <div id="VaiNavMenu" align="center">
        <div id="VaiNavMenux">
        <ul  id="VaiUlNav">
		<li>
			<form method="POST" action="carrito.php">
			<input type="submit" name=todo value="MOSTRAR TODO" style="width:fit-content;"/>
			</form>
		</li>
        <li><a>Filtrar por</a>
        <ul>
        <li><form method="POST" action="carrito.php">
			<input type="submit" name="alimentos" value="Alimentos"/><hr></li>
        <li><form method="POST" action="carrito.php">
			<input type="submit" name="bebidas" value="Bebidas"/></li>
        </ul>
        </li>
        <li>
			<form method="POST" action="carrito.php">
			<input type="text" name="txtbusqueda" placeholder="introduzca el nombre del producto" style="border: 1px solid;width:280px"></input><input type="submit" name="buscar" value="Buscar" /></input>
			</form>
		</li>
        </ul>
        </div>
        </div>
    </nav>
	<br><br><br><br>
<div class="contenedor_general">
	
	<?php

if(isset($_POST['buscar']))
{
	$busqueda = ($_POST['txtbusqueda']);
	$productos_array = $usar_db->vaiquery("SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' ORDER BY id_producto ASC");
if (!empty($productos_array)) 
{ 
	foreach($productos_array as $i=>$k)
	{
?>
	<div class="contenedor_productos">
		<form method="POST" action="carrito.php?accion=agregar&codigo=
		<?php echo $productos_array[$i]["codigo"]; ?>">
		<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
		<div>
		<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
		<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
		<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
		</div>
		</div>
		</form>
	</div>
<?php
	}
}
}

else{

if(isset($_POST['todo']))
{
	$productos_array = $usar_db->vaiquery("SELECT * FROM productos ORDER BY id_producto ASC");
if (!empty($productos_array)) 
{ 
	foreach($productos_array as $i=>$k)
	{
?>
	<div class="contenedor_productos">
		<form method="POST" action="carrito.php?accion=agregar&codigo=
		<?php echo $productos_array[$i]["codigo"]; ?>">
		<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
		<div>
		<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
		<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
		<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
		</div>
		</div>
		</form>
	</div>
<?php
	}
}
}

else{


	if(isset($_POST['bebidas']))
	{
		$productos_array = $usar_db->vaiquery("SELECT * FROM productos WHERE id_categoria=2 ORDER BY id_producto ASC");
	if (!empty($productos_array)) 
	{ 
		foreach($productos_array as $i=>$k)
		{
	?>
		<div class="contenedor_productos">
			<form method="POST" action="carrito.php?accion=agregar&codigo=
			<?php echo $productos_array[$i]["codigo"]; ?>">
			<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
			<div>
			<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
			<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
			<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
			</div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	}
	
	else{
	
		if(isset($_POST['alimentos']))
		{
			$productos_array = $usar_db->vaiquery("SELECT * FROM productos WHERE id_categoria=1 ORDER BY id_producto ASC");
		if (!empty($productos_array)) 
		{ 
			foreach($productos_array as $i=>$k)
			{
		?>
			<div class="contenedor_productos">
				<form method="POST" action="carrito.php?accion=agregar&codigo=
				<?php echo $productos_array[$i]["codigo"]; ?>">
				<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
				<div>
				<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
				<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
				<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
				</div>
				</div>
				</form>
			</div>
		<?php
			}
		}
		}
		
		else{

			if(isset($_POST['borrar']))
			{
				$productos_array = $usar_db->vaiquery("SELECT * FROM productos ORDER BY id_producto ASC");
			if (!empty($productos_array)) 
			{ 
				foreach($productos_array as $i=>$k)
				{
			?>
				<div class="contenedor_productos">
					<form method="POST" action="carrito.php?accion=agregar&codigo=
					<?php echo $productos_array[$i]["codigo"]; ?>">
					<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
					<div>
					<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
					<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
					<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
					</div>
					</div>
					</form>
				</div>
			<?php
				}
			}
			}

			else{
	$productos_array = $usar_db->vaiquery("SELECT * FROM productos ORDER BY id_producto ASC");
	if (!empty($productos_array)) 
	{ 
		foreach($productos_array as $i=>$k)
		{
	?>
		<div class="contenedor_productos">
			<form method="POST" action="carrito.php?accion=agregar&codigo=
			<?php echo $productos_array[$i]["codigo"]; ?>">
			<div><img src="<?php echo $productos_array[$i]["imagen"]; ?>"></div>
			<div>
			<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre"]; ?></div>
			<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio"]; ?></div>
			<div><input type="number" name="txtcantidad" max="50" value="1" size="2" /><input type="submit" value="Agregar" />
			</div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	}
	}
	}
	}
	}
	?>










</div>
</body>
</html>