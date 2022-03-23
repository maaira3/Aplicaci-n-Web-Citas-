
/*Se comunica con el servidor para verifica si existe el cliente en la base de datos*/
function validarUsuario()
{

       
  $.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/login.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {"email1":$("#email1").val(),
                   "password1":$("#password1").val()
                   }, 
            success: function(response) 
            { 
              if( response == -2 ) //Si existe un error al conectar con la base de datos
              {
                alert("Existe un error de conexion, intente nuevamente");
              }
              if( response > 0 ) //Si se tuvo exito
              {
                    location.reload();
              }
              if( response == -3 ) //Si el email o password son incorrectos
              {
                     alert("El email o contraseña es incorrecto, intente nuevamente");
              }
              if( response == -1) // no ha ingresado ningún dato
              {
                     alert("Por favor complete todos los campos");
              }
              if( response == -4) // no se recupero el nombre de terapeuta
              {
                     alert("No se pudo recuperar el nombre del terapeuta");
              }

            }
       });


}
