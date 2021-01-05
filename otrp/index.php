<html>
<body>
<p align="center">Práctica 8: 1248873, Enola Carely Rodriguez Gonzalez</p>
<hr>
<?php

// VALIDACION DE OPCION ELEGIDA
if (!isset($_GET["opcion_menu"]))
	$opcion_elegida="saludo.txt";
else 
	$opcion_elegida=$_GET["opcion_menu"];

// ESTRUCTURA DE DECISICION PARA LA NAVEGACION
switch($opcion_elegida)
{
	case 'principal':
		  $archivo='saludo.txt';
		  $m=0;
	break;
	
	case 'consulta_ventas':
		  $archivo='consulta_ventas.php';
		  $m=1;
	break;
	
	case 'consulta_productos':
		  $archivo='consulta_productos.php';
		  $m=2;
	break;
	
	case 'Consulta_clientes':
		  $archivo='Consulta_clientes.php';
		  $m=3;
	break;
	
	default:
	      $archivo='error.txt';
		  $m=4;
	break;	  

/*
Las siguienes opciones no se invovan desde el menú
Son para que todas las operaciones se hagan desde index
aunque se invoquen de formularios
*/
	
	case 'formulario_editable':
		  $archivo='formulario_editable.php';
          $m=5;
		  $leyenda_menu[$m]='Formulario editable para la tabla '.$_GET["tabla"];
	break;	
	case 'Actualizar':
		  $archivo='actualizar_tabla.php';
          $m=6;
		  $leyenda_menu[$m]='Actualización de la tabla '.$_GET["tabla"];
	break;	
	
}

$leyenda_menu[0]='Principal';
$leyenda_menu[1]='Ventas con sus datos de facturas';
$leyenda_menu[2]='Productos en inventario';
$leyenda_menu[3]='Clientes';
$leyenda_menu[4]='Opción no encotrada';


?>	
<li><a href="index.php?opcion_menu=principal"><?php echo $leyenda_menu[0]; ?></a>
<li><a href="index.php?opcion_menu=consulta_ventas"><?php echo $leyenda_menu[1]; ?></a>
<li><a href="index.php?opcion_menu=consulta_productos"><?php echo $leyenda_menu[2]; ?></a>
<li><a href="index.php?opcion_menu=Consulta_clientes"><?php echo $leyenda_menu[3];?></a>
<hr>
<p align="left"><?php echo $leyenda_menu[$m] ?></p>

<p align="left">
<?php
include $archivo;
?>
</p>

</body>
</html>