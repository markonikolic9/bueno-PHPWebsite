<?php

define("RECEPT_OFFSET", 3);

function dohvatiReceptePoKategoriji($id){
    global $conn;
    $upit = $conn->prepare("SELECT * FROM recepti WHERE id_kat = ?");
    $upit->bindValue(1, $id);

    try{
        $upit->execute();
        return $obj = $upit->fetchAll();
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }

}

function dohvatiReceptPoId($id){
    global $conn;
    $upit = $conn->prepare("SELECT * FROM recepti WHERE id_r = ?");
    $upit -> bindValue(1, $id);
    try{
        $upit->execute();
        return $obj = $upit->fetch();
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function glasanje($idK, $idR){
    global $conn;
    $upit = $conn->prepare("SELECT * FROM ocena WHERE id_k = ? AND id_r = ?");
    $upit->bindValue(1, $idK);
    $upit->bindValue(2, $idR);
    try{
        $upit->execute();
        return $upit;
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}
function brojGlasovaRecept($id){
    global $conn;
    $upit = $conn->prepare("SELECT * FROM ocena WHERE id_r = ?");
    $upit->bindValue(1, $id);
    try{
        $upit->execute();
        return $upit;
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function sumOcena($id){
    global $conn;
    $upit = $conn->prepare("SELECT SUM(ocena) as avg FROM ocena WHERE id_r = ?");
    $upit->bindValue(1, $id);
    try{
        $upit->execute();
        return $obj = $upit->fetch();
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}

function dohvatiBrojStrana($idKat){
    try {

        return executeQueryOneRow("SELECT COUNT(*) as broj FROM recepti WHERE id_kat = $idKat");
    }catch (PDOException $ex) {

        return [
            'message'=> $ex->getMessage()
        ];
    }
}

function dohvatiPaginaciju($idKat){
    $result = dohvatiBrojStrana($idKat);
    $broj = $result->broj;

    return ceil($broj/RECEPT_OFFSET);
}

function dohvatiReceptePoPaginaciji($idKat, $limit = 0){
    global $conn;
    try{
        $upit = $conn->prepare("SELECT * FROM recepti WHERE id_kat = :idKat LIMIT :limit, :offset");
        $limit = ((int) $limit) * RECEPT_OFFSET;
        $offset = RECEPT_OFFSET;

        $upit->bindParam(":idKat", $idKat, PDO::PARAM_INT);
        $upit->bindParam(":limit", $limit, PDO::PARAM_INT);
        $upit->bindParam(":offset", $offset, PDO::PARAM_INT);

        $upit->execute();

        $recepti = $upit->fetchAll();
        return $recepti;
    }catch (PDOException $ex){
        return [
                'message'=> $ex->getMessage()
            ];
    }
}