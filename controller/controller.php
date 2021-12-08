<?php session_start();

require_once("./model/UserManager.php");
require_once("./model/CardManager.php");
require_once("./model/InputManager.php");


function accueil(){
    //session_start();
    if($_SESSION['name']){
        header('Location:index.php?url=ocado');
        return;
    }

    require('./view/accueil.php');
}

function disconnect(){
    session_destroy();
    unset($_SESSION);
    header('Location:index.php');
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



function ocado($mes = null){

    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }
    $cardManager = new CardManager();

    $results = $cardManager->getAllCards();


    $message = $mes;

    require_once('./view/ocado.php');
    return;
}

function contactAction($name, $mail, $message){
    
    $mailBody = $name.' a l adresse '.$mail.' vous a envoye le message:\r'.$message;

    echo $mailBody;

    echo 'demande de contact';
}


function addPresent($cardId, $description, $price, $link){
    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }

    $message = '';

    if(!InputManager::checkPrice($price)){
        $message = 'Le prix ne doit pas dépasser 100 000 euros';
    }
    if(!InputManager::checkInput($description)){
        $message = 'La description doit contenir entre 2 et 255 caractères';
    }
    if(!InputManager::checkLink($link)){
        $message = 'Le champs doit contenir un lien ou resteer vide';
    }

    if($message == ''){
        $cardManager = new CardManager();
        $cardManager->addPresent($cardId, $description, $price, $link);
    }

    ocado($message);
    return;
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

function deleteCard($name, $userId){
    if(!$_SESSION['name']){
        header('Location:index.php');
        exit();
    }

    $cardManager = new CardManager();
    $cardManager->deleteCard($name, $userId);

    session_destroy();
    unset($_SESSION);

    header('Location:index.php');
    exit();
}

