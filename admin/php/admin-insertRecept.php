<?php
    include "../../config/connection.php";
    if(isset($_POST['insertProizvod'])){
        include "../../config/connection.php";

        $naziv = $_POST['tbNaziv'];
        $nacinPripreme = $_POST['txtNacinPripreme'];
        $sastojci = $_POST['txtSastojci'];
        $kategorija = $_POST['ddlKategorija'];
        $slika = $_FILES['fajlSlika'];
        $datumKreiranja = $_POST['tbDatum'];
        $vremePripreme = $_POST['tbVremePripreme'];
        $kalorije = $_POST['tbKalorije'];
        $posluziti = $_POST['tbPosluziti'];

        $datumKreiranjaPravi = $datumKreiranja." 00:00:00.000000";
        $imeSlike = $slika['name'];
        $tmpImeSlike = $slika['tmp_name'];

        $postojanoImeSlike = "assets/img/recepti/".time().$imeSlike;
        if(move_uploaded_file($tmpImeSlike, "../../$postojanoImeSlike")){

            $upitInsert = $conn->prepare("INSERT INTO recepti SET id_r = NULL, naziv = ?, nacin_pripreme = ?, sastojci = ?, id_kat = ?, slika = ?, datum_kreiranja = ?, vreme_pripreme = ?, kalorije = ?, za_posluziti = ?");
            $upitInsert->bindValue(1, $naziv);
            $upitInsert->bindValue(2, $nacinPripreme);
            $upitInsert->bindValue(3, $sastojci);
            $upitInsert->bindValue(4, $kategorija);
            $upitInsert->bindValue(5, $postojanoImeSlike);
            $upitInsert->bindValue(6, $datumKreiranjaPravi);
            $upitInsert->bindValue(7, $vremePripreme);
            $upitInsert->bindValue(8, $kalorije);
            $upitInsert->bindValue(9, $posluziti);

            if($upitInsert->execute()){
                header("Location: ../pages/index.php?page=insertRecept");
            } else {
                echo "Baza trenutno nije dostupna";
            }
        } else {
            http_response_code(422);
        }
    }

    if(isset($_POST['btnObrisiRecept'])){
        include "../../config/connection.php";

        $idR = $_POST['idR'];
        $upitDelete = $conn->prepare("DELETE FROM recepti WHERE id_r = ?");
        $upitDelete->bindValue(1, $idR);

        if($upitDelete->execute()){

            $recepti = $conn->query("SELECT *,k.naziv AS naziv_kat FROM recepti r INNER JOIN kategorija k ON r.id_kat = k.id_kat")->fetchAll();
            $ispis = '<thead>
                             <tr>
                               <th>ID_R</th>
                               <th>Naziv</th>
                               <th>Nacin pripreme</th>
                               <th>sastojci</th>
                               <th>ID_KAT</th>
                               <th>slika</th>
                               <th>Datum kreiranja</th>
                               <th>Vreme pripreme</th>
                               <th>Kalorije</th>
                               <th>Za posluziti</th>
                               <th>Kontrole</th>
                             </tr>
                        </thead>
                        <tbody>';
                    foreach ($recepti as $recept){
                        $ispis .= '<tr class="odd gradeX">
                                        <td class="center">'.$recept->id_r.'</td>
                                        <td class="center">'.$recept->naziv.'</td>
                                        <td class="center">'.$recept->nacin_pripreme.'</td>
                                        <td class="center">'.$recept->sastojci.'</td>
                                        <td class="center">'.$recept->naziv_kat.'</td>
                                        <td class="center"><img  width="50px" src="../../'.$recept->slika.'" alt="'.$recept->naziv.'"/></td>
                                        <td class="center">'.$recept->datum_kreiranja.'</td>
                                        <td class="center">'.$recept->vreme_pripreme.'</td>
                                        <td class="center">'.$recept->kalorije.'</td>
                                        <td class="center">'.$recept->za_posluziti.'</td>
                                        <td><input class="btn btn-primary btn-md updateRecept" data-id="'.$recept->id_r.'" type="button" value="update"/> &nbsp;
                                            <input class="btn btn-danger btn-md obrisiRecept" data-id="'.$recept->id_r.'" type="button" value="delete"/></td>
                                    </tr>';
                    }

                    $ispis .= "</tbody>";
                    echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna!";
        }
    }

    function updateRecept($x) {
        global $conn;

        $upit = "SELECT * FROM recepti WHERE id_r=$x";
        $recept = $conn->query($upit)->fetch();

                        $ispis = '<div class="form-group">
                                            <label>Naziv</label>
                                            <input type="text" name="tbNaziv" id="tbNaziv" class="form-control" value="'.$recept->naziv.'" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nacin pripreme</label>
                                            <textarea name="txtNacinPripreme" id="txtNacinPripreme" class="form-control" required>'.$recept->nacin_pripreme.'
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Sastojci</label>
                                            <textarea name="txtSastojci" id="txtSastojci" class="form-control" required>'.$recept->sastojci.'
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategorija</label>
                                            <select name="ddlKategorija" id="ddlKategorija" class="form-control">
                                                <option value="0">Izaberite</option>';
                                        $kategorije = $conn->query("SELECT * FROM kategorija")->fetchAll();
                                        foreach ($kategorije as $kategorija){
                                            if($kategorija->id_kat == $recept->id_kat){
                                                $ispis .= '<option value="'.$kategorija->id_kat.'" selected>'.$kategorija->naziv.'</option>';
                                            } else {
                                                $ispis .= '<option value="'.$kategorija->id_kat.'">'.$kategorija->naziv.'</option>';
                                            }
                                        }
                                 $ispis .= '</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Slika</label>
                                            <input type="file" name="fajlSlika"  id="fajlSlika" class="form-control" placeholder="Unesite naziv slike" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Datum kreiranja</label>
                                            <input type="text" name="tbDatum" id="tbDatum" class="form-control" value="'.$recept->datum_kreiranja.'" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Vreme pripreme</label>
                                            <input type="text" name="tbVremePripreme" id="tbVremePripreme" class="form-control" value="'.$recept->vreme_pripreme.'" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kalorije</label>
                                            <input type="text" name="tbKalorije" id="tbKalorije" class="form-control" value="'.$recept->kalorije.'" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Za posluziti</label>
                                            <input type="text" name="tbPosluziti" id="tbPosluziti" class="form-control" value="'.$recept->za_posluziti.'" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="updateRecept" id="updateRecept" class="btn btn-primary btn-md" value="UPDATE">
                                        </div>
                                        <label id="ispisProizvoda"></label>';
                                        return $ispis;
            }

            if(isset($_POST['btnUpdateRecept'])){
                $idR = $_POST['idR'];
                echo updateRecept($idR);
            }

            if(isset($_POST['updateRecept'])){
                $naziv = $_POST['tbNaziv'];
                $nacinPripreme = $_POST['txtNacinPripreme'];
                $sastojci = $_POST['txtSastojci'];
                $kategorija = $_POST['ddlKategorija'];
                $slika = $_FILES['fajlSlika'];
                $datumKreiranja = $_POST['tbDatum'];
                $vremePripreme = $_POST['tbVremePripreme'];
                $kalorije = $_POST['tbKalorije'];
                $posluziti = $_POST['tbPosluziti'];

                if(empty($slika['ime'])){
                    header("Location: ../pages/index.php?page=insertRecept");
                    $upitUpdate = "UPDATE recepti SET naziv='$naziv', nacin_pripreme='$nacinPripreme', sastojci='$sastojci', id_kat='$kategorija', datum_kreiranja='$datumKreiranja', vreme_pripreme='$vremePripreme', kalorije='$kalorije', za_posluziti='$posluziti' WHERE id_r=$idR";
                    try{
                        $conn->query($upitUpdate);
                    }catch (PDOException $ex){
                        echo $ex->getMessage();
                    }
                } else {

                    $imeSlike = $slika['name'];
                    $tmpImeSlike = $slika['tmp_name'];
                    $postojanoImeSlike = "assets/img/recepti/".time().$imeSlike;
                    if(move_uploaded_file($tmpImeSlike, "../../$postojanoImeSlike")) {
                        $upitUpdate = "UPDATE recepti SET naziv='$naziv', nacin_pripreme='$nacinPripreme', sastojci='$sastojci', id_kat='$kategorija', slika='$postojanoImeSlike', datum_kreiranja='$datumKreiranja', vreme_pripreme='$vremePripreme', kalorije='$kalorije', za_posluziti='$posluziti' WHERE id_r=$idR";
                        try{
                            $conn->query($upitUpdate);
                            header("Location: ../pages/index.php?page=insertRecept");
                        }catch (PDOException $ex){
                            echo $ex->getMessage();
                        }
                    }
                }
            }
