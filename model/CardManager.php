<?php

require_once('./model/Manager.php');

class CardManager extends Manager{
    public function createCard($name, $admin, $id){

        $db = $this->dbconnect();
        $receve = $db->prepare("INSERT INTO `card`(`name`, `isAdmin`, `user_id`) VALUES (:name,:isAdmin,:userId)");
        $receve->execute([
            'name' => $name,
            'isAdmin' => $admin,
            'userId' => $id
        ]);
        $receve->fetchAll();

        $db = null;
        $receve = null;
    }

    public function cardExist($name, $id){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT name FROM card WHERE name =:name AND user_id= :id");
        $receve->execute([
            'name' => $name,
            'user_id' => $id
        ]);
        $result = $receve->fetchAll();

        if($result[0]['name']){
            $db = null;
            $receve = null;
            return TRUE;
        }

        $db = null;
        $receve = null;
        return FALSE;
    }

    public function getAllCards(){
        echo 'get all cards';
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT name, isAdmin FROM card WHERE user_id = :id");
        $receve->execute([
            'id' => $_SESSION['userId']
        ]);
        $result = $receve->fetchAll();

        return $result;
    }
}