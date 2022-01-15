<?php

require_once('./controller/controller.php');
require_once('./controller/userController.php');


$route = InputManager::validate($_GET['url']);



if($route == ''){
    accueil();
}elseif($route == 'disconnect'){
    disconnect();

}elseif($route == 'login'){
    login();

}elseif($route == 'signup'){
    signup();
}elseif($route == 'contact'){
    contact();

}elseif($route == 'createUser'){
    $login = InputManager::validate($_POST['login']);
    $name = InputManager::validate($_POST['name']);
    $mail = InputManager::validate($_POST['mail']);
    $pass = InputManager::validate($_POST['password']);

    userCreation($login, $pass, $name, $mail);

}elseif($route == 'connect'){
    $name = InputManager::validate($_POST['name']);
    $login = InputManager::validate($_POST['login']);
    $pass = InputManager::validate($_POST['password']);

 
    connect(strtolower($name),$login,$pass);

}elseif($route == 'contactAction'){
    if(!isset($_POST['name']) or !isset($_POST['mail']) or !isset($_POST['message'])){
        contact();
        return;
    }

    if($_POST['name'] == '' or $_POST['mail'] == '' or $_POST['message'] == ''){
        contact();
        return;
    }


    
    $name = InputManager::validate($_POST['name']);
    $mail = InputManager::validate($_POST['mail']);
    $message = InputManager::validate($_POST['message']);

    contactAction($name,$mail,$message);
    
}elseif($route == 'admin'){
    if($_SESSION["isAdmin"] == 1){
        admin();
    }else{
        ocado();
    }
    
}elseif($route == 'addPresent'){

    if(!$_SESSION["name"]){
        ocado();
    }

    $description = InputManager::validate($_POST['description']);
    $cardId = InputManager::validate($_POST['cardId']);
    $price = InputManager::validate($_POST['price']);
    $link = InputManager::validate($_POST['link']);


    addPresent($cardId, $description, $price, $link);


}elseif($route == 'ocado'){
    ocado();

}elseif($route == 'removePresent'){
    if(!$_SESSION["name"]){
        ocado();
    }

    $id = InputManager::validate($_GET['id']);
    removePresent($id);

}elseif($route == 'deleteUser'){
    if(!$_SESSION["name"]){
        ocado();
    }

    deleteUser($_SESSION['userId']); 
       
}elseif($route == 'deleteCard'){
    if(!$_SESSION["name"]){
        ocado();
    }

    deleteCard($_SESSION['name'], $_SESSION['userId']);

}elseif($route == 'participer'){
    if(!$_SESSION["name"]){
        ocado();
    }

    if(!isset($_GET['id'])){
        ocado();
    }

    participate($_GET['id']);
    
}elseif($route == 'participateAction'){
    if(!$_SESSION["name"]){
        ocado();
    }

    if(!isset($_POST['id']) || !isset($_POST['amount'])){
        ocado();
    }

    $giftId = InputManager::validate($_POST['id']);
    $amount = InputManager::validate($_POST['amount']);
    $owner = InputManager::validate($_POST["owner"]);
    
    participateAction($owner, $giftId, $amount);

}elseif($route == 'participateRemove'){
    if(!$_SESSION["name"]){
        ocado();
    }

    if(!isset($_GET["id"])){
        ocado();
    }
    
    $id = InputManager::validate($_GET["id"]);
    participateRemove($id);
}elseif($route == "participateUpdate"){
    if(!$_SESSION["name"]){
        ocado();
    }
    
    if(!isset($_POST['id']) || !isset($_POST['amount'])){
        ocado();
    }

    $giftId = InputManager::validate($_POST['id']);
    $amount = InputManager::validate($_POST['amount']);
    $owner = InputManager::validate($_POST["owner"]);

    participateUpdate($owner, $giftId, $amount);
}

