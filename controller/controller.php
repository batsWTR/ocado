<?php

require("./model/UserManager.php");

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

    $userManager = new UserManager();
    $create = $userManager->userCreate($login,$pass,$name,$mail);

    if($create){
        $message = 'utilisateur cree';
        echo $message;
        require('./view/contact.php');

    }else{
        $message= 'l utilisateur existe deja';
        require('./view/signup.php');

    }

}

function connect($name,$login,$pass){
    echo $name.' '.$login.' '.$pass;
}