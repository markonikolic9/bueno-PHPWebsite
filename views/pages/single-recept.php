<!-- ##### Post Details Area Start ##### -->
<section class="post-news-area section-padding-100-0 mb-70">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <?php
                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    include 'models/recepti/functions.php';

                    $recept = dohvatiReceptPoId($id);
                    $datumTmp = strtotime($recept->datum_kreiranja);

                    $datum = date("F j, Y", $datumTmp);


                    $sastojci = $recept->sastojci;
                    $sastojciExplode = explode(",", $sastojci);
                }
            ?>
            <div class="col-12 col-lg-4 col-xl-5">
                <div class="post-details-content mb-100">
                    <div class="blog-thumbnail mb-50">
                        <input type="hidden" id="hdnId" data-id="<?=$recept->id_r?>">
                        <img src="<?=$recept->slika?>" alt="<?=$recept->naziv?>">
                    </div>
                    <div class="blog-content">
                        <h4 class="post-title"><?=$recept->naziv?></h4>
                        <div class="post-meta mb-50">
                            <a href="#" class="post-date"><?=$datum?></a>
                        </div>
                        <h5 class="mb-30">Steps</h5>
                        <p class="mb-30"><?=$recept->nacin_pripreme?></p>
                    </div>
                </div>

                <?php
                if(isset($_SESSION['korisnik'])){?>
                    <?php
                    $korisnikId = $_SESSION['korisnik']->id_korisnik;
                    $ocenjivanje = glasanje($korisnikId, $id);

                        if($ocenjivanje->rowCount()==0){
                    ?>
                <div class="rate" id="btnOcena">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <?php
                } else {

                    $glasovi = brojGlasovaRecept($id);
                    $brojGlasova = $glasovi->rowCount();
                    $ukupanBrojOcena = sumOcena($id);
                    $sumGlasova = $ukupanBrojOcena->avg;

                    $prosOcena = round($sumGlasova/$brojGlasova, 1);
                    $ispis = "";
                    $ispis = "<label><p class='a'>".$prosOcena." / 5</p> average based on <p class='a'>".$brojGlasova."</p> reviews.</label>";

                    echo $ispis;

                }

                } ?>
            </div>

            <div class="col-12 col-lg-4 col-xl-4">
                <!-- Info -->
                <div class="recipe-info">
                    <h5>Info</h5>
                    <ul class="info-data">
                        <li><img src="assets/img/core-img/alarm-clock.png" alt=""> <span><?=$recept->vreme_pripreme?> min</span></li>
                        <li><img src="assets/img/core-img/tray.png" alt=""> <span><?=$recept->za_posluziti?> servings</span></li>
                        <li><img src="assets/img/core-img/calories.png" alt=""> <span><?=$recept->kalorije?> calories per serve</span></li>
                    </ul>
                </div>

                <!-- Ingredients -->
                <div class="ingredients">
                    <h5>Ingredients</h5>

                    <?php
                        foreach($sastojciExplode as $sastojak):
                    ?>
                    <!-- Custom Checkbox -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1"><?=$sastojak?></label>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
