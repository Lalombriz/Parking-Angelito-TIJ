<?php
// DESPLEGADO DE RESULTADOS DE UNA CONSULTA EN HTML
// Se trata de que los datos que regrese la consulta sean visibles de una forma
// ordenada en un navegador
// Una forma es "imprimir" código HTML usando el lenguaje PHP
// El usuario que vea el navegador solo verá el resultado de esta "impresión"
// es decir, una página HTML
// Para "imprimir" etiquetas HTML, usaremos la instrucción echo


echo '<table border=1>';  // Inicia una tabla con recuadro
// El siguiente ciclo recorre cada renglón de la tabla resultado de la consulta
// La función mysqli_fetch_array recorre la estructura que recibió mysqli_query
// desde el principio, un renglón a la vez, lo almacena en un arreglo,
// avanza automáticamente al siguiente renglón 
// y termina cuando ya no hay renglón que leer
$encabezados=0;
while($renglon= mysqli_fetch_array($resultado)){   
    // La función mysqli_field_seek sitúa el apuntador en la primera columna
	// Esto se hace cada vez que se lee un nuevo renglón para deplegar 
	// los valores desde la primera columna (columna 0)
	mysqli_field_seek($resultado, 0);
	// Cada vez que se lee de un nuevo renglón de la consulta hay que desplegarlo 
	// La etiqueta <tr> empieza un nuevo renglón en la tabla a deplegar
	// La función mysqli_fetch_filed lee cada columna de la consulta dependiendo el
	// renglón donde se encuentre en ese momento y regresa una estructura de datos
	
	// Esta condición es para saber si se tiene que desplegar un renglón con los 
	// títulos de los encabezados de cada columna o no
	
	if ($encabezados==0){
		
		echo '<tr>';
		while ($atributo= mysqli_fetch_field($resultado)){
			echo '<th>';  // Se inicia una nueva celda en el renglón
			echo $atributo->name;  // El arreglo renglón contiene un valor para cada nombre de atributo
			echo '</th>'; // Termina la celda
		}
		$encabezados=1;
		mysqli_field_seek($resultado, 0);
		echo '</tr>';
	}
	
	echo '<tr>';
	while ($atributo= mysqli_fetch_field($resultado)){
		echo '<td>';  // Se inicia una nueva celda en el renglón
		// ********** LIGAS al archivo indicado en la variable $archivo
		//  en el atributo indicado en la variable $llave
		
		// En la columna correspondiene a la llave primaria que definimos en el archivo consulta_productos.php
		if ($atributo->name==$llave)
		    echo '<a href="index.php?opcion_menu='.$opcion_menu.'&tabla='.$tabla.'&llave='.$llave.'&valor='.$renglon[$atributo->name].'">'.$renglon[$atributo->name].'</a>';
		else	
			echo $renglon[$atributo->name];  // El arreglo renglón contiene un valor para cada nombre de atributo
		
		echo '</td>'; // Termina la celda
	}
	echo '</tr>';  // La etiqueta </tr> termina un nuevo renglón en la tabla a deplegar
}
echo '</table>';  // Termina la tabla

?>