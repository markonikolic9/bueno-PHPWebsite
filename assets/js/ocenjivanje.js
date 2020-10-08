$(document).ready(function(){
    $("#btnOcena").click(function(){
       let ocena = $('input[name="rate"]:checked').val();
       let id = $("#hdnId").data("id");



       if(ocena!=null){
           $.ajax({
               url: "models/recepti/ocenjivanjeRecepta.php",
               method: "POST",
               data: {
                   ocena: ocena,
                   id: id,
                   btn: true
               },
               success: function(data){
                   location.reload();
               },
               error: function(xhr, status, error){
                   if(xhr.status == 403){ alert ("Pristup stranici odbijen!");}
                   if(xhr.status == 500) {alert("Server nije dostupan!");}
                   if(xhr.status == 400) {alert("Vec ste glasali!")};
               }
           });
       } else {
           // console.log();
       }

    });
});