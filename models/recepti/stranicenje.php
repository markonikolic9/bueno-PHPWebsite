<?php

header("Content-Type: application/json");
if(isset($_GET['btn'])){
    include "../../config/connection.php";
    include "functions.php";


    $idKat = $_GET['idKat'];
    $limit = $_GET['limit'];

    $recepti = dohvatiReceptePoPaginaciji($idKat, $limit);
    $brojReceptaPoKat = dohvatiPaginaciju($idKat);
    $result =  [
        "recepti" => $recepti,
        "brojReceptaPoKat" => $brojReceptaPoKat
    ];
    echo json_encode($result);


} else {
    echo json_encode(["message" => "Limit not passed."]);
    http_response_code(400);
}