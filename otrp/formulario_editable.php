<?php
include "datos.php";

$enlace = mysqli_connect($host, $usuario, $password, $bd);

$tabla=$_GET["tabla"];
$llave=$_GET["llave"];
$valor=$_GET["valor"];

$consulta_sql="SELECT * FROM $tabla where $llave='$valor'";  
$resultado= mysqli_query($enlace, $consulta_sql);

$renglon= mysqli_fetch_array($resultado);

mysqli_field_seek($resultado, 0);

echo '<form action="index.php">';

while ($atributo= mysqli_fetch_field($resultado)){

	echo $atributo->name.': ';
	if ($atributo->name==$llave)
		echo '<input type="text" name="'.$atributo->name.'" value="'.$renglon[$atributo->name].'" readonly>'; 
	else
		echo '<input type="text" name="'.$atributo->name.'" value="'.$renglon[$atributo->name].'" >';  
	echo '<br>';
	}		
echo '<input type="hidden" name="tabla" value='.$tabla.'>';	
echo '<input type="hidden" name="llave" value='.$llave.'>';
echo '<p align="center"><input type="submit" name="opcion_menu" value="Actualizar"></p>';

echo '</form>';


?>