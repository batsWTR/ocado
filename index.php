<?php

require('./controller/controller.php');

$route = htmlspecialchars($_GET['url']);



if($route == ''){
    accueil();
}elseif($route == 'login'){
    login();

}elseif($route == 'signup'){
    signup();
}elseif($route == 'contact'){
    contact();

}elseif($route == 'createUser'){
    $login = htmlspecialchars($_POST['login']);
    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['mail']);
    $pass = htmlspecialchars($_POST['password']);

    userCreation($login, $pass, $name, $mail);

}elseif($route == 'connect'){
    $name = htmlspecialchars($_POST['name']);
    $login = htmlspecialchars($_POST['login']);
    $pass = htmlspecialchars($_POST['password']);

    connect($name,$login,$pass);
}


