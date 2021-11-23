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
        ]) or die(print_r($db->errorInfo()));

        $users = $receve->fetchAll();
        return TRUE;
    }

  
}