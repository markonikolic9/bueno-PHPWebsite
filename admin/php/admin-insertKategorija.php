<?php
    if(isset($_POST['insertKategorija'])){

        include "../../config/connection.php";

        $naziv = $_POST['tbNazivKat'];
        $slika = $_FILES['fajlSlika'];

        $imeSlike = $slika['name'];
        $tmpImeSlike = $slika['tmp_name'];

        $postojanoImeSlike = "assets/img/bg-img/".time().$imeSlike;
        if(move_uploaded_file($tmpImeSlike, "../../$postojanoImeSlike")){

            $upitInsert = $conn->prepare("INSERT INTO kategorija SET id_kat = NULL, naziv = ?, slika_putanja = ?");
            $upitInsert->bindValue(1, $naziv);
            $upitInsert->bindValue(2, $postojanoImeSlike);

            if($upitInsert->execute()){
                header("Location:../pages/index.php?page=insertKategorija");
            } else {
                echo "Baza trenutno nije dostupna";
            }
        } else {
            http_response_code(422);
        }
    }

    if(isset($_POST['btnObrisiKategoriju'])){
        include "../../config/connection.php";

        $idK = $_POST['idK'];

        $upitDelete = $conn->prepare("DELETE FROM kategorija WHERE id_kat = ?");
        $upitDelete->bindValue(1, $idK);

        if($upitDelete->execute()){
            $kategorije = $conn->query("SELECT * FROM kategorija")->fetchAll();
            $ispis = '<thead>
                           <tr>
                               <th>ID_KA</th>
                               <th>Naziv</th>
                               <th>Slika</th>
                               <th>Kontrole</th>
                           </tr>
                      </thead>
                      <tbody>';
            foreach ($kategorije as $kategorija){
                $ispis .= '<tr class="odd gradeX">
                                 <td class="center">'.$kategorija->id_kat.'</td>
                                 <td class="center">'.$kategorija->naziv.'</td>
                                 <td class="center"><img  width="50px" src="../../'.$kategorija->slika_putanja.'" alt="'.$kategorija->naziv.'"/></td>
                                 <td><input class="btn btn-danger btn-md obrisiKategorija" data-id="'.$kategorija->id_kat.'" type="button" value="delete"/></td>
                           </tr>';
            }
            $ispis .= "</tbody>";
            echo $ispis;
        } else {
            echo "Baza trenutno nije dostupna";
        }
    }
