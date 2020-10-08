<!-- ##### Catagory Post Area Start ##### -->
<div class="catagory-post-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center" id="receptiPoKat">
            <!-- Post Area -->
            <?php
                if(isset($_GET['id'])){
                    require_once "config/connection.php";

                    $id = $_GET['id'];

                    include "models/recepti/functions.php";
                    $limit = isset($_GET['limit']) ? $_GET['limit'] : 0;
                    $recepti = dohvatiReceptePoPaginaciji($id, $limit);
                    foreach($recepti as $recept):
                    $datumTmp = strtotime($recept->datum_kreiranja);
                    $datum = date("F j, Y", $datumTmp);
            ?>
            <div class="col-12 col-lg-8 col-xl-9">
                <!-- Single Blog Post -->
                <div class="single-blog-post style-1 d-flex flex-wrap mb-30">
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail">
                        <img src="<?=$recept->slika?>" alt="<?=$recept->naziv?>">
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-content">
                        <a href="index.php?page=recept&id=<?=$recept->id_r?>" class="post-tag">The Best</a>
                        <a href="index.php?page=recept&id=<?=$recept->id_r?>" class="post-title"><?=$recept->naziv?></a>
                        <div class="post-meta">
                            <a href="#" class="post-date"><?=$datum?></a> <!-- DATUM KREIRANJA SREDITI !!! -->
                        </div>
                        <span class="more"><p><?=$recept->nacin_pripreme?></p></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php } ?>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="pagination-area mt-70">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                $broj = 3;
                                $number = dohvatiPaginaciju($id);

                                for($i = 0; $i<$number;$i++):
                                    $index = $i+1;
                            ?>

                            <li class="page-item">
                                <a data-limit="<?= $i ?>" data-id="<?= $id ?>" class="page-link brojStrana" href="#"><?= $index ?></a>
                            </li>

                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


