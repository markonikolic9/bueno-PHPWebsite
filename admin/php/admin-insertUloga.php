<?php

    if(isset($_POST['btnInsertUloga'])){
        include "../../config/connection.php";

        $nazivUloge = $_POST['uloga'];

        $upitInsert = $conn->prepare("INSERT INTO uloga SET id_uloga = NULL, uloga = ?");
        $upitInsert->bindValue(1, $nazivUloge);

        if($upitInsert->execute()){
            $uloge = $conn->query("SELECT * FROM uloga")->fetchAll();

            $ispis = '<thead>
                         <tr>
                            <th>ID_U</th>
                            <th>Uloga</th>
                            <th>Kontrole</th>
                         </tr>
                      </thead>
                      <tbody>';
            foreach ($uloge as $uloga) {
                $ispis .= '<tr class="odd gradeX">
                                <td class="center">'.$uloga->id_uloga.'</td>
                                <td class="center">'.$uloga->uloga.'</td>
                                <td><input class="btn btn-danger btn-md obrisiUlogu" data-id="'.$uloga->id_uloga.'" type="button" value="delete"/></td>
                           </tr>';
            }
            $ispis .= '</tbody>';
            echo $ispis;

        } else {
            echo "Baza trenutno nije dostupna";
        }
    }

    if(isset($_POST['btnObrisiUlogu'])){
        include "../../config/connection.php";

        $idU = $_POST['idU'];
        $upitObrisi = $conn->prepare("DELETE FROM uloga WHERE id_uloga = ?");
        $upitObrisi->bindValue(1, $idU);

        if($upitObrisi->execute()){
            $uloge = $conn->query("SELECT * FROM uloga")->fetchAll();

            $ispis = '<thead>
                         <tr>
                            <th>ID_U</th>
                            <th>Uloga</th>
                            <th>Kontrole</th>
                         </tr>
                      </thead>
                      <tbody>';
            foreach ($uloge as $uloga) {
                $ispis .= '<tr class="odd gradeX">
                                <td class="center">'.$uloga->id_uloga.'</td>
                                <td class="center">'.$uloga->uloga.'</td>
                                <td><input class="btn btn-danger btn-md obrisiUlogu" data-id="'.$uloga->id_uloga.'" type="button" value="delete"/></td>
                           </tr>';
            }
            $ispis .= '</tbody>';
            echo $ispis;

        }else {
            echo "Baza trenutno nije dostupna";
        }
    }