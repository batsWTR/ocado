<?php

require_once('./model/Manager.php');

class CardManager extends Manager{
    
    public function deleteCard($name, $userId){
        $db = $this->dbconnect();
        $receve = $db->prepare("DELETE FROM `card` WHERE `user_id`=:id AND `name`=:name AND isAdmin=0");
        $receve->execute([
            'id' => $userId,
            'name' => $name
        ]);
        $receve->fetchAll();

    }
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

    public function cardInfo($name, $id){

        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT `name`, `user_id`, `isAdmin` FROM `card` WHERE `name` = :name AND `user_id`= :id");
        $receve->execute([
            'name' => $name,
            'id' => $id,
        ]);
        $result = $receve->fetchAll();


        if($result[0]['name']){
            $db = null;
            $receve = null;
            return $result;
        }

        $db = null;
        $receve = null;
        return FALSE;
    }

    public function getAllCards(){
        //SELECT name, isAdmin, gift.description, gift.price, gift.link FROM `card`  LEFT JOIN gift ON card.id = gift.card_id WHERE name = 'bapt' AND user_id = 50
        //SELECT name, isAdmin FROM card WHERE user_id = :id
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT name,card.id, isAdmin, gift.id AS giftId, gift.description, gift.price, gift.link FROM `card`  LEFT JOIN gift ON card.id = gift.card_id WHERE user_id = :userId
        ");
        $receve->execute([
            'userId' => $_SESSION['userId']
        ]);
        $results = $receve->fetchAll();

        $ret = [];

        foreach($results as $result){
            $ret[$result['name']] = [
                'isAdmin' => $result['isAdmin'],
                'cardId' => $result['id'],
                'presents' => [],
            ];
        }
        foreach($results as $result){
            $present = ['description'=>$result['description'], 'price'=>$result['price'], 'link'=>$result['link'], 'giftId' => $result['giftId'],];
            $ret[$result['name']]['presents'][] = $present;
            
        }

        return $ret;
    }

    public function getCard($cardId){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT name,card.id, isAdmin, gift.id AS giftId, gift.description, gift.price, gift.link FROM `card`  LEFT JOIN gift ON card.id = gift.card_id WHERE card.id = :cardId
        ");
        $receve->execute([
            'cardId' => $cardId
        ]);
        $results = $receve->fetchAll();
        return $results;
    }

    public function getCardId($name){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT id FROM `card` WHERE card.name = :name
        ");
        $receve->execute([
            'name' => $name
        ]);
        $results = $receve->fetchAll();
        return $results;
    }

    public function addPresent($cardId, $description, $price, $link){
        $db = $this->dbconnect();
        $receve = $db->prepare("INSERT INTO `gift`(`description`, `price`, `link`, `card_id`) VALUES (:desc, :price, :link, :id)");
        $receve->execute([
            'id' => $cardId,
            'desc' => $description,
            'price' => $price,
            'link' => $link
        ]);
        $results = $receve->fetchAll();
    }

    public function removePresent($giftId){
        $db = $this->dbconnect();
        $receve = $db->prepare("DELETE FROM `gift` WHERE id= :id");
        $receve->execute([
            'id' => $giftId
        ]);
        $results = $receve->fetchAll();
    }

    public function getGift($giftId){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT gift.id, `description`, `price`, `link`, `card_id`,card.name FROM `gift` LEFT JOIN `card`ON gift.card_id = card.id WHERE gift.id= :giftId");
        $receve->execute([
            'giftId' => $giftId
        ]);
        $results = $receve->fetchAll();
        return $results;
    }
}

