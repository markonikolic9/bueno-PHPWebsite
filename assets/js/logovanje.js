$(document).ready(function(){

    $("#btnLogin").click(function(){

        let email = $("#LogEmail").val();
        let pass = $("#LogPassword").val();

        let nizGreske = [];

        let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!regEmail.test(email)){
            $("#spanEmail").html("Wrong email format!");
            $("#spanEmail").css('color', 'red');
            nizGreske.push(email);
        }

        let regSifra = /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{6,}$/;
        if(!regSifra.test(pass)){
            $("#spanPassword").html("Wrong email format!");
            $("#spanPassword").css('color', 'red');
            nizGreske.push(pass);
        }

        if(nizGreske==0){
            $.ajax({
               url: 'models/korisnik/obradaLogovanje.php',
               method: 'POST',
               data: {
                   email: email,
                   pass: pass,
                   btn: true
               },
               success: function(){
                   window.location="index.php";
               },
               error: function(xhr, status, error){
                   console.log(status);
               }
            });
        }  else {

        }
    });
});