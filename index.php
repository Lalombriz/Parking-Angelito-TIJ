<?php

include_once 'user.php';
include_once 'usersesion.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user']))
{
    echo "Hay sesion";

}else if(isset($_POST['username']) && isset($_POST['password'])){
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm,$passForm)){
       // echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'home.php';
    }else{
       // echo "Nombre de usuario y password incorrecto";
        $errorLogin = "Nombre de usuario y o pasword incorrecto";
        include_once 'login.php';
    }
}else{
    //echo "Login";
    include_once 'login.php';
}

?>