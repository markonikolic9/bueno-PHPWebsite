$(document).ready(function(){
   $("#btnRegister").click(function(e){

       e.preventDefault();

       let ime = $("#firstName").val();
       let prezime = $("#LastName").val();
       let email = $("#email").val();
       let password = $("#password").val();

       let nizGreske = [];

       let regIme = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
       if(!regIme.test(ime)){
           $("#spanFirstName").html("Wrong name format!");
           $("#spanFirstName").css('color', 'red');
           nizGreske.push(ime);
       }

       let regPrezime = /^[A-ZČĆŽĐŠ][a-zčćžđš]{2,15}$/;
       if(!regPrezime.test(prezime)){
           $("#spanLastName").html("Wrong lastname format!");
           $("#spanLastName").css('color', 'red');
           nizGreske.push(prezime);
       }

       let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if(!regEmail.test(email)){
           $("#spanEmail").html("Wrong email format!");
           $("#spanEmail").css('color', 'red');
           nizGreske.push(email);
       }

       let regSifra = /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/;
       if(!regSifra.test(password)){
           $("#spanPassword").html("Wrong password format!");
           $("#spanPassword").css('color', 'red');
           nizGreske.push(password);
       }

       if(nizGreske==0){
           $.ajax({
              url: 'models/korisnik/obradaRegistracije.php',
              method: 'POST',
              data: {
                  ime: ime,
                  prezime: prezime,
                  email: email,
                  pass: password,
                  btn: true
              },
              success:function(){
                  alert('Uspesno ste se registrovali!');
                  window.location='index.php?page=logovanje';
              },
              error: function(xhr, status, error){
                  if(xhr.status == 400){ alert ("Vec postoji korisnik sa tim email-om!");}
              }
           });
       } else {

       }
   });
});