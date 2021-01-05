<?php

// Para ejecutar este script hay que escribir en el navegador lo siguiente:
// Si se ejecuta en tu servidir local  -> http://localhost/desplegar_tabla/consulta_1.php
// Si se ejecuta en tu servidir remoto  -> http://URL/desplegar_tabla/consulta_1.php
// aquí se asume que los tres archivos (consulta_1.php, datos.php y desplegar_tabla.php)
// se encuentran en una carpeta llamada desplegar_tabla
// En un servidor WEB (como XAMPP), esta carpeta debe estar dentro de la carpeta httdocs
///////////////////////////////////////////////////////////////////////////////////////////////

// ESPECIFICAR LOS DATOS DE CONEXION AL SERVIDOR MySQL y BASE DE DATOS 
// la instrucción include ejecuta el script php que indiques
// en este caso, el script datos.php, solo contiene asignación de valores a las variables
// necesarias para conectarse al servidor local de MySQL
include "datos.php";

// CONEXION AL SERVIDOR DE MySQL
// mysqli_connect es una función para conectarse al servidor de MySQL
// como paránetro de entrada recibe el nombre del host (local o remoto), el usuario de la cuenta da la base
// de datos de MySQL, su password y el nombre de la base de datos a la que se debe conectarse
// y regresa un id del enlace, el cual se usará para enviar peticiones de consultas o actualizaciones a MySQL
$enlace = mysqli_connect($host, $usuario, $password, $bd);

// DEFINICION DE UNA CONSULTA SQL
// Se acostumbra guardar en una variable, una cadena que contenga una sentencia SQL válida
// Se recomienda primero probar esta consulta directamente en un cliente de MySQL para asegurarse 
// de que su sintaxis sea la correcta, y la consulta sea la requerida


$consulta_sql="SELECT * FROM vista_inventario_productos";    // Vista de la clase 4 en linea

// ENVIAR LA SOLCITUD DE LA CONSULTA AL SERVIDOR DE MySQL
// mysqli_query es una función que puede enviar una sentencia SQL para consulta o actualización al
// servidor de MySQL indicado.
// En caso de una sentencia SELECT, regresará una estructura que contendrá los datos 
// del resultado de la consulta
$resultado= mysqli_query($enlace, $consulta_sql);

// Ahora en lugar de desplegar la tabla con el arhivo desplegar_tabla, usamos el archivo
// desplegar_tabla_ligas y enviamos variables para su configuración específica 
// en este caso para la tabla producto
$opcion_menu='formulario_editable';
$tabla='producto';
$llave='codigo';
include "desplegar_tabla_ligas.php";

// DESCONEXION DE LA BASE DE DATOS
mysqli_close($enlace);

?>

