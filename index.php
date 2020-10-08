<?php
    session_start();
    include "config/pristupStranici.php";
    include "views/fixed/head.php";
    include "views/fixed/navbar.php";

    if(isset($_GET['page']))
    {
        switch ($_GET['page'])
        {
            case "home":
                include "views/pages/slider.php";
                include "views/pages/banner.php";
                include "views/pages/galerija.php";
                break;
            case "registracija":
                include "views/pages/registracija.php";
                break;
            case "logovanje":
                include "views/pages/logovanje.php";
                break;
            case "kategorije":
                include "views/pages/kategorije.php";
                break;
            case "recepti":
                include "views/pages/recepti.php";
                break;
            case "recept":
                include "views/pages/single-recept.php";
                break;
            case "author":
                include "views/pages/autor.php";
                break;
        }
    }
    else
    {
        include "views/pages/slider.php";
        include "views/pages/banner.php";
        include "views/pages/galerija.php";
    }

    include "views/fixed/footer.php";
?>
