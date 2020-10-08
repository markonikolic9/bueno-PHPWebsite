<?php

    session_start();
    include "../../config/connection.php";

    if(isset($_SESSION['korisnik'])){

        if(isset($_POST['btn'])){

            global $conn;
            $korisnikId = $_SESSION['korisnik']->id_korisnik;
            $ocena = $_POST['ocena'];
            $idR = $_POST['id'];

            echo $idR;
            echo $korisnikId;
            echo $ocena;

            $upit = $conn->prepare("SELECT * FROM ocena WHERE id_k = ? AND id_r = ?");
            $upit->bindValue(1, $korisnikId);
            $upit->bindValue(2, $idR);
            $rezultat = $upit->fetch();

            if($rezultat==0){

                $insertUpit = $conn->prepare("INSERT INTO ocena VALUES ('', ?, ?, ?)");
                $insertUpit->bindValue(1, $korisnikId);
                $insertUpit->bindValue(2, $idR);
                $insertUpit->bindValue(3, $ocena);

                try{
                    $insertUpit->execute();
                    http_response_code(203);
                }catch (PDOException $ex){
                    echo $ex->getMessage();
                    http_response_code(500);
                }

            } else {
                echo "Vec ste jednom glasali!";
                http_response_code(400);
            }

        } else {
            http_response_code(403);
        }

    } else {
        http_response_code(403);
    }


