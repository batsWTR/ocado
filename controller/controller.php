<?php

require("./model/UserManager.php");

function accueil(){
    session_start();
    if($_SESSION['name']){
        require_once('./view/ocado.php');
        return;
    }

    require('./view/accueil.php');
}

function disconnect(){
    session_start();
    session_destroy();
    unset($_SESSION);
    require_once('./view/accueil.php');
}

function login(){
    require('./view/login.php');
}

function signup(){

    require('./view/signup.php');
}

function contact(){
    require('./view/contact.php');
}

function userCreation($login, $pass, $name, $mail){


    // test if parameters are present
    if($login == '' or $pass == '' or $name == '' or $mail == ''){
        $message = 'Il manque un parametre';
        require_once('./view/signup.php');
        return;
        
    }

    // test max length
    if(strlen($login) > 25 or strlen($name) > 25 or strlen($email) > 25){
        $message = 'maximum 25 caracteres';
        require_once('./view/signup.php');
        return;
    }

    // test length of password
    if(strlen($pass) < 6 or strlen($pass) > 25){
        $message = 'Le mot de passe doit contenir entre 6 et 25 caracteres';
        require_once('./view/signup.php');
        return;
    }

    $pass_hash = crypt($pass, 'lepetitchaperonrouge');
   

    $userManager = new UserManager();
    $create = $userManager->userCreate($login,$pass_hash,$name,$mail);

    if(!$create){
        $message= 'l utilisateur existe deja';
        require_once('./view/signup.php');
        return;
    }

    session_start();
    $_SESSION['name'] = $name;

    require_once('./view/ocado.php');

    
}

function connect($name,$login,$pass){
    if($name == '' or $login == '' or $pass == ''){
        $message = 'il manque un champs';
        require_once('./view/login.php');
        return;

    }

    $pass_hash = crypt($pass, 'lepetitchaperonrouge');

    $userManager = new UserManager();
    $log = $userManager->login($login, $pass_hash);

    if(!$log){
        $message = 'L\'utilisateur ou le mot de passe sont incorrects';
        require_once('./view/login.php');
        return;
    }

    session_start();
    $_SESSION['name'] = $name;

    require_once('./view/ocado.php');
}