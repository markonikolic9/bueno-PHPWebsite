$(document).ready(function(){

});

function insertUloga(){
    $("#insertUloga").on("click", function(){
       let naziv = $("#tbUloga").val();

       $.ajax({
           url: "../php/admin-insertUloga.php",
           method: "POST",
           data: {
               uloga: naziv,
               btnInsertUloga: true
           },
           success: function(data){
               $("#tbUloga").val(" ");
               $("#ispisUloga").html("Dodali ste novu ulogu!");
               $("#dataTables-example").html(data);
               obrisiUlogu();
           },
           error: function(xhr, status, error){
               console.log(xhr.status);
           }
       });
    });
}
insertUloga();

function obrisiUlogu(){
    $(".obrisiUlogu").on("click", function(){
       let idU = $(this).data("id");

       $.ajax({
          url: "../php/admin-insertUloga.php",
          method: "POST",
          data: {
              idU: idU,
              btnObrisiUlogu: true
          },
          success: function(data){
              $("#dataTables-example").html(data);
              obrisiUlogu();
          },
          error: function(xhr, status, error){
              console.log(error);
          }
       });
    });
}
obrisiUlogu();

function updateKorisnikForma(){
    $(".updateKorisnik").on("click", function(){
       let idK = $(this).data("id");

       $.ajax({
          url: "../php/admin-insertKorisnik.php",
          method: "POST",
          data: {
              idK: idK,
              btnForma: true
          },
          success: function (data) {
              $("#ispisForme").html(data);
              updateKorisnik();
          },
          error: function(xhr, status, error) {
               console.log(xhr.status);
          }
       });
    });
}
updateKorisnikForma();

function updateKorisnik() {
    $("#updateKorisnik1").click(function(){
       let idK = $(this).data("id");
       let ime = $("#tbIme").val();
       let prezime = $("#tbPrezime").val();
       let email = $("#tbEmail").val();
       let uloga = $("#uloga").val();

       $.ajax({
          url: "../php/admin-insertKorisnik.php",
          method: "POST",
          data: {
              idK: idK,
              ime: ime,
              prezime: prezime,
              email: email,
              uloga: uloga,
              btnUpdate: true
          },
          success: function(data){
              $("#ispisForme").html(" ");
              $("#dataTables-example").html(data);
              obrisiKorisnika();
              updateKorisnikForma();
          }
       });
    });
}

function obrisiKorisnika() {
    $(".obrisiKorisnik").on("click", function(){
       let idK = $(this).data("id");
       $.ajax({
          url: "../php/admin-insertKorisnik.php",
          method: "POST",
          data: {
              idK: idK,
              btnObrisi: true
          },
          success: function (data) {
              $("#dataTables-example").html(data);
              obrisiKorisnika();
              updateKorisnikForma();
          },
          error: function(xhr, status, error) {
               console.log(xhr.status);
          }
       });
    });
}
obrisiKorisnika();

function obrisiKategoriju(){
    $(".obrisiKategorija").on("click", function(){

        let idK = $(this).data("id");

        $.ajax({
           url: "../php/admin-insertKategorija.php",
           method: "POST",
           data: {
               idK: idK,
               btnObrisiKategoriju: true
           },
           success: function (data) {
               $("#dataTables-example").html(data);
               obrisiKategoriju();
           },
           error: function(xhr, status, error) {
                console.log(xhr.status);
           }
        });
    });
}
obrisiKategoriju();

function obrisiRecept(){
    $(".obrisiRecept").on("click", function(){
       let idR = $(this).data("id");

       $.ajax({
          url: "../php/admin-insertRecept.php",
          method: "POST",
          data: {
              idR: idR,
              btnObrisiRecept: true
          },
          success: function (data) {
              $("#dataTables-example").html(data);
              obrisiRecept();
              //updateRecept();
          },
           error: function(xhr, status, error) {
               console.log(xhr.status);
           }
       });
    });
}
obrisiRecept();

function updateRecept(){
    $(".updateRecept").on("click", function(){
       let idR = $(this).data("id");

       $.ajax({
          url: "../php/admin-insertRecept.php",
          method: "POST",
          data: {
              idR: idR,
              btnUpdateRecept: true
          },
          success:function (data) {
              $("#noviRecept").html(data);
              $("#naslov").html("Update");
          },
          error: function (xhr, status, error) {
              console.log(xhr.status);
          }
       });
    });
}
updateRecept();