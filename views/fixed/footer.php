<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-5">
                <!-- Copywrite Text -->
                <p class="copywrite-text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with</i><a href="models/kategorije/export-excel.php"></br>Export u Excel</a>
                       </p>
            </div>
            <div class="col-12 col-sm-7">
                <!-- Footer Nav -->
                <div class="footer-nav">
                    <?php
                    global $navmeni;
                    $item = "<ul>";
                    foreach ($navmeni as $x){
                        $item .= "<li><a href='".$x->putanja."'>".$x->naziv."</a></li>";
                    }
                    $item .= "</ul>";

                    echo $item;
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="assets/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="assets/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="assets/js/active.js"></script>
<!--<script src="assets/js/global.js"></script>-->

<script src="assets/js/registracija.js"></script>
<script src="assets/js/logovanje.js"></script>
<script src="assets/js/ocenjivanje.js"></script>
<script src="assets/js/paginacija.js"></script>
<script src="assets/js/read-more.js"></script>
<script src="assets/js/sortiranje.js"></script>

</body>

</html>