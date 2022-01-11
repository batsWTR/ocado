<?php

require_once('./model/Manager.php');

class ParticipantManager extends Manager{
    public function addParticipation($owner, $gift, $price){

        $db = $this->dbconnect();
        $receve = $db->prepare("INSERT INTO `participant`(`owner_id`, `gift_id`, `price`) VALUES (:owner,:gift,:price)");
        $receve->execute([
            'owner' => $owner,
            'gift' => $gift,
            'price' => $price
        ]);
        $receve->fetchAll();

        $db = null;
        $receve = null;
    }

    public function deleteParticipation($id){
        $db = $this->dbconnect();
        $receve = $db->prepare("DELETE FROM `participant` WHERE `id`=:id");
        $receve->execute([
            'id' => $id
        ]);
        $receve->fetchAll();
    }

    public function getParticipant($gift_id){
        $db = $this->dbconnect();
        $receve = $db->prepare("SELECT * FROM participant WHERE gift_id = :id");
        $receve->execute([
            'id' => $gift_id
       
        ]);
        $result = $receve->fetchAll();

        return $result;
    }
}