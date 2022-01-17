<?php session_start();

require_once("./model/UserManager.php");
require_once("./model/CardManager.php");
require_once("./model/InputManager.php");
require_once("./model/ParticipantManager.php");


function accueil($msg = null, $colorClass = null){

    if($_SESSION['name']){
        header('Location:index.php?url=ocado');
        return;
    }
    $message = $msg;
    $color = '';
    $colorClass == null ? $color = '' : $color = $colorClass;

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



function ocado($mes = null, $colorClass = null){

    $color = '';
    $colorClass == null ? $color = '' : $color = $colorClass;

    if(!$_SESSION['name']){
        accueil($mes, $color);
        exit();
    }
    $cardManager = new CardManager();
    $resultats = $cardManager->getAllCards();


    $message = $mes;
    

    require_once('./view/ocado.php');
    return;
}

function contactAction($name, $mail, $message){
    
    $mailBody = $name.' a l adresse '.$mail.' vous a envoye le message:\n'.$message;

    $delivery = mail("baptiste.wentzler@wanadoo.fr", "Site Ocado", $mailBody);

    $msg = "";
    $color = '';
    $delivery ? $msg = "Votre mail a bien ete envoye" : $msg = "Un probleme est survenu !";
    $delivery ? $color = "alert-ok" : $color = "alert-nok";

    ocado($msg, $color);
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

    $message = 'Votre carte a ete supprime';
    require_once('./view/accueil.php');
}

function participate($giftId){


    $cardManager = new CardManager();
    $gift = $cardManager->getGift($giftId);
    $card = $cardManager->getCardId($_SESSION["name"]);

    // check if already participate
    $participantManager = new ParticipantManager;
    $participation = $participantManager->getOwnerParticipation($gift[0]["id"], $card[0]["id"]);

    //echo '<pre>';
    //print_r($participation);
    //echo '</pre>';
  
    require_once('./view/participate.php');
}

function participateAction($userId, $giftId, $amount){
    if(!$_SESSION['name']){
        header('Location:ocado.php');
        exit();
    }

    if($amount == ""){
        $amount = 1;
    }

    $participantManager = new ParticipantManager();
    $participantManager->addParticipation($userId, $giftId, $amount);

    ocado();

}

function participateRemove($id){
    $participantManager = new ParticipantManager();
    $participantManager->deleteParticipation($id);

    ocado();
}

function participateUpdate($userId, $giftId, $amount){

    $participantManager = new ParticipantManager();
    $participantManager->updateParticipation($userId, $giftId, $amount);

    ocado();
}

