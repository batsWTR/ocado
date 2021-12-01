<?php

require_once('./model/Manager.php');

class UserManager extends Manager{

    private function exist($login){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT login FROM users WHERE login = :login");
        $receve->execute([
            'login'=>$login
        ]);
        $user = $receve->fetchAll();

        if($user[0]['login'] === $login){
                $db = null;
                $receve = null;
                return TRUE;
            }

        $db = null;
        $receve = null;
        return FALSE;
    }

    public function deleteUser($userId){
        $db = $this->dbconnect();
        $receve = $db->prepare("DELETE FROM `users` WHERE id=:id");
        $receve->execute([
            'id' => $userId
        ]);
        $receve->fetchAll();
    }

    public function userCreate($login, $pass, $name, $mail){
        // test if login exist
        if($this->exist($login)){
            return FALSE;
        }

        //create user
        $db = $this->dbconnect();
        $receve = $db->prepare("INSERT INTO users (password, login, email) VALUES (:password,:login,:email)");
        $receve->execute([
            'password'=>$pass,
            'login'=>$login,
            'email'=>$mail,
        ]) or die(require('./view/error.php'));

        $users = $receve->fetchAll();

        $db = null;
        $receve = null;
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
            $db = null;
            $receve = null;
            return FALSE;
        }

        if(hash_equals($pass, $info[0]['password'])){
            $db = null;
            $receve = null;
            return TRUE;
        }


        $db = null;
        $receve = null;
        return FALSE;
    }

    public function getUserId($login){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT login, id FROM users WHERE login=:login");
        $receve->execute([
            'login' => $login,
        ]);
        $id = $receve->fetchAll();

        $db = null;
        $receve = null;
        return $id[0]['id'];
    }
  
}