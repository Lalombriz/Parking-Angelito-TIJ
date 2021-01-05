<?php

    include_once 'usersesion.php';
    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: index.php");

?>