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
        <div class="container"><a class="navbar-brand" href="#">Parking Angelito</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="btn btn-primary float-right"
                role="button" href ="logout.php">Cerrar sesion</a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="features-boxed">
        <div class="container">
            <div class="intro"></div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-automobile icon"></i>
                        <h3 class="name">Registrar un auto</h3>
                        <p class="description">Se da de alta un auto que viene a requerir un servicio en el parking.</p><a class="learn-more" href="registrar_auto.php">[REGISTRAR]</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-clock-o icon"></i>
                        <h3 class="name">Entregar un auto</h3>
                        <p class="description">Hacemos la entrega de un automovil a su respectivo cliente.</p><a class="learn-more" href="entregar_auto.php">[ENTREGAR]</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-list-alt icon"></i>
                        <h3 class="name">Lista de autos&nbsp;</h3>
                        <p class="description">Listado de autos activos en el parking que se encuentran con un servicio activo.</p><a class="learn-more" href="lista_de_autos.php">[VISUALIZAR LISTA]</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-book icon"></i>
                        <h3 class="name">Hitorial de registros</h3>
                        <p class="description">Lista de todos los automoviles registrados.</p><a class="learn-more" href="historial_de_autos.php">[HISTORIAL]</a></div>
                </div>
                 <!--  
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    
                    <div class="box"><i class="fa fa-cog icon"></i>
                        <h3 class="name">Configuraciones</h3>
                        <p class="description">Configuraciones del sistema dep parking</p><a class="learn-more" href="configuraciones.php" name = 'config'>[CONFIGURACIONES]</a></div>
              
			   </div>
                 -->
            </div>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="registrar_auto.php">Registrar Auto</a></li>
                <li class="list-inline-item"><a href="entregar_auto.php">Entrega de auto</a></li>
                <li class="list-inline-item"><a href="lista_de_autos.php">Lista de autos</a></li>
                <li class="list-inline-item"><a href="historial_de_autos.php">Historial</a></li>
            </ul>
            <p class="copyright">Parking Angelito © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>