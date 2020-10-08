<?php

    if(isset($_POST['btnForma'])){
        include "../../config/connection.php";

        $idK = $_POST['idK'];
        $upit = $conn->prepare("SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_uloga = u. id_uloga WHERE k.id_korisnik = ?");
        $upit->bindValue(1, $idK);
        $upit->execute();
        $korisnik = $upit->fetch();

        $uloge = $conn->query("SELECT * FROM uloga")->fetchAll();

        $ispis = '<div class="col-lg-12">
        <h1 id="naslovForma">Update User</h1>
        <form id="forma" role="form">
            <div class="form-group">
                <label>Ime</label>
                <input type="text" id="tbIme" class="form-control" value="'.$korisnik->name.'">
            </div>
            <div class="form-group">
                <label>Prezime</label>
                <input type="text" id="tbPrezime" class="form-control" value="'.$korisnik->lastname.'">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="tbEmail" class="form-control" value="'.$korisnik->email.'">
            </div>
            <div class="form-group">
                <label>Uloga </label>
                <select id="uloga" class="form-control">';
                    foreach ($uloge as $uloga){
                        if($uloga->id_uloga==$korisnik->id_uloga){
                            $ispis .= '<option selected value="'.$uloga->id_uloga.'">'.$uloga->uloga.'</option>';
                        } else {
                            $ispis.='<option value="'.$uloga->id_uloga.'">'.$uloga->uloga.'</option>';
                        }
                    }

            $ispis .= '</select>
                        </div>
                        <div class="form-group">
                            <input type="button" data-id="'.$korisnik->id_korisnik.'" id="updateKorisnik1" class="btn btn-primary btn-md" value="UPDATE">
                        </div>
                        <label id="meni-insert-result"> </label>
                        </form>
                        </div>';

            echo $ispis;
    }

    if(isset($_POST['btnUpdate'])){
        include "../../config/connection.php";

        $idK = $_POST['idK'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $uloga = $_POST['uloga'];

        $upitUpdate = $conn->prepare("UPDATE korisnik SET name = ?, lastname = ?, email = ?, id_uloga = ? WHERE id_korisnik = ?");
        $upitUpdate->bindValue(1, $ime);
        $upitUpdate->bindValue(2, $prezime);
        $upitUpdate->bindValue(3, $email);
        $upitUpdate->bindValue(4, $uloga);
        $upitUpdate->bindValue(5, $idK);

        if($upitUpdate->execute()){
            $korisnici = $conn->query("SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_uloga = u.id_uloga")->fetchAll();

            $ispis = '<thead>
                        <tr>
                            <th>ID_K</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Email</th>
                            <th>Uloga</th>
                            <th>Kontrole</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($korisnici as $korisnik){
                        $ispis .= '<tr class="odd gradeX">
                                        <td>'.$korisnik->id_korisnik.'</td>
                                        <td>'.$korisnik->name.'</td>
                                        <td>'.$korisnik->lastname.'</td>
                                        <td class="center">'.$korisnik->email.'</td>
                                        <td class="center">'.$korisnik->uloga.'</td>
                                        <td><input class="btn btn-primary btn-md updateKorisnik" data-id="'.$korisnik->id_korisnik.'" type="button" value="update"/> &nbsp;
                                        <input class="btn btn-danger btn-md obrisiKorisnik" data-id="'.$korisnik->id_korisnik.'" type="button" value="delete"/></td>
                                  </tr>';
                    }

                    $ispis .= '</tbody>';
                    echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }
    }

    if(isset($_POST['btnObrisi'])){
        include "../../config/connection.php";

        $idK = $_POST['idK'];
        $upitObrisi = $conn->prepare("DELETE FROM korisnik WHERE id_korisnik = ?");
        $upitObrisi->bindValue(1, $idK);

        if($upitObrisi->execute()){
            $korisnici = $conn->query("SELECT * FROM korisnik k INNER JOIN uloga u ON k.id_uloga = u.id_uloga")->fetchAll();

            $ispis = '<thead>
                        <tr>
                        <th>ID_K</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Uloga</th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($korisnici as $korisnik){
                    $ispis .= '<tr class="odd gradeX">
                                   <td>'.$korisnik->id_korisnik.'</td>
                                   <td>'.$korisnik->name.'</td>
                                   <td>'.$korisnik->lastname.'</td>
                                   <td class="center">'.$korisnik->email.'</td>
                                   <td class="center">'.$korisnik->uloga.'</td>
                                   <td><input class="btn btn-primary btn-md updateKorisnik" data-id="'.$korisnik->id_korisnik.'" type="button" value="update"/> &nbsp;
                                   <input class="btn btn-danger btn-md obrisiKorisnik" data-id="'.$korisnik->id_korisnik.'" type="button" value="delete"/></td>
                              </tr>';
            }
            $ispis .= '</tbody>';
            echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }
    }