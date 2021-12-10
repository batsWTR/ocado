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

 
    connect($name,$login,$pass);

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
    admin();
}elseif($route == 'addPresent'){

    $description = InputManager::validate($_POST['description']);
    $cardId = InputManager::validate($_POST['cardId']);
    $price = InputManager::validate($_POST['price']);
    $link = InputManager::validate($_POST['link']);


    addPresent($cardId, $description, $price, $link);


}elseif($route == 'ocado'){
    ocado();

}elseif($route == 'removePresent'){
    $id = InputManager::validate($_GET['id']);
    removePresent($id);

}elseif($route == 'deleteUser'){
    deleteUser($_SESSION['userId']); 
       
}elseif($route == 'deleteCard'){
    deleteCard($_SESSION['name'], $_SESSION['userId']);

}elseif($route == 'participer'){
    if(!isset($_GET['id'])){
        ocado();
    }


    participate($_GET['id']);
}elseif($route == 'participateAction'){
    echo $_POST['id'];
}

