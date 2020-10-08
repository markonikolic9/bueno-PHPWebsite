<!-- ##### Catagory Area Start ##### -->
<div class="post-catagory section-padding-100">
    <div class="container">
        <div class="row">
            <!-- Single Post Catagory -->
            <?php
                include "models/kategorije/dohvatiKategorije.php";
                $kategorije = dohvatiKategorije();
                foreach($kategorije as $kategorija):
            ?>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-post-catagory mb-30">
                    <img src="<?=$kategorija->slika_putanja?>" alt="<?=$kategorija->naziv?>">
                    <!-- Content -->
                    <div class="catagory-content-bg">
                        <div class="catagory-content">
                            <a href="index.php?page=recepti&id=<?=$kategorija->id_kat?>" class="post-tag">The Best</a>
                            <a href="index.php?page=recepti&id=<?=$kategorija->id_kat?>" class="post-title"><?=$kategorija->naziv?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
    </div>
</div>
<!-- ##### Catagory Area End ##### -->