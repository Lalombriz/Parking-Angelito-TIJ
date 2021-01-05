<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Parking Angelito</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
		 <link rel="icon" href="img/icon.png">

</head>


<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#">Hitorial de vehiculos&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="btn btn-primary float-right"
                role="button" href="home.php">Regresar</a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de entrada</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio por dia</th>
                    <th>Color</th>
                    <th>Servicio</th>
                    <th>Numero de Serie</th>
                    <th>Numero de llave</th>
                </tr>
            </thead>
                    <?php 
                        //$conexion =  new mysqli("localhost","root","","parking");
						$conexion =  new mysqli("localhost","omdprofx_eduardogutierrez","Edu25519","omdprofx_eduardogutierrez-proyecto");
                        $query = "SELECT * FROM cliente inner join servicios on (Servicio_ID_fk= servicios.Id_servicio) join precio on (precio_id = precio.id_precio)" ;

                        $resultado = $conexion->query($query);
                        $salida="<tbody>";
                        if($resultado->num_rows>0)
                        {
                            while($fila = $resultado->fetch_assoc())
                            {
                                $salida.="<tr>
                                <td>".$fila['Nombre']."</td>
                                <td>".$fila['Apellido']."</td>
                                <td>".$fila['Fecha_in']."</td>
                                <td>".$fila['marca']."</td>
                                <td>".$fila['modelo']."</td>
                                <td>".$fila['costo']."</td>
                                <td>".$fila['color']."</td>
                                <td>".$fila['Nom_Serv']."</td>
                                <td>".$fila['NumSerie']."</td>
                                <td>".$fila['Num_key']."</td>

                                </tr>";
                            }
                        }
                        $salida.="</tbody></table>";
                        echo $salida;
                    ?>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="home.php">Inicio</a></li>
                <li class="list-inline-item"><a href="registrar_auto.php">Registrar auto</a></li>
                <li class="list-inline-item"><a href="entregar_auto.php">Entrega de auto</a></li>
                <li class="list-inline-item"><a href="lista_de_autos.php">Lista de autos</a></li>
            </ul>
            <p class="copyright">Parking Angelito © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>