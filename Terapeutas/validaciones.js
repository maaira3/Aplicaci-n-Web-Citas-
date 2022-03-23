
/*Valida el formato del nombre de usuario
Parametros: 
nombre -> Tipo de dato String, representa el nombre completo del usuario
Salida:
Retorna un true si el nombre solo se compone de letras mayusculas o minusculas
Retorna un false en caso contrario
*/

function validarNombre(nombre)
{
	let expresion = new RegExp('^[A-Z ]+$','i'); //Expresion regular a utilizar para la validacion, representa el formato

	let resultado = expresion.test(nombre);//Evalua si el nombre cumple con el formato indicado

	if( resultado ) //Si cumple con el formato
	{
		return true;//Retorna true
	}//fin de if
	else   //Si no cumple con el formato
	{
		return false;//Retorna false
	}//fin de else

}//fin de la funcion validarNombre

/*Valida el formato del correo electronico del usuario
Parametros:
correo -> Tipo de dato String, representa el correo electronico del usuario 
Salida: 
Retorna un true si el correo tiene la forma {caracteres}@{caracteres}.{caracteres}
Retorna un false en caso contrario

*/

function validarCorreo(correo)
{
    let expresion = new RegExp('\\S+@\\S+\\.\\S+'); //Expresion regular a utilizar para la validacion, representa el formato

	let resultado = expresion.test(correo);//Evalua si el correo cumple con el formato indicado

	if( resultado ) //Si cumple con el formato
	{
		return true;//Retorna true
	}//fin de if
	else   //Si no cumple con el formato
	{
		return false;//Retorna false
	}//fin de else

}//fin de la funcion validarCorreo


/*Valida el formato del telefono del usuario
Parametros:
telefono -> Tipo de dato string, representa numero telefonico del usuario
Salida:
Retorna un true si el telefono solo se compone de numeros  y si la cantidad de digitos es igual a 10
Retorna un false en caso contrario

*/
function validarTelefono(telefono)
{
	if( telefono.length != 10 ) //Si el telefono no tiene 10 numeros
	{
		return false; //Retornar false
	}//fin de if

	let expresion = new RegExp('^[0-9]+$'); //Expresion regular a utilizar para la validacion, representa el formato

	let resultado = expresion.test(telefono);//Evalua si el telefono cumple con el formato indicado

	if( resultado ) //Si cumple con el formato
	{
		return true;//Retorna true
	}//fin de if
	else   //Si no cumple con el formato
	{
		return false;//Retorna false
	}//fin de else	
}//fin de la funcion validarTelefono


/*Valida el formato de la contraseña del usuario
Parametros:
password -> Tipo de dato string, representa la contraseña del usuario
Salida:
Retorna un true si la contraseña se compone de almenos un numero y una letra en mayuscula 
Retorna un false en caso contrario
*/
function validarPassword(password)
{
	if( password.length != 8 ) //Si la contraseña no tiene 8 caracteres
	{
		return false; //Retornar false
	}//fin de if

	let expresion = new RegExp('\\S*[0-9]\\S*[A-Z]\\S*|\\S*[A-Z]\\S*[0-9]\\S*');//Expresion regular a utilizar para la validacion, representa el formatos

	let resultado = expresion.test(password);//Evalua si el password cumple con el formato indicado

	if( resultado ) //Si cumple con el formato
	{
		return true;//Retorna true
	}//fin de if
	else   //Si no cumple con el formato
	{
		return false;//Retorna false
	}//fin de else	
}

/*Valida que la edad del cliente se encuentre en un rango adecuado
Parametros:
edad -> Es un valor numerico entero, representa la edad del cliente 
Salida: 
Retorna true si la edad se encuentra en el rango [1,100]
Retorna false en caso contrario
*/
function validarEdad(edad)
{
	if( edad < 1 || edad > 100 ) //Si la edad se no se encuentra en el rango [0,100]
	{
		return false; //Retornar false
	}

	return true; //La edad se encuentra en el rango [0,100]
}