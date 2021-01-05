<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Iniciar sesion</title>
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
    <div class="login-dark">
        <form method="post">
            <?php

                if(isset($errologin))
                {
                    echo $errologin;
                }

            ?>
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-android-car"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Usuario"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Iniciar sesion</button></div><a class="forgot" href="#">Sistema gestor del parking&nbsp;</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>