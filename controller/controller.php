<?php session_start();

require_once("./model/UserManager.php");
require_once("./model/CardManager.php");


function accueil(){
    //session_start();
    if($_SESSION['name']){
        header('Location:index.php?url=ocado');
        return;
    }

    require('./view/accueil.php');
}

function disconnect(){
    //session_start();
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



function ocado(){

    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }
    $cardManager = new CardManager();

    $results = $cardManager->getAllCards();



    require_once('./view/ocado.php');
    return;
}

function contactAction($name, $mail, $message){
    
    $mailBody = $name.' a l adresse '.$mail.' vous a envoye le message:\r'.$message;

    echo $mailBody;

    echo 'demande de contact';
}

function admin(){
    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }

    require_once('./view/admin.php');
}

function addPresent($id, $description, $price, $link){
    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }

    $cardManager = new CardManager();
    $cardManager->addPresent($id, $description, $price, $link);

    header('Location:index.php?url=ocado');
    exit();
}

function removePresent($id){
    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }

    $cardManager = new CardManager();
    $cardManager->removePresent($id);

    header('Location:index.php?url=ocado');
    exit();
}