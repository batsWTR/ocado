<?php



function createUser($user, $pass){
    $hash_pass = crypt($pass, '25');
    return $hash_pass;
}