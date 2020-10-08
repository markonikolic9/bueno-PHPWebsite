<?php
    $recepti = $conn->query("SELECT *,k.naziv AS naziv_kat FROM recepti r INNER JOIN kategorija k ON r.id_kat = k.id_kat")->fetchAll();
    $kategorije = $conn->query("SELECT * FROM kategorija")->fetchAll();
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Recepti
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
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
                                <tbody>
                                    <?php foreach($recepti as $recept): ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?=$recept->id_r?></td>
                                        <td class="center"><?=$recept->naziv?></td>
                                        <td class="center"><?=$recept->nacin_pripreme?></td>
                                        <td class="center"><?=$recept->sastojci?></td>
                                        <td class="center"><?=$recept->naziv_kat?></td>
                                        <td class="center"><img  width="50px" src="../../<?=$recept->slika?>" alt="<?=$recept->naziv?>"/></td>
                                        <td class="center"><?=$recept->datum_kreiranja?></td>
                                        <td class="center"><?=$recept->vreme_pripreme?></td>
                                        <td class="center"><?=$recept->kalorije?></td>
                                        <td class="center"><?=$recept->za_posluziti?></td>
                                        <td><input class="btn btn-primary btn-md updateRecept" data-id="<?=$recept->id_r?>" type="button" value="update"/> &nbsp;
                                            <input class="btn btn-danger btn-md obrisiRecept" data-id="<?=$recept->id_r?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 id="naslov">Dodaj novi recept</h1>
                                    <form id="noviRecept" method="POST" action="../php/admin-insertRecept.php"  role="form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Naziv</label>
                                            <input type="text" name="tbNaziv" id="tbNaziv" class="form-control" placeholder="Unesite naziv recepta" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nacin pripreme</label>
                                            <textarea placeholder="" name="txtNacinPripreme" id="txtNacinPripreme" class="form-control" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Sastojci</label>
                                            <textarea placeholder="" name="txtSastojci" id="txtSastojci" class="form-control" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategorija</label>
                                            <select name="ddlKategorija" id="ddlKategorija" class="form-control">
                                                <option value="0">Izaberite</option>
                                                <?php foreach($kategorije as $kategorija): ?>
                                                    <option value="<?=$kategorija->id_kat?>"><?=$kategorija->naziv?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Slika</label>
                                            <input type="file" name="fajlSlika"  id="fajlSlika" class="form-control" placeholder="Unesite naziv slike" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Datum kreiranja</label>
                                            <input type="text" name="tbDatum" id="tbDatum" class="form-control" placeholder="Unesite datum" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Vreme pripreme</label>
                                            <input type="text" name="tbVremePripreme" id="tbVremePripreme" class="form-control" placeholder="Unesite vreme pripreme" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kalorije</label>
                                            <input type="text" name="tbKalorije" id="tbKalorije" class="form-control" placeholder="Kalorije" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Za posluziti</label>
                                            <input type="text" name="tbPosluziti" id="tbPosluziti" class="form-control" placeholder="Posluziti za koliko osoba?" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="insertProizvod" id="insertProizvod" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="ispisProizvoda"> </label>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->