<?php

session_start();

if(isset($_POST['btn'])){
    include "../../config/connection.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $greske = [];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($greske, "Wrong email format!");
    }

    $regPass = "/^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/";
    if(!preg_match($regPass, $pass)){
        array_push($greske, "Wrong password format!");
    }

    if(count($greske)==0){

        $password = md5($pass);

        try{
            $select = $conn->prepare("SELECT * FROM korisnik WHERE email = ? AND password = ?");
            $select->execute([$email, $password]);
            $korisnik=$select->fetch();

            if(!$korisnik){
                http_response_code(404);
            }

            if($korisnik->password == $password){
                $_SESSION['korisnik'] = $korisnik;
                http_response_code(200);
            } else {
                http_response_code(409);
            }

        }catch (PDOException $ex){
            $ex->getMessage();
            http_response_code(500);
        }

    } else {
        http_response_code(422);
    }
} else {
    http_response_code(403);
}