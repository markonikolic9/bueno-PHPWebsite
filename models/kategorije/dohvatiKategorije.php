<?php

function dohvatiKategorije(){
    global $conn;
    $upit = $conn->query("SELECT * FROM kategorija");
    return $upit->fetchAll();
}