<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Parking Angelito</title>
	 <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#">Registrar un automovil</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="btn btn-primary"
                role="button" href="home.php">Regresar</a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
    <form action= "registrar_auto.php" method = "POST">
        <div class="container">
            <h4 class="text-left">Ingresa los datos del vehiculo a registrar.</h4><br><br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Nombre del cliente:&nbsp;<input type="text" name="nom"></h4>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Apellido: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="ap"></h4>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Fecha de entrada: &nbsp; &nbsp;<input type="date" name = "fecha"></h4>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Color: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input type="text" name="color"></h4>
                    
                            <br><h4>Servicio de limpieza:</h4>
                            <input type="radio" id="lavado" name="ser" value="1">
                            <label for="lavado">Lavado y Aspirado $150</label><br>
                            <input type="radio" id="enserado" name="ser" value="2">
                            <label for="enserado">Enserado de focos $50</label><br>
                            <input type="radio" id="aspirado" name="ser" value="3">
                            <label for="aspirado">Lavado $75</label><br>
                            <input type="radio" id="ninguno" name="ser" value="4">
                            <label for="ninguno">ninguno</label><br><br>

                            <h4>Opciones de precio de automovil:</h4>
                            <input type="radio" id="dia" name="pre" value="1">
                            <label for="dia">Del dia menos de 12hr $40 pesos</label><br>
                            <input type="radio" id="Importacion" name="pre" value="2">
                            <label for="Importacion">Especial $60</label><br>
                            <input type="radio" id="Del completo" name="pre" value="3">
                            <label for="Del completo">Dia completo 24hr $80</label><br><br>
							
							<h4>Opciones de precio de motocicleta:</h4>
                            <input type="radio" id="diaM" name="pre" value="4">
                            <label for="diaM">Del dia menos de 24hr $30 pesos</label><br>
                            <input type="radio" id="completoM" name="pre" value="2">
                            <label for="completoM">Dia completo de 24hr $40</label><br><br>
                           
                   
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4>Numero llave:   &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<input type="text" name="key"></h4>
                    <h4>Marca: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<input type="text" name="mar"></h4>
                    <h4>Modelo: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<input type="text" name="modelo"></h4>
                    <h4>Numero de serie: &nbsp; &nbsp; &nbsp;<input type="text" name="serie"></h4>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<br>
                    <h5>El numero de serie tiene que ser los ultimos 4 digitos de la serie del automovil.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><button class="btn btn-primary float-right" type="submit">Enviar</button></div>
            </div>
        </div>
    </div>
    <?php include_once "agregar_auto.php"; ?>
    </form>
    <div class="footer-basic">
        <footer>
            <div class="social"></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="home.php">Inicio</a></li>
                <li class="list-inline-item"><a href="entregar_auto.php">Entrega de auto</a></li>
                <li class="list-inline-item"><a href="lista_de_autos.php">Listado de autos</a></li>
                <li class="list-inline-item"><a href="historial_de_autos.php">Historial</a></li>
            </ul>
            <p class="copyright">Parking Angelito © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>