<?php
    $uloge = $conn->query("SELECT * FROM uloga")->fetchAll();
?>
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users Change</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Uloge korisnika
                        </div>
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID_U</th>
                                        <th>Uloga</th>
                                        <th>Kontrole</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($uloge as $uloga): ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?=$uloga->id_uloga?></td>
                                        <td class="center"><?=$uloga->uloga?></td>
                                        <td><input class="btn btn-danger btn-md obrisiUlogu" data-id="<?=$uloga->id_uloga?>" type="button" value="delete"/></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                            <div id="ispisiOvde" class="row">
                            <div class="col-lg-12">
                                    <h1 id="naslovForma">Dodaj novu ulogu</h1>
                                    <form id="forma" role="form">
                                        <div class="form-group">
                                            <label>Uloga</label>
                                            <input type="text" id="tbUloga" class="form-control" placeholder="Naziv nove uloge">
                                        </div>
                                        <div class="form-group">
                                            <input type="button" id="insertUloga" class="btn btn-primary btn-md" value="INSERT">
                                        </div>
                                        <label id="ispisUloga"> </label>
                                        
                                    </form>
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