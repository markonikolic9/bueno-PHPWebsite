<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Logo Area -->
    <div class="logo-area">
        <a href="index.php"><img src="assets/img/core-img/logo.png" alt=""></a>
    </div>

    <!-- Navbar Area -->
    <div class="bueno-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="buenoNav">

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Nav Start -->
                        <div class="classynav">
                            <?php
                            include "config/connection.php";
                            $prikaz = 0;
                            if(isset($_SESSION['korisnik'])){
                                if($_SESSION['korisnik']->id_uloga == 1){
                                    $prikaz = 2;
                                } else {
                                    $prikaz = 1;
                                }
                            }

                            switch ($prikaz){
                                case 0:
                                    $upit = "SELECT * FROM navmeni WHERE prikaz = 0 or prikaz = 1";
                                    break;
                                case 1:
                                    $upit = "SELECT * FROM navmeni WHERE prikaz = 0 or prikaz = 2";
                                    break;
                                case 2:
                                    $upit = "SELECT * FROM navmeni WHERE prikaz = 0 or prikaz = 2 or prikaz = 3";
                                    break;
                                default:
                                    $upit = "SELECT * FROM navmeni WHERE prikaz = 0 or prikaz = 1";
                                    break;
                            }

                            $navmeni = $conn->query($upit)->fetchAll();
                            $item = "<ul>";
                            foreach ($navmeni as $x){
                                $item .= "<li><a href='".$x->putanja."'>".$x->naziv."</a></li>";
                            }
                            $item .= "</ul>";

                            echo $item;
                            ?>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
