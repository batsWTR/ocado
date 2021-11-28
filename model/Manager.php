<?php

class Manager{
    protected function dbconnect(){
        try{
            $db = new PDO('mysql:host=mysql-bawee.alwaysdata.net;dbname=bawee_ocado;charset=utf8mb4', 'bawee', 'baweeprojet7');
            return $db;

        }catch (Exception $e){
            $e = 'Une erreur s\'est produite';
            require_once('./view/error.php');
            exit();
            return 0;
        }

        
    }
}