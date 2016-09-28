$(document).ready(function() {
    
    
    // Al hacer click sobre cualquier elemento que tenga el atributo data-user.....
    $('#buttonVal').click(function(e) {
        
        // Detenemos el comportamiento normal del evento click sobre el elemento clicado
        e.preventDefault();

        // Detenemos el comportamiento normal del evento click sobre el elemento clicado
        if($("#usuario").val()==""){
            $("#response-container").html("<p>Ingrese usuario</p>");
            document.getElementById("response-container").className = "alert alert-danger";
            document.getElementById("usuario").focus();
            return;
        }

        if($("#contrasena").val()==""){
            $("#response-container").html("<p>Ingrese contraseña</p>");
            document.getElementById("response-container").className = "alert alert-danger";
            document.getElementById("contrasena").focus();

            return;
        }
        // this hace referencia al elemento que ha lanzado el evento click
        // con el método .data('user') obtenemos el valor del atributo data-user de dicho elemento y lo pasamos a la función getdetails definida anteriormente

       $.ajax({
              url: "validateLogin.php",
              method: "POST",
              dataType: "json",
              data: { 
                usuario: $("#usuario").val(), 
                contrasena: $("#contrasena").val(), 
              }
            })

        .done(function(response) {
            if (response.success) {
                document.getElementById("response-container").className = "alert alert-success";
                $("#response-container").html(response.data.message);
                document.getElementById("response-container").style.fontSize = "16px";
                setTimeout ("redirection()", 1000);
            } else {
                document.getElementById("response-container").className = "alert alert-danger";
                $("#response-container").html('No se pudo ingresar: ' + response.data.message);
            }
            
        })
        
        .fail(function(jqXHR, textStatus, errorThrown) {
            document.getElementById("response-container").className = "alert alert-danger";
            $("#response-container").html("Algo ha fallado: " + textStatus);
            
        });
        
        
    });
    
});
function redirection(){  

 window.location ="articulos.html";

 }