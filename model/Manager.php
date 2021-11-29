<?php
    require_once('./db_credentials.php');


class Manager{
    protected function dbconnect(){

        try{
            $db = new PDO($GLOBALS['DB_BASE'], $GLOBALS['DB_LOGIN'] ,$GLOBALS['DB_PASS'] );
            return $db;

        }catch (Exception $e){
            $e = 'Une erreur s\'est produite';
            require_once('./view/error.php');
            exit();
            return 0;
        }

        
    }
}