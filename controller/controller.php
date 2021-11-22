<?php

require("./model/model.php");

function login(){
    require('./view/login.php');
}

function signup(){

    require('./view/signup.php');
}

function contact(){
    require('./view/contact.php');
}

function userCreation($user, $pass){

    echo $user.' '.$pass;
}

function connect($name,$login,$pass){
    echo $name.' '.$login.' '.$pass;
}