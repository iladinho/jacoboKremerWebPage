$(document).ready(function() {
    
    
    // Al hacer click sobre cualquier elemento que tenga el atributo data-user.....
    $('#buttonVal').click(function(e) {
        
       $.ajax({
              url: "validateLogin.php",
              method: "POST",
              dataType: "json",
              data: {
                usuario: $("#usuario").val(), 
                contrasena: $("#contrasena").val(),
                ajaxRequest:"true"
              }
            })

            .success(function( result ) {
                if(result.errorNum==1){
                    alert("Error: " + result.payload.error + " -------- Field: " + result.payload.field);
                }else{
                    alert("Success: " + result.message);
                }
              });

        
             return false;
    });
    
});