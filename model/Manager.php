<?php

class Manager{
    protected function dbconnect(){
        $db = new PDO('mysql:host=mysql-bawee.alwaysdata.net', 'bawee', 'baweeprojet7');

        return $db;
    }
}