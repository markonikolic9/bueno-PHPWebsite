<?php

require_once 'config.php';

try{
    $conn = new PDO('mysql:host='.SERVER.';dbname='.DATABASE.';charset-utf8', USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch (PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($upit){
    global $conn;
    return $conn->query($upit)->fetchAll();
}

function executeQueryOneRow($query){
    global $conn;
    return $conn->query($query)->fetch();
}


