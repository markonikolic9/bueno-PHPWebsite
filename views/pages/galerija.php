<!-- ##### Instagram Area Start ##### -->
<div class="instagram-feed-area d-flex flex-wrap">
    <!-- Single Instagram -->
    <?php
        $slike = executeQuery("SELECT * FROM galerija");
        foreach ($slike as $slika):
    ?>
    <div class="single-instagram">
        <img src="<?=$slika->slika_putanja?>" alt="">
        <!-- Image Zoom -->
        <a href="<?=$slika->slika_putanja?>" class="img-zoom" title="Galerija">+</a>
    </div>
    <?php endforeach; ?>
</div>
<!-- ##### Instagram Area End ##### -->