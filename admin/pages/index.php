<?php
    session_start();

    include "../../config/connection.php";
    include "../views/admin-head.php";
    include "../views/admin-nav.php";

    if(isset($_SESSION['korisnik'])&&($_SESSION['korisnik']->id_uloga==1)): ?>

        <div id="page-wrapper">
            <?php if(isset($_GET['page'])){
            $page=$_GET['page'];
            switch($page){
                case 'insertRecept':
                    include "../views/admin-insert-recept.php";
                break;
                case 'insertKorisnik':
                    include "../views/admin-insert-korisnik.php";
                break;
                case 'ulogaKorisnika':
                    include "../views/admin-insert-korisnikUloga.php";
                break;
                case 'insertKategorija':
                    include "../views/admin-insert-kategorija.php";
                break;
                default:
                    include "../views/admin-insert-recept.php";
                break;
            }
        } else {
            include "../views/admin-insert-recept.php";
                }?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- BootstrapCore JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
<?php else: http_response_code(404);  endif;?>
