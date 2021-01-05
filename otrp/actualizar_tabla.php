<?php
/* La estructura foreach es para recorrer un arreglo en PHP
  En este caso recorremos el arreglo $_GET que se creo con cada caja de texto o botón del formulario
  Estamos recibiendo en el arreglo $_GET, cada "name" del formulario y lo guardamos en la variable $atributo
  Estamos recibiendo en el arreglo $_GET, cada "value" del formulario y lo guardamos en la variable $valor
*/

/* Este primer ciclo sólo se pone con propósitos didacticos o de prueba
lo pueden quitar si no lo necesitan o no quieren ver estas leyendas*/
foreach ($_GET as $atributo=>$valor)
   		{
   		echo "<br>El valor de $atributo es: $valor";
   		}
echo '<br>';

/* Aquí ya se toman decisones sobre los valores recibidos del formulario
Se trata de generar de manera dinámica una sentencia válida SQL para actualizar:
UPDATE tabla SET atributo1=valor, atributo2=valor, ..., atributon=valor WHERE llave=valor;
es importante que la condición de selección en WHERE use la llave primaria, así aseguramos
que sólo se modifique se renglón, ya que su valor es único
*/
$atributos_actualizar='';   // cadena con lista da atributos a actualizar con sus nuevos valores
foreach ($_GET as $atributo=>$valor)
   		{
			if ($atributo=='llave'){            // si el atributo del formulario es la llave primaria
				$llave=$valor;			        // se toma el nombre del atributo
				$llave_valor=$_GET[$llave];     // se toma el valor del atributo
			}
			
				
			if ($atributo=='tabla')            // se definió anteriormente el nombre de la tabla a actualizar
				$tabla=$valor;
			
			if ($atributo!='tabla' && $atributo!='llave' && $atributo!='opcion_menu'){
				if ($atributos_actualizar!='')
					$atributos_actualizar=$atributos_actualizar.",";  // se va formando la lista de atributos a actualizar
				
				$atributos_actualizar=$atributos_actualizar.$atributo."='".$valor."'";}
				
   		}		

$consulta_sql="UPDATE $tabla SET ".$atributos_actualizar." WHERE ".$llave."='".$llave_valor."'";
echo '<br>';
echo $consulta_sql;		// aquí ya tenemos la sentencia SQL válida, la desplegamos solo con propósitos didácticos

// Ahora hacemos la conexión al servidor de base de datos y le enviamos la petición de actualización
include "datos.php";
$enlace = mysqli_connect($host, $usuario, $password, $bd);
mysqli_query($enlace, $consulta_sql);

// Sólo para ver la tabla ya con los datos modificados, la desplegamos aquí mismo
$consulta_sql="SELECT * FROM $tabla";
$resultado=mysqli_query($enlace, $consulta_sql);
include "desplegar_tabla.php";

mysqli_close($enlace);


?>