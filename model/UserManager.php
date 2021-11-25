<?php

require_once('./model/Manager.php');

class UserManager extends Manager{

    private function exist($login){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT login FROM users");
        $receve->execute();
        $users = $receve->fetchAll();


        foreach($users as $user){
            if($user['login'] === $login){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function userCreate($login, $pass, $name, $mail){
        if($this->exist($login)){
            return FALSE;
        }

        $db = $this->dbconnect();
        $receve = $db->prepare("INSERT INTO users (password, login, email) VALUES (:password,:login,:email)");
        $receve->execute([
            'password'=>$pass,
            'login'=>$login,
            'email'=>$mail,
        ]) or die(require('./view/error.php'));

        $users = $receve->fetchAll();
        return TRUE;
    }

    public function login($login, $pass){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT login, password FROM users WHERE login=:login");
        $receve->execute([
            'login' => $login,
        ]);
        $info = $receve->fetchAll();

        if(!isset($info[0]['login']) or !isset($info[0]['password'])){
            return FALSE;
        }

        if(hash_equals($pass, $info[0]['password'])){
            return TRUE;
        }


        return FALSE;
    }

  
}