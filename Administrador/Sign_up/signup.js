let estadoLogeado = -1;

/*Verifica si todos los campos cumplen con el formato correcto 
Salida:
Retorna una lista de errores, esta lista contiene el nombre de los campos donde existe un error de validacion 
*/
function validarCampos()
{
	let errores = []; //Almacena los campos que tienen errores en el formato 

	validarNombre( $("#nombre").val() )? errores :errores.push("nombre"); //Si el nombre es incorrecto, se agrega a la lista de errores

	validarTelefono( $("#telefono").val() )? errores :errores.push("telefono"); //Si el telefono es incorrecto, se agrega a la lista de errores

	validarCorreo( $("#email").val() )? errores :errores.push("email"); //Si el email es incorrecto, se agrega a la lista de errores

	validarPassword( $("#password").val() )? errores :errores.push("password"); //Si el password es incorrecto, se agrega a la lista de errores

	validarEdad( $("#edad").val() )?errores:errores.push("edad");//Si la edad es incorrecta, se agrega a la lista de errores 

	return errores; //Retorna los errores 

}//fin de funcion validarCampos


/*Muestra los campos con errores en el formato
Parametros:
errores -> Lista de los campos con errores en el formato
*/

function mostrarErrores(errores)
{
	//Arreglo de mensajes para cada error 
	let mensajes = ["El nombre debe contener solo letras",
		             "El telefono debe contener solo 10 numeros",
		             "El email debe tener por ejemplo el siguiente formato example@gmail.com",
		             "El password debe contener al menos un numero y una letra en mayuscula y tener 8 caracteres",
		             "La edad debe encontrarse en un rango de 1 a 100 años"];

    //Determina para cada campo si existe un error, si es asi agrega un label para mostrar su respectivo mensaje de error
	errores.find( element => element === "nombre" ) != null? $("#nombreCampo").append(generarLabel('labelNombre','classP',mensajes[0]) )  : true; 
	errores.find( element => element === "telefono" ) != null? $("#telefonoCampo").append(generarLabel('labelTelefono','classP',mensajes[1]))  : true; 
	errores.find( element => element === "email" ) != null? $("#emailCampo").append(generarLabel('labelEmail','classP',mensajes[2]))  : true; 
	errores.find( element => element === "password" ) != null? $("#passwordCampo").append(generarLabel('labelPassword','classP',mensajes[3]))  : true; 
	errores.find( element => element === "edad" ) != null? $("#edadCampo").append(generarLabel('labelEdad','classP',mensajes[4]))  : true; 
		    
}

/*Remueve todas las componentes generadas dinamicamente */

function limpiarInterfaz()
{
	$("#labelNombre").remove();
	$("#labelTelefono").remove();
	$("#labelEmail").remove();
	$("#labelPassword").remove();
	$("#labelEdad").remove();
}

/*Se comunica con el servidor para verifica si es posible almacenar al cliente en la base de datos*/
function almacenarTerapeuta()
{
	 $.ajax({
            type: "POST", //Tipo de peticion
            url: '../phpServer/signup.php', //Url donde se ecuentra el php
            //Parametros para el php  
            data: {"nombre":$("#nombre").val(), 
                   "telefono":$("#telefono").val(),
                   "email":$("#email").val(),
                   "password":$("#password").val(),
                   "edad":$("#edad").val()
                   }, 
            success: function(response) 
            {
		if( response == -1 )//Si el email ya se encuentra en uso
            	{
            		$("#modalRegistroFalloEmail").modal("show");
            	}
            	if( response == -2 ) //Si existe un error al conectar con la base de datos
            	{
            		$("#modalRegistroFalloConexion").modal("show");
            	}
            	if( response > 0 ) //Si se tuvo exito
            	{
            		$("#modalRegistroExistoso").modal("show");
            		//window.location.assign("../Principal");          		
            	}

  

            }
       });
}

/*Determina si permite al usuario registrarse en la pagina
Junta la parte logica y la interfaz*/

function validarFormato()
{
	limpiarInterfaz(); //Remueve las componentes antes de generear mas 

	let errores = validarCampos(); //Resultado de la validacion de los campos 

	if( errores.length > 0 ) //Si existen errores  
	{
		mostrarErrores(errores);//Agrega la parte grafica para los errores 
	}//fin de if
	else //Si no existen errores 
	{
		almacenarTerapeuta();//Almacena al terapeuta 
	}//fin de else

}


