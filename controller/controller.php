<?php

require("./model/UserManager.php");

function accueil(){
    require('./view/accueil.php');
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

    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
   

    $userManager = new UserManager();
    $create = $userManager->userCreate($login,$pass_hash,$name,$mail);

    if($create){
        require_once('./view/ocado.php');
        return;
    }else{
        $message= 'l utilisateur existe deja';
    }


    require_once('./view/signup.php');
}

function connect($name,$login,$pass){
    if($name == '' or $login == '' or $pass == ''){
        echo 'il manque un champs';
    }
    echo $name.' '.$login.' '.$pass;
}