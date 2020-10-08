$(document).ready(function(){
   $("body").on("click", ".brojStrana", function(){

       let limit = $(this).data("limit");
       let idKat = $(this).data("id");


       $.ajax({
          url: "models/recepti/stranicenje.php",
          method: "GET",
           dataType: "JSON",
          data: {
              limit: limit,
              idKat: idKat,
              btn: true
          },
          success: function (data) {
              console.log(data);

              printRecepte(data.recepti);
              printPaginaciju(data.brojReceptaPoKat, idKat);
          },
          error: function (xhr, status, error) {
              console.log(xhr);
          }
       });

   });
});

function printRecepte(recepti){
    let html = "";
    for(let recept of recepti) {
        html += `<div class="col-12 col-lg-8 col-xl-9">
                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-1 d-flex flex-wrap mb-30">
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail">
                        <img src="${ recept.slika }" alt="${ recept.naziv }">
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-content">
                        <a href="index.php?page=recept&id=${ recept.id_r }" class="post-tag">The Best</a>
                        <a href="index.php?page=recept&id=${ recept.id_r }" class="post-title">${ recept.naziv }</a>
                        <div class="post-meta">
<!--                        <a href="#" class="post-date"><?=$datum?></a> &lt;!&ndash; DATUM KREIRANJA SREDITI !!! &ndash;&gt;-->
                        </div>
                        <span class="more"><p>${ recept.nacin_pripreme }</p></span>
                    </div>
                </div>
            </div>`;
    }
    $("#receptiPoKat").html(html);
}
function prikazRecepta(data){
    let ispis = "";
    for(let x of podaci){
        ispis += `<div class="col-12 col-lg-8 col-xl-9">
                <!-- Single Blog Post -->
                <div class="single-blog-post style-1 d-flex flex-wrap mb-30">
                    <!-- Blog Thumbnail -->
                    <div class="blog-thumbnail">
                        <img src="${x.slika}" alt="${x.naziv}">
                    </div>
                    <!-- Blog Content -->
                    <div class="blog-content">
                        <a href="index.php?page=recept&id=${x.id_r}" class="post-tag">The Best</a>
                        <a href="index.php?page=recept&id=${x.id_r}" class="post-title">${x.naziv}</a>
                        <div class="post-meta">
<!--                        <a href="#" class="post-date"><?=$datum?></a> &lt;!&ndash; DATUM KREIRANJA SREDITI !!! &ndash;&gt;-->
                        </div>
                        <span class="more"><p>${x.nacin_pripreme}</p></span>
                    </div>
                </div>
            </div>`;
    }

    $("#receptiPoKat").html(ispis);
    readMore();
}

function printPaginaciju(brojReceptaPoKat, idKat){
    let html = "";

    for(let i = 0; i < brojReceptaPoKat; i++){
        html += `<li class="page-item">
                    <a data-limit="${ i }" data-id="${ idKat }" class="page-link brojStrana" href="#">
                        ${ i + 1 }
                    </a>
                 </li>`
    }
}

function readMore() {
    let showChar = 250;


    $('.more').each(function() {
        let content = $(this).html();

        if(content.length > showChar) {

            let c = content.substr(0, showChar);

            let html = c +"...";

            $(this).html(html);
        }

    });

}