<?php

require_once('./controller/controller.php');
require_once('./controller/userController.php');


$route = htmlspecialchars($_GET['url']);



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

}elseif($route == 'contactAction'){
    if(!isset($_POST['name']) or !isset($_POST['mail']) or !isset($_POST['message'])){
        contact();
        return;
    }

    if($_POST['name'] == '' or $_POST['mail'] == '' or $_POST['message'] == ''){
        contact();
        return;
    }

    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['mail']);
    $message = htmlspecialchars($_POST['message']);

    contactAction($name,$mail,$message);
}elseif($route == 'admin'){
    admin();
}elseif($route == 'addPresent'){
    $description = htmlspecialchars($_POST['description']);
    $id = htmlspecialchars($_POST['cardId']);
    $price = htmlspecialchars($_POST['price']);
    $link = htmlspecialchars($_POST['link']);


    addPresent($id, $description, $price, $link);


}elseif($route == 'ocado'){
    ocado();
}elseif($route == 'removePresent'){
    $id = htmlspecialchars($_GET['id']);
    removePresent($id);
}elseif($route == 'deleteUser'){
    deleteUser($_SESSION['userId']);    
}

