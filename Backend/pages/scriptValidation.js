$(document).ready(function() {
    
    
    // Al hacer click sobre cualquier elemento que tenga el atributo data-user.....
    $('#buttonVal').click(function(e) {
        
        // Detenemos el comportamiento normal del evento click sobre el elemento clicado
        e.preventDefault();
        
        // Mostramos texto de que la solicitud está en curso
        $("#response-container").html("<p>Ingresando...</p>");
        

        // Detenemos el comportamiento normal del evento click sobre el elemento clicado
        if($("#usuario").val()==""){
            $("#response-container").html("<p>Ingrese usuario</p>");
            return;
        }

        if($("#contrasena").val()==""){
            $("#response-container").html("<p>Ingrese contraseña</p>");
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
                var output = "<h1>" + response.data.message + "</h1>"; 
                $("#response-container").html(output);
            } else {
                $("#response-container").html('No se pudo ingresar: ' + response.data.message);
            }
            
        })
        
        .fail(function(jqXHR, textStatus, errorThrown) {
            
            $("#response-container").html("Algo ha fallado: " + textStatus);
            
        });
        
        
    });
    
});