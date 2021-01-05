<?php
    //codigo de la conexion de la pagina con la base de datos 
    //funciona con el archivo agregar_auto.php ya que de ahi agarramos los datos para almacenarlos en la database
	$conexion =  new mysqli("localhost","omdprofx_eduardogutierrez","Edu25519","omdprofx_eduardogutierrez-proyecto");
    
    if(isset($_POST['nom']) && isset($_POST['ap']) && isset($_POST['serie']) && isset($_POST['color']) && isset($_POST['ser']) && isset($_POST['fecha']) && isset($_POST['mar']) && isset($_POST['key']) && isset($_POST['modelo']) && isset($_POST['pre']))
    {
        $nom=$_POST['nom'];
        $apellido=$_POST['ap'];
        $serie=$_POST['serie'];
        $color=$_POST['color'];
        $fecha=$_POST['fecha'];
        $marca=$_POST['mar'];
        $llave=$_POST['key'];
        $modelo=$_POST['modelo'];
        $servicio=$_POST['ser'];
        $cantidad=$_POST['pre'];


        
        //codigo para la insercion de datos desde un formulario 
        $query = "INSERT INTO cliente(Nombre,Apellido,Fecha_in,marca,color,Servicio_ID_fk,precio_id,NumSerie,Num_key,modelo) 
        values('$nom','$apellido','$fecha','$marca','$color','$servicio','$cantidad','$serie','$llave','$modelo')";


        if($conexion->query($query))
        {
            echo "Registro completado!!";
        }
        else
        {
            echo "Error al agregar los datos causado por  -> ".$conexion->error;
        }
    }
    else
    {
        echo "Ingrese los datos del cliente ";
    }

    $conexion->close();
?>