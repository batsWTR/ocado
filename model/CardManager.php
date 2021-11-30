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
        $receve = $db->prepare("SELECT `name`, `user_id` FROM `card` WHERE `name` = :name AND `user_id`= :id");
        $receve->execute([
            'name' => $name,
            'id' => $id,
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
//SELECT name, isAdmin, gift.description, gift.price, gift.link FROM `card`  LEFT JOIN gift ON card.id = gift.card_id WHERE name = 'bapt' AND user_id = 50
//SELECT name, isAdmin FROM card WHERE user_id = :id
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT name, isAdmin, gift.description, gift.price, gift.link FROM `card`  LEFT JOIN gift ON card.id = gift.card_id WHERE user_id = :id
        ");
        $receve->execute([
            'id' => $_SESSION['userId']
        ]);
        $results = $receve->fetchAll();

        $ret = [];

        foreach($results as $result){
            $ret[$result['name']] = [
                'isAdmin' => $result['isAdmin'],
                'presents' => [],
            ];
        }

        ?>
        <pre>
        <?php
        print_r($ret);
        ?>
        </pre>
        <?php
        return $results;
    }
}