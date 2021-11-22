<?php

require('./controller/controller.php');

$route = htmlspecialchars($_GET['url']);


if($route == ''){
    login();
}elseif($route == 'signup'){
    signup();
}

