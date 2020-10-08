<?php

if(isset($_POST['btn'])){
    include "../../config/connection.php";

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $greske = [];

    $regImePrezime = "/^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/";
    if(!preg_match($regImePrezime, $ime)){
        array_push($greske, "Loš format imena!");
    }

    if(!preg_match($regImePrezime, $prezime)){
        array_push($greske, "Loš format prezimena!");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($greske, "Loš format email-a!");
    }

    $regPass = "/^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/";
    if(!preg_match($regPass, $pass)){
        array_push($greske, "Loš format šifre!");
    }

    if(count($greske) == 0){

        $select = $conn->prepare("SELECT * FROM korisnik WHERE email = ?");
        $select->bindValue(1, $email);
        $select->execute();
        $korisnik = $select->fetch();

        if(!$korisnik){

            $password = md5($pass);

            try{
                $insert = $conn->prepare("INSERT INTO korisnik VALUES ('', ?, ?, ?, ?, '2')");
                $insert->execute([$ime, $prezime, $email, $password]);
                echo "Uspesno ste se registrovali!";
                http_response_code(201);

            }catch (PDOException $ex){
                echo $ex->getMessage();
            }

        } else {
            http_response_code(400);
        }


    } else {
        http_response_code(422);
    }

} else {

}