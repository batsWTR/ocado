<?php

require_once('./model/Manager.php');

class UserManager extends Manager{
    public function userCreate($user, $pass){
        $hash_pass = crypt($pass, '25');
        return $hash_pass;
    }
}