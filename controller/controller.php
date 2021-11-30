<?php session_start();

require("./model/UserManager.php");
require("./model/CardManager.php");

function accueil(){
    //session_start();
    if($_SESSION['name']){
        ocado();
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

    $pass_hash = md5($pass.'lepetitchaperonrouge');
   

    $userManager = new UserManager();
    $create = $userManager->userCreate($login,$pass_hash,$name,$mail);
    

    if($create == false){
        $message= 'l utilisateur existe deja';
        require_once('./view/signup.php');
        return;
    }

    // create card
    $id = $userManager->getUserId($login);
    $cardManager = new CardManager();
    $cardManager->createCard($name, true, $id);



    //session_start();
    $_SESSION['name'] = $name;
    $_SESSION['userId'] = $id;

    ocado();

    
}

function connect($name,$login,$pass){
    if($name == '' or $login == '' or $pass == ''){
        $message = 'il manque un champs';
        require_once('./view/login.php');
        return;

    }

    

    $pass_hash = md5($pass.'lepetitchaperonrouge');

    $userManager = new UserManager();
    $log = $userManager->login($login, $pass_hash);

    if(!$log){
        $message = 'L\'utilisateur ou le mot de passe sont incorrects';
        require_once('./view/login.php');
        return;
    }

    // create card if name does not exist
    $cardManager = new CardManager();
    $id = $userManager->getUserId($login);

    $_SESSION['name'] = $name;
    $_SESSION['userId'] = $id;

    $result = $cardManager->cardExist($name, $id);
    
    if(!$result){
        $cardManager->createCard($name, false, $id);
    }

    



    ocado();
}

function ocado(){
    $cardManager = new CardManager();
    $results = $cardManager->getAllCards();
    //print_r($results);
    //require_once('./view/ocado.php');
    return;
}

function contactAction($name, $mail, $message){
    
    $mailBody = $name.' a l adresse '.$mail.' vous a envoye le message:\r'.$message;

    echo $mailBody;

    echo 'demande de contact';
}

function admin(){
    require_once('./view/admin.php');
}